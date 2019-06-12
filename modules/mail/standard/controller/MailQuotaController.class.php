<?php
namespace zion\mod\mail\standard\controller;

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
abstract class MailQuotaController extends AbstractEntityController {
	public function getFormBean() : ObjectVO {
		// Deixando os dados na superglobal _POST
		if($_SERVER["REQUEST_METHOD"] == "PUT"){
			$_POST = HTTPUtils::parsePost();
		}
		$obj = new ObjectVO();
		$obj->set("mandt",TextFormatter::parse("integer",$_POST["obj"]["mandt"],true));
		$obj->set("user",TextFormatter::parse("string",$_POST["obj"]["user"],true));
		$obj->set("server",TextFormatter::parse("string",$_POST["obj"]["server"],true));
		$obj->set("date",TextFormatter::parse("date",$_POST["obj"]["date"],true));
		$obj->set("hour",TextFormatter::parse("integer",$_POST["obj"]["hour"],true));
		$obj->set("total",TextFormatter::parse("integer",$_POST["obj"]["total"]));
		$obj->set("updated_at",TextFormatter::parse("datetime",$_POST["obj"]["updated_at"]));
		return $obj;
	}

	public function getFilterBean() : Filter {
		// Deixando os dados na superglobal _POST
		if($_SERVER["REQUEST_METHOD"] == "FILTER"){
			$_POST = HTTPUtils::parsePost();
		}
		
		$filter = new Filter();
		$filter->addFilterField("mandt","integer",$_POST["filter"]["mandt"]);
		$filter->addFilterField("user","string",$_POST["filter"]["user"]);
		$filter->addFilterField("server","string",$_POST["filter"]["server"]);
		$filter->addFilterField("date","date",$_POST["filter"]["date"]);
		$filter->addFilterField("hour","integer",$_POST["filter"]["hour"]);
		$filter->addFilterField("total","integer",$_POST["filter"]["total"]);
		$filter->addFilterField("updated_at","datetime",$_POST["filter"]["updated_at"]);
		
		// ordenação
		$filter->addSort($_POST["order"]["field"],$_POST["order"]["type"]);
		
		// limite
		$filter->setLimit(intval($_POST["limit"]));
		
		// offset
		$filter->setOffset(intval($_POST["offset"]));
		
		return $filter;
	}

	public function getKeysBean(): array {
		$parts = $this->getPrimaryKeyFromURI();
		$keys = array();
		$keys["mandt"] = TextFormatter::parse("integer",$parts[0]);
		$keys["user"] = TextFormatter::parse("string",$parts[1]);
		$keys["server"] = TextFormatter::parse("string",$parts[2]);
		$keys["date"] = TextFormatter::parse("date",$parts[3]);
		$keys["hour"] = TextFormatter::parse("integer",$parts[4]);
		$this->cleanEmptyKeys($keys);
		return $keys;
	}

	public function getEntityKeys(): array {
		$keys = array();
		$keys[] = "mandt";
		$keys[] = "user";
		$keys[] = "server";
		$keys[] = "date";
		$keys[] = "hour";
		return $keys;
	}

	public function validate(ObjectVO $obj){
		if($obj->get("total") === null){
			throw new Exception("Campo \"total\" vazio");
		}
		if($obj->get("updated_at") === null){
			throw new Exception("Campo \"updated_at\" vazio");
		}
	}

	public function setAutoIncrement(PDO $db,ObjectVO &$obj){
		$dao = System::getDAO();
		if($obj->get("mandt") === null){
			$obj->set("mandt",$dao->getNextId($db,"MailQuota-mandt"));
		}
		if($obj->get("user") === null){
			$obj->set("user",$dao->getNextId($db,"MailQuota-user"));
		}
		if($obj->get("server") === null){
			$obj->set("server",$dao->getNextId($db,"MailQuota-server"));
		}
		if($obj->get("date") === null){
			$obj->set("date",$dao->getNextId($db,"MailQuota-date"));
		}
		if($obj->get("hour") === null){
			$obj->set("hour",$dao->getNextId($db,"MailQuota-hour"));
		}
	}
}
?>