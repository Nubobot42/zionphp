<?php
namespace zion\orm;

use zion\core\Session;
use zion\core\System;
use zion\utils\TimeCounter;

/**
 * @author Vinicius Cesar Dias
 */
class PDO extends \PDO {
    public static $enableSQLHistory = false;
    public static $enableSQLLog = false;
    public static $sqlHistory = array();
    
    public function prepare($statement,$driver_options = array()){
        System::set("pdo-lastsql",$statement);
        return parent::prepare($statement,$driver_options);
    }
    
	public function query($sql){
		$e = null;
		$errorMessage = "";
		$result = false;
		
		if(self::$enableSQLHistory){
		    System::add("pdo-query",$sql);
		}
		
		System::set("pdo-lastsql",$sql);
		
		TimeCounter::start("query");
		try {
		    if(self::$enableSQLHistory){
		        self::$sqlHistory[] = $sql;
		    }
		    
		    if(self::$enableSQLLog){
		        $this->sendToLog(null, $sql);
		    }
		    
			$result = parent::query($sql);
		}catch(\Exception $e){
		    $errorMessage = $e->getMessage();
		}
		TimeCounter::stop("query");
		
		if(Session::get("trace") == 1){
			Session::add("traceSQL",array(
				"sql"       => $sql,
				"errorMessage" => $errorMessage,
				"type"      => "query",
				"result"    => ($result !== false)?1:0,
				"created"   => TimeCounter::begin("query"),
				"duration"  => TimeCounter::duration("query")
			));
		}

		if($e != null){
			throw $e;
		}

		return $result;
	}

	public function exec($sql){
		$e = null;
		$errorMessage = "";
		$result = false;
		
		if(self::$enableSQLHistory){
		    System::add("pdo-exec",$sql);
		}
		
		System::set("pdo-lastsql",$sql);
		
		TimeCounter::start("exec");
		try {
		    if(self::$enableSQLHistory){
		        self::$sqlHistory[] = $sql;
		    }
		    
		    if(self::$enableSQLLog){
		        $this->sendToLog(null, $sql);
		    }
		    
			$result = parent::exec($sql);
		}catch(\Exception $e){
		    $errorMessage = $e->getMessage();
		}
		TimeCounter::stop("exec");

		if(Session::get("trace") == 1){
			Session::add("traceSQL",array(
				"sql"       => $sql,
				"errorMessage" => $errorMessage,
				"type"      => "update",
				"result"    => ($result !== false)?1:0,
				"created"   => TimeCounter::begin("exec"),
				"duration"  => TimeCounter::duration("exec")
			));
		}
		
		if($e != null){
			throw $e;
		}

		return $result;
	}
	
	public function commit(){
		$this->exec("COMMIT");
	}
	
	public function rollback(){
		$this->exec("ROLLBACK");		
	}
	
	public function startTransaction(){
		$this->exec("BEGIN");
	}
}
?>