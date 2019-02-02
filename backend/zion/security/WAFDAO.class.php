<?php
namespace zion\security;

use Exception;
use PDO;

/**
 * WAFDAO
 * @author Vinicius
 * @since 01/02/2019
 */
class WAFDAO {
    public function putClientLocation($db,$obj) {
        $sql = "
        INSERT INTO `waf_ip_location`
		(
          `ipaddr`,`type`,`continent_code`,`continent_name`,`country_code`,
		  `country_name`,`region_code`,`region_name`,`city`,`updated`
        )
		VALUES
		(
          ':ipaddr:',':type:',':continent_code:',':continent_name:',':country_code:',
		  ':country_name:',':region_code:',':region_name:',':city:',NOW()
		)";
        
        $sql = str_replace(":ipaddr:", addslashes($obj->ipaddr), $sql);
        $sql = str_replace(":type:", addslashes($obj->type), $sql);
        $sql = str_replace(":continent_code:", addslashes($obj->continent_code), $sql);
        $sql = str_replace(":continent_name:", addslashes($obj->continent_name), $sql);
        $sql = str_replace(":country_code:", addslashes($obj->country_code), $sql);
        $sql = str_replace(":country_name:", addslashes($obj->country_name), $sql);
        $sql = str_replace(":region_code:", addslashes($obj->region_code), $sql);
        $sql = str_replace(":region_name:", addslashes($obj->region_name), $sql);
        $sql = str_replace(":city:", addslashes($obj->city), $sql);
        $db->exec($sql);
    }
    
    public function getClientLocation($db,$ip) {
        $sql = "SELECT *
                  FROM `waf_ip_location`
                 WHERE `ipaddr` = '".addslashes($ip)."'";
        $query = $db->query($sql);
        if($raw = $query->fetchObject()) {
            return $raw;
        }
        return null;
    }
    
    public function inBlacklist($db){
        $timeout = 3600;
        
        $sql = "SELECT *
                  FROM `waf_blacklist`
                 WHERE `ipaddr` = '".$_SERVER["REMOTE_ADDR"]."'
                   AND TIMESTAMPDIFF(SECOND,`created`,NOW()) < ".$timeout;
        $query = $db->query($sql);
        $raw = $query->fetchObject();
        if($raw !== false){
            return true;
        }
        return false;
    }
    
    public function inWhitelist($db){
        $timeout = "21600"; // 6 horas
        
        $sql = "SELECT * 
                  FROM `waf_whitelist`
                 WHERE (`ipaddr` = '".$_SERVER["REMOTE_ADDR"]."' AND `type` = 'S')
                    OR (`ipaddr` = '".$_SERVER["REMOTE_ADDR"]."' 
                        AND TIMESTAMPDIFF(SECOND,`updated`,NOW()) < ".$timeout." 
                        AND `type` = 'D')";
        $query = $db->query($sql);
        $raw = $query->fetchObject();
        if($raw === false OR $raw == null) {
            return false;
        }
        return true;
    }
    
    /**
     * Adiciona o usuário na blacklist e para a execução
     */
    public function addToBlacklist($db,$policy,array $params = []){
        $REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
        $HTTP_USER_AGENT = $_SERVER["HTTP_USER_AGENT"];
        $REQUEST_URI = $_SERVER["REQUEST_URI"];
        $SERVER_NAME = $_SERVER["SERVER_NAME"];
        if(sizeof($params) > 0) {
            $REMOTE_ADDR = $params["REMOTE_ADDR"];
            $HTTP_USER_AGENT = $params["HTTP_USER_AGENT"];
            $REQUEST_URI = $params["REQUEST_URI"];
            $SERVER_NAME = $params["SERVER_NAME"];
        }
        
        $sql = "INSERT INTO `waf_blacklist`
    			(`ipaddr`, `created`, `user_agent`, `request_uri`, `server_name`, `hits`, `policy`, `updated`)
    			VALUES
				(':ipaddr:', NOW(), ':user_agent:', ':request_uri:', ':server_name:', 1, ':policy:', NOW())
                ON DUPLICATE KEY UPDATE
                `created` = NOW(), `request_uri` = ':request_uri:', `hits`= `hits`+1, `updated` = NOW()";
        $sql = str_replace(":ipaddr:", $REMOTE_ADDR, $sql);
        $sql = str_replace(":user_agent:", addslashes($HTTP_USER_AGENT), $sql);
        $sql = str_replace(":request_uri:", addslashes($REQUEST_URI), $sql);
        $sql = str_replace(":server_name:", addslashes($SERVER_NAME), $sql);
        $sql = str_replace(":policy:", addslashes($policy), $sql);
        
        try {
            $db->exec($sql);
        }catch(Exception $e){
        }
    }
    
    /**
     * Registra a requisição no log
     * @param PDO $db
     */
    public function log($db){
        $fields = array("USER", "HOME", "SCRIPT_NAME", "REQUEST_URI", "QUERY_STRING", "REQUEST_METHOD", "SERVER_PROTOCOL",
            "GATEWAY_INTERFACE", "REDIRECT_URL", "REMOTE_PORT", "SCRIPT_FILENAME", "SERVER_ADMIN", "CONTEXT_DOCUMENT_ROOT",
            "CONTEXT_PREFIX", "REQUEST_SCHEME", "DOCUMENT_ROOT", "REMOTE_ADDR", "SERVER_PORT", "SERVER_ADDR", "SERVER_NAME",
            "SERVER_SOFTWARE", "SERVER_SIGNATURE", "PATH", "HTTP_PRAGMA", "HTTP_COOKIE", "HTTP_ACCEPT_LANGUAGE", "HTTP_ACCEPT_ENCODING",
            "HTTP_ACCEPT", "HTTP_DNT", "HTTP_USER_AGENT", "HTTP_UPGRADE_INSECURE_REQUESTS", "HTTP_CONNECTION", "HTTP_HOST", "UNIQUE_ID",
            "REDIRECT_STATUS", "REDIRECT_UNIQUE_ID", "FCGI_ROLE", "PHP_SELF", "REQUEST_TIME_FLOAT", "REQUEST_TIME", "HTTP_REFERER", "REQUEST_BODY");
        
        $sql = "INSERT INTO `waf_request_log`
                (requestid, ".implode(", ",$fields).")
                VALUES
                (null, :".implode(":, :",$fields).":)";
        
        foreach($fields AS $field) {
            if($field == "REQUEST_TIME") {
                $sql = str_replace(":".$field.":", "NOW()", $sql);
            }else if($field == "REQUEST_BODY") {
                $sql = str_replace(":".$field.":", "'".addslashes(file_get_contents("php://input"))."'", $sql);
            }else{
                $sql = str_replace(":".$field.":", "'".addslashes($_SERVER[$field])."'", $sql);
            }
        }
        
        try {
            $db->exec($sql);
        }catch(Exception $e){
        }
    }
    
    public function createTables($db){
        $sqlList = array();
        
        $sqlList[] = "DROP TABLE IF EXISTS `waf_request_log`";
        $sqlList[] = "
        CREATE TABLE IF NOT EXISTS `waf_request_log` (
            `requestid` int(11) NOT NULL AUTO_INCREMENT,
            `USER` varchar(20) DEFAULT NULL,
            `HOME` varchar(45) DEFAULT NULL,
            `SCRIPT_NAME` varchar(300) DEFAULT NULL,
            `REQUEST_URI` varchar(1024) DEFAULT NULL,
            `QUERY_STRING` varchar(300) DEFAULT NULL,
            `REQUEST_METHOD` varchar(10) DEFAULT NULL,
            `SERVER_PROTOCOL` varchar(45) DEFAULT NULL,
            `GATEWAY_INTERFACE` varchar(45) DEFAULT NULL,
            `REDIRECT_URL` varchar(500) DEFAULT NULL,
            `REMOTE_PORT` varchar(10) DEFAULT NULL,
            `SCRIPT_FILENAME` varchar(1024) DEFAULT NULL,
            `SERVER_ADMIN` varchar(45) DEFAULT NULL,
            `CONTEXT_DOCUMENT_ROOT` varchar(1024) DEFAULT NULL,
            `CONTEXT_PREFIX` varchar(100) DEFAULT NULL,
            `REQUEST_SCHEME` varchar(45) DEFAULT NULL,
            `DOCUMENT_ROOT` varchar(500) DEFAULT NULL,
            `REMOTE_ADDR` varchar(60) DEFAULT NULL,
            `SERVER_PORT` varchar(10) DEFAULT NULL,
            `SERVER_ADDR` varchar(20) DEFAULT NULL,
            `SERVER_NAME` varchar(200) DEFAULT NULL,
            `SERVER_SOFTWARE` varchar(100) DEFAULT NULL,
            `SERVER_SIGNATURE` varchar(100) DEFAULT NULL,
            `PATH` varchar(1024) DEFAULT NULL,
            `HTTP_PRAGMA` varchar(45) DEFAULT NULL,
            `HTTP_COOKIE` varchar(1024) DEFAULT NULL,
            `HTTP_ACCEPT_LANGUAGE` varchar(200) DEFAULT NULL,
            `HTTP_ACCEPT_ENCODING` varchar(200) DEFAULT NULL,
            `HTTP_ACCEPT` varchar(1024) DEFAULT NULL,
            `HTTP_DNT` varchar(10) DEFAULT NULL,
            `HTTP_USER_AGENT` varchar(1024) DEFAULT NULL,
            `HTTP_UPGRADE_INSECURE_REQUESTS` varchar(45) DEFAULT NULL,
            `HTTP_CONNECTION` varchar(45) DEFAULT NULL,
            `HTTP_HOST` varchar(100) DEFAULT NULL,
            `UNIQUE_ID` varchar(45) DEFAULT NULL,
            `REDIRECT_STATUS` varchar(45) DEFAULT NULL,
            `REDIRECT_UNIQUE_ID` varchar(45) DEFAULT NULL,
            `FCGI_ROLE` varchar(45) DEFAULT NULL,
            `PHP_SELF` varchar(100) DEFAULT NULL,
            `REQUEST_TIME_FLOAT` varchar(45) DEFAULT NULL,
            `REQUEST_TIME` datetime DEFAULT NULL,
            `HTTP_REFERER` varchar(1024) DEFAULT NULL,
            `REQUEST_BODY` text DEFAULT NULL,
            PRIMARY KEY (`requestid`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
        
        $sqlList[] = "DROP TABLE IF EXISTS `waf_whitelist`";
        $sqlList[] = "
        CREATE TABLE IF NOT EXISTS `waf_whitelist` (
          `ipaddr` varchar(60) NOT NULL,
          `created` datetime NOT NULL,
          `type` varchar(1) NOT NULL COMMENT 'static - S\ndynamic - D',
          `name` varchar(300) NOT NULL,
          `hits` int(11) NOT NULL DEFAULT 1,
          `updated` datetime,
          PRIMARY KEY (`ipaddr`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        
        $sqlList[] = "DROP TABLE IF EXISTS `waf_blacklist`";
        $sqlList[] = "
        CREATE TABLE IF NOT EXISTS `waf_blacklist` (
            `ipaddr` varchar(60) NOT NULL,
            `created` datetime DEFAULT NULL,
            `user_agent` varchar(2048) DEFAULT NULL,
            `request_uri` varchar(2048) DEFAULT NULL,
            `server_name` varchar(2048) DEFAULT NULL,
            `hits` int(11) NOT NULL DEFAULT 1,
            `policy` varchar(100) DEFAULT NULL,
            `updated` datetime,
            PRIMARY KEY (`ipaddr`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        
        $sqlList[] = "DROP TABLE IF EXISTS `waf_ip_location`";
        $sqlList[] = "
        CREATE TABLE IF NOT EXISTS `waf_ip_location` (
          `ipaddr` char(60) NOT NULL,
          `type` varchar(10) DEFAULT NULL,
          `continent_code` varchar(5) DEFAULT NULL,
          `continent_name` varchar(20) DEFAULT NULL,
          `country_code` varchar(5) NOT NULL,
          `country_name` varchar(20) DEFAULT NULL,
          `region_code` varchar(5) DEFAULT NULL,
          `region_name` varchar(20) DEFAULT NULL,
          `city` varchar(180) DEFAULT NULL,
          `updated` datetime DEFAULT NULL,
          PRIMARY KEY (`ipaddr`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        
        foreach($sqlList AS $sql){
            try {
                $db->exec($sql);
            }catch(Exception $e){
            }
        }
    }
}
?>