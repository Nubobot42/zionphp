<?php
use zion\core\System;
use zion\utils\TextFormatter;
use zion\mod\builder\model\Text;
$obj = System::get("obj");
$action = System::get("action");
$method = ($action == "edit")?"PUT":"POST";
$keys = $obj->toQueryStringKeys(array("errorid"));
$t = Text::getEntityTexts("error","Log");
?>
<div class="center-content form-page">
<div class="container-fluid">

	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/zion/mod/core/User/home">Início</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/error/"><?=$t->module()?></a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/error/Log/list">Consulta de <?=$t->entity()?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Formulario de <?=$t->entity()?></li>
		</ol>
	</nav>
	<h3>Formulário de <?=$t->entity()?></h3>
	<form class="form-horizontal ajaxform form-<?=$action?>" action="/zion/rest/error/Log/" method="<?=$method?>" data-callback="defaultRegisterCallback" data-accept="text/plain">
		<br>
		<div class="card">
			<div class="card-header">
				Formulário
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="pk required control-label" for="obj[errorid]" alt="<?=$t->tip("errorid")?>" title="<?=$t->tip("errorid")?>">
							<?=$t->field("errorid")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[errorid]" name="obj[errorid]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("errorid"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[type]" alt="<?=$t->tip("type")?>" title="<?=$t->tip("type")?>">
							<?=$t->field("type")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[type]" name="obj[type]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("type"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[created]" alt="<?=$t->tip("created")?>" title="<?=$t->tip("created")?>">
							<?=$t->field("created")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[created]" name="obj[created]" type="text" class="form-control type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("created"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[duration]" alt="<?=$t->tip("duration")?>" title="<?=$t->tip("duration")?>">
							<?=$t->field("duration")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[duration]" name="obj[duration]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("duration"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[http_ipaddr]" alt="<?=$t->tip("http_ipaddr")?>" title="<?=$t->tip("http_ipaddr")?>">
							<?=$t->field("http_ipaddr")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[http_ipaddr]" name="obj[http_ipaddr]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("http_ipaddr"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[http_method]" alt="<?=$t->tip("http_method")?>" title="<?=$t->tip("http_method")?>">
							<?=$t->field("http_method")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[http_method]" name="obj[http_method]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("http_method"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[http_uri]" alt="<?=$t->tip("http_uri")?>" title="<?=$t->tip("http_uri")?>">
							<?=$t->field("http_uri")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[http_uri]" name="obj[http_uri]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("http_uri"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[level]" alt="<?=$t->tip("level")?>" title="<?=$t->tip("level")?>">
							<?=$t->field("level")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[level]" name="obj[level]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("level"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[code]" alt="<?=$t->tip("code")?>" title="<?=$t->tip("code")?>">
							<?=$t->field("code")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[code]" name="obj[code]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("code"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[message]" alt="<?=$t->tip("message")?>" title="<?=$t->tip("message")?>">
							<?=$t->field("message")?>
						</label>
					</div>
					<div class="col-sm-5">
						<textarea id="obj[message]" name="obj[message]" class="form-control type-string"><?=TextFormatter::format("string",$obj->get("message"))?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[stack]" alt="<?=$t->tip("stack")?>" title="<?=$t->tip("stack")?>">
							<?=$t->field("stack")?>
						</label>
					</div>
					<div class="col-sm-5">
						<textarea id="obj[stack]" name="obj[stack]" class="form-control type-string"><?=TextFormatter::format("string",$obj->get("stack"))?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[input]" alt="<?=$t->tip("input")?>" title="<?=$t->tip("input")?>">
							<?=$t->field("input")?>
						</label>
					</div>
					<div class="col-sm-5">
						<textarea id="obj[input]" name="obj[input]" class="form-control type-string"><?=TextFormatter::format("string",$obj->get("input"))?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[file]" alt="<?=$t->tip("file")?>" title="<?=$t->tip("file")?>">
							<?=$t->field("file")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[file]" name="obj[file]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("file"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[line]" alt="<?=$t->tip("line")?>" title="<?=$t->tip("line")?>">
							<?=$t->field("line")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[line]" name="obj[line]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("line"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[status]" alt="<?=$t->tip("status")?>" title="<?=$t->tip("status")?>">
							<?=$t->field("status")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[status]" name="obj[status]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("status"))?>" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<?if(in_array($action,array("new","edit"))){?>
				<button type="submit" class="btn btn-outline-primary" id="register-button">Salvar</button>
				<?}?>
				<?if(in_array($action,array("edit"))){?>
				<button type="button" class="btn btn-outline-danger button-delete" data-url="/zion/rest/error/Log/?<?=$keys?>">Remover</button>
				<?}?>
				<a class="btn btn-outline-info button-new" href="/zion/mod/error/Log/new">Novo</a>
				<button type="button" class="btn btn-outline-secondary button-close">Fechar</button>
			</div>
		</div>
	</form>

</div>
</div>