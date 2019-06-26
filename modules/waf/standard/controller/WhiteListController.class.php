<?php
namespace zion\mod\waf\standard\controller;

use Exception;
use zion\core\AbstractEntityController;
use zion\orm\PDO;
use zion\orm\Filter;
use zion\orm\ObjectVO;
use zion\core\System;
use zion\utils\TextFormatter;
use zion\utils\HTTPUtils;

/**
 * Classe gerada pelo Zion Framework
 * Não edite esta classe
 */
abstract class WhiteListController extends AbstractEntityController {
	public function __construct($className, array $args){
		parent::__construct($className, $args);
		
		// carregando tabela de valores
		$names = array();
		$this->loadTabval($names);
	}

	public function getFormBean() : ObjectVO {
		// Deixando os dados na superglobal _POST
		if($_SERVER["REQUEST_METHOD"] == "PUT"){
			$_POST = HTTPUtils::parsePost();
		}
		
		$obj = new ObjectVO();
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			// valores default
			$obj->set("created",new \DateTime());
			$obj->set("hits","1");
			return $obj;
		}
		
		$obj->set("ipaddr",TextFormatter::parse("string",$_POST["obj"]["ipaddr"]));
		$obj->set("created",TextFormatter::parse("datetime",$_POST["obj"]["created"]));
		$obj->set("type",$_POST["obj"]["type"]);
		$obj->set("name",$_POST["obj"]["name"]);
		$obj->set("hits",TextFormatter::parse("integer",$_POST["obj"]["hits"]));
		$obj->set("updated",TextFormatter::parse("datetime",$_POST["obj"]["updated"]));
		return $obj;
	}

	public function getFilterBean() : Filter {
		// Deixando os dados na superglobal _POST
		if($_SERVER["REQUEST_METHOD"] == "FILTER"){
			$_POST = HTTPUtils::parsePost();
		}
		
		$filter = new Filter();
		$filter->addFilterField("ipaddr","string",$_POST["filter"]["ipaddr"]);
		$filter->addFilterField("created","datetime",$_POST["filter"]["created"]);
		$filter->addFilterField("type","string",$_POST["filter"]["type"]);
		$filter->addFilterField("name","string",$_POST["filter"]["name"]);
		$filter->addFilterField("hits","integer",$_POST["filter"]["hits"]);
		$filter->addFilterField("updated","datetime",$_POST["filter"]["updated"]);
		
		// ordenação
		$filter->addSort($_POST["order"]["field"],$_POST["order"]["type"]);
		
		// limite
		$filter->setLimit(intval($_POST["limit"]));
		
		// offset
		$filter->setOffset(intval($_POST["offset"]));
		
		return $filter;
	}

	public function getKeysBean(): array {
		$keys = array();
		$keys["ipaddr"] = TextFormatter::parse("string",$_GET["keys"]["ipaddr"]);
		$this->cleanEmptyKeys($keys);
		return $keys;
	}

	public function getEntityKeys(): array {
		$keys = array();
		$keys[] = "ipaddr";
		return $keys;
	}

	public function validate(ObjectVO $obj){
		if($obj->get("ipaddr") === null){
			throw new Exception("Campo \"ipaddr\" vazio");
		}
		if($obj->get("created") === null){
			throw new Exception("Campo \"created\" vazio");
		}
		if($obj->get("type") === null){
			throw new Exception("Campo \"type\" vazio");
		}
		if($obj->get("name") === null){
			throw new Exception("Campo \"name\" vazio");
		}
		if($obj->get("hits") === null){
			throw new Exception("Campo \"hits\" vazio");
		}
	}

	public function setAutoIncrement(PDO $db,ObjectVO &$obj){
	}
}
?>