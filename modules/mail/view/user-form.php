<?php
use zion\core\System;
use zion\utils\TextFormatter;
$obj = System::get("obj");
$action = System::get("action");
$method = ($action == "edit")?"PUT":"POST";
$keys = $obj->toQueryStringKeys(array("mandt","user"));?>
<div class="center-content form-page">
<div class="container-fluid">

	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/zion/mod/core/User/home">Início</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/mail/">mail</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/mail/User/list">Consulta de User</a></li>
			<li class="breadcrumb-item active" aria-current="page">Formulario de User</li>
		</ol>
	</nav>
<h3>Formulário de User</h3>
	<form class="form-horizontal ajaxform form-<?=$action?>" action="/zion/rest/mail/User/" method="<?=$method?>" data-callback="defaultRegisterCallback">
		<br>
		<div class="card">
			<div class="card-header">
				Formulário
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="pk required control-label" for="obj[mandt]">mandt</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[mandt]" name="obj[mandt]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("mandt"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="pk required control-label" for="obj[user]">user</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[user]" name="obj[user]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("user"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[password]">password</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[password]" name="obj[password]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("password"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[server]">server</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[server]" name="obj[server]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("server"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[status]">status</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[status]" name="obj[status]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("status"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[hourly_quota]">hourly_quota</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[hourly_quota]" name="obj[hourly_quota]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("hourly_quota"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[daily_quota]">daily_quota</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[daily_quota]" name="obj[daily_quota]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("daily_quota"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[sent_success]">sent_success</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[sent_success]" name="obj[sent_success]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("sent_success"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[sent_error]">sent_error</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[sent_error]" name="obj[sent_error]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("sent_error"))?>" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<?if(in_array($action,array("new","edit"))){?>
				<button type="submit" class="btn btn-outline-primary" id="register-button">Salvar</button>
				<?}?>
				<?if(in_array($action,array("edit"))){?>
				<button type="button" class="btn btn-outline-danger button-delete" data-url="/zion/rest/mail/User/?<?=$keys?>">Remover</button>
				<?}?>
				<a class="btn btn-outline-info button-new" href="/zion/mod/mail/User/new">Novo</a>
				<button type="button" class="btn btn-outline-secondary button-close">Fechar</button>
			</div>
		</div>
	</form>

</div>
</div>