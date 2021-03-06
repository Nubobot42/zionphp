<?php
use zion\core\System;
use zion\utils\TextFormatter;
use zion\mod\builder\model\Text;
$obj = System::get("obj");
$action = System::get("action");
$method = ($action == "edit")?"PUT":"POST";
$keys = $obj->toQueryStringKeys(array("moduleid"));
$t = Text::getEntityTexts("core","Module");
?>
<div class="center-content form-page">
<div class="container-fluid">

	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/zion/mod/core/User/home">Início</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/core/"><?=$t->module()?></a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/core/Module/list">Consulta de <?=$t->entity()?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Formulario de <?=$t->entity()?></li>
		</ol>
	</nav>
	<h3>Formulário de <?=$t->entity()?></h3>
	<form class="form-horizontal ajaxform form-<?=$action?>" action="/zion/rest/core/Module/" method="<?=$method?>" data-callback="defaultRegisterCallback" data-accept="text/plain">
		<br>
		<div class="card">
			<div class="card-header">
				Formulário
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="pk required control-label" for="obj[moduleid]" alt="<?=$t->tip("moduleid")?>" title="<?=$t->tip("moduleid")?>">
							<?=$t->field("moduleid")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[moduleid]" name="obj[moduleid]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("moduleid"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[name]" alt="<?=$t->tip("name")?>" title="<?=$t->tip("name")?>">
							<?=$t->field("name")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[name]" name="obj[name]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("name"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[category]" alt="<?=$t->tip("category")?>" title="<?=$t->tip("category")?>">
							<?=$t->field("category")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[category]" name="obj[category]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("category"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[description]" alt="<?=$t->tip("description")?>" title="<?=$t->tip("description")?>">
							<?=$t->field("description")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[description]" name="obj[description]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("description"))?>">
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
						<label class="control-label" for="obj[updated]" alt="<?=$t->tip("updated")?>" title="<?=$t->tip("updated")?>">
							<?=$t->field("updated")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[updated]" name="obj[updated]" type="text" class="form-control type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("updated"))?>">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<?if(in_array($action,array("new","edit"))){?>
				<button type="submit" class="btn btn-outline-primary" id="register-button">Salvar</button>
				<?}?>
				<?if(in_array($action,array("edit"))){?>
				<button type="button" class="btn btn-outline-danger button-delete" data-url="/zion/rest/core/Module/?<?=$keys?>">Remover</button>
				<?}?>
				<a class="btn btn-outline-info button-new" href="/zion/mod/core/Module/new">Novo</a>
				<button type="button" class="btn btn-outline-secondary button-close">Fechar</button>
			</div>
		</div>
	</form>

</div>
</div>