<?php
/*
 * Zion PHP - Framework
 * Autor Vinicius Cesar Dias
 * 
 * Instruções
 * 1) Incluir esse arquivo no projeto que utilizará o framework
 * 2) Linkar o diretório desse projeto no projeto que utilizará 
 * o framework para que a IDE reconheça as classes
 */
define("zion\ROOT",dirname(__FILE__)."/");
define("zion\APP_ROOT",dirname($_SERVER["DOCUMENT_ROOT"])."/");

require(\zion\ROOT."functions.php");

// autoload
function zionphp_autoload($className) {
    if(strpos($className, "zion\\") !== 0) {
        return;
    }
    
    // modulos
    if(strpos($className, "zion\\mod\\") === 0) {
        $className = str_replace("\\","/",$className);
        $className = str_replace("zion/mod/","modules/",$className);
        $file       = \zion\ROOT.$className.".class.php";
        
        if(file_exists($file)) {
            require($file);
        }
        return;
    }
    
    // framework / biblioteca 
    $className2 = str_replace("zion\\","backend\\zion\\",$className);
    $file = \zion\ROOT.str_replace("\\","/",$className2).".class.php";
    if(file_exists($file)) {
        require($file);
    }
}

// registrando autoload
spl_autoload_register("zionphp_autoload");
ini_set("unserialize_callback_func", "zionphp_autoload");

// gerando um id de sessão exclusivo para o zion, 
// para não misturar o com id de sessão da aplicação
if(strpos($_SERVER["REQUEST_URI"],"/zion/") === 0) {
    \zion\core\Session::$sessionKey = "ZION_SESSIONID";
}

// bibliotecas via composer
$file = \zion\ROOT."vendor/autoload.php";
require_once($file);

// inicialização
\zion\core\System::configure();

// modulos
\zion\core\Zion::route();
?>