<?php
namespace zion\mod\mail\controller;

use zion\mod\mail\standard\controller\QuotaController AS StandardQuotaController;

/**
 * Classe gerada pelo Zion Framework em 12/06/2019
 */
class QuotaController extends StandardQuotaController {
	public function __construct(){
		parent::__construct(get_class($this),array(
			"table" => "zion_mail_quota"
		));
	}
}
?>