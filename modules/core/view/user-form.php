<?php
use zion\core\System;
use zion\utils\TextFormatter;
$obj = System::get("obj");
$action = System::get("action");
?>
<div class="body-content-limit container-fluid">

	<form class="form-horizontal ajaxform form-<?=$action?>" action="/zion/mod/core/User/save" method="POST" data-callback="defaultRegisterCallback">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Formulário</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[userid]">userid</label>
					<div class="col-md-4">
						<input id="obj[userid]" name="obj[userid]" type="text" class="form-control input-md type-integer" value="<?=TextFormatter::format("integer",$obj->get("userid"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[login]">login</label>
					<div class="col-md-4">
						<input id="obj[login]" name="obj[login]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("login"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[password]">password</label>
					<div class="col-md-4">
						<input id="obj[password]" name="obj[password]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("password"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[force_new_password]">force_new_password</label>
					<div class="col-md-4">
						<input id="obj[force_new_password]" name="obj[force_new_password]" type="text" class="form-control input-md type-integer" value="<?=TextFormatter::format("integer",$obj->get("force_new_password"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[redefine_password_hash]">redefine_password_hash</label>
					<div class="col-md-4">
						<input id="obj[redefine_password_hash]" name="obj[redefine_password_hash]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("redefine_password_hash"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[name]">name</label>
					<div class="col-md-4">
						<input id="obj[name]" name="obj[name]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("name"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[email]">email</label>
					<div class="col-md-4">
						<input id="obj[email]" name="obj[email]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("email"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[phone]">phone</label>
					<div class="col-md-4">
						<input id="obj[phone]" name="obj[phone]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("phone"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[docf]">docf</label>
					<div class="col-md-4">
						<input id="obj[docf]" name="obj[docf]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("docf"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[doce]">doce</label>
					<div class="col-md-4">
						<input id="obj[doce]" name="obj[doce]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("doce"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[docm]">docm</label>
					<div class="col-md-4">
						<input id="obj[docm]" name="obj[docm]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("docm"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[validity_begin]">validity_begin</label>
					<div class="col-md-4">
						<input id="obj[validity_begin]" name="obj[validity_begin]" type="text" class="form-control input-md type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("validity_begin"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[validity_end]">validity_end</label>
					<div class="col-md-4">
						<input id="obj[validity_end]" name="obj[validity_end]" type="text" class="form-control input-md type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("validity_end"))?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="obj[status]">status</label>
					<div class="col-md-4">
						<input id="obj[status]" name="obj[status]" type="text" class="form-control input-md type-string" value="<?=TextFormatter::format("string",$obj->get("status"))?>">
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<?if(in_array($action,array("new","edit"))){?>
				<button type="submit" id="register-button" class="btn btn-primary">Salvar</button>
				<?}?>
				<button type="button" class="btn btn-default button-close">Fechar</button>
			</div>
		</div>
	</form>

</div>