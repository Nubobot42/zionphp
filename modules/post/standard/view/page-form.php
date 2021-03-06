<?php
use zion\core\System;
use zion\utils\TextFormatter;
use zion\mod\builder\model\Text;
$obj = System::get("obj");
$action = System::get("action");
$method = ($action == "edit")?"PUT":"POST";
$keys = $obj->toQueryStringKeys(array("mandt","pageid"));
$t = Text::getEntityTexts("post","Page");
?>
<div class="center-content form-page">
<div class="container-fluid">

	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/zion/mod/core/User/home">Início</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/post/"><?=$t->module()?></a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/post/Page/list">Consulta de <?=$t->entity()?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Formulario de <?=$t->entity()?></li>
		</ol>
	</nav>
	<h3>Formulário de <?=$t->entity()?></h3>
	<form class="form-horizontal ajaxform form-<?=$action?>" action="/zion/rest/post/Page/" method="<?=$method?>" data-callback="defaultRegisterCallback" data-accept="text/plain">
		<br>
		<div class="card">
			<div class="card-header">
				Formulário
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="pk control-label" for="obj[mandt]" alt="<?=$t->tip("mandt")?>" title="<?=$t->tip("mandt")?>">
							<?=$t->field("mandt")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[mandt]" name="obj[mandt]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("mandt"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="pk control-label" for="obj[pageid]" alt="<?=$t->tip("pageid")?>" title="<?=$t->tip("pageid")?>">
							<?=$t->field("pageid")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[pageid]" name="obj[pageid]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("pageid"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[rewrite]" alt="<?=$t->tip("rewrite")?>" title="<?=$t->tip("rewrite")?>">
							<?=$t->field("rewrite")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[rewrite]" name="obj[rewrite]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("rewrite"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[title]" alt="<?=$t->tip("title")?>" title="<?=$t->tip("title")?>">
							<?=$t->field("title")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[title]" name="obj[title]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("title"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[categoryid]" alt="<?=$t->tip("categoryid")?>" title="<?=$t->tip("categoryid")?>">
							<?=$t->field("categoryid")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[categoryid]" name="obj[categoryid]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("categoryid"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[content_html]" alt="<?=$t->tip("content_html")?>" title="<?=$t->tip("content_html")?>">
							<?=$t->field("content_html")?>
						</label>
					</div>
					<div class="col-sm-5">
						<textarea id="obj[content_html]" name="obj[content_html]" class="form-control type-string" required><?=TextFormatter::format("string",$obj->get("content_html"))?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[created_at]" alt="<?=$t->tip("created_at")?>" title="<?=$t->tip("created_at")?>">
							<?=$t->field("created_at")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[created_at]" name="obj[created_at]" type="text" class="form-control type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("created_at"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[created_by]" alt="<?=$t->tip("created_by")?>" title="<?=$t->tip("created_by")?>">
							<?=$t->field("created_by")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[created_by]" name="obj[created_by]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("created_by"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[updated_at]" alt="<?=$t->tip("updated_at")?>" title="<?=$t->tip("updated_at")?>">
							<?=$t->field("updated_at")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[updated_at]" name="obj[updated_at]" type="text" class="form-control type-datetime" value="<?=TextFormatter::format("datetime",$obj->get("updated_at"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[updated_by]" alt="<?=$t->tip("updated_by")?>" title="<?=$t->tip("updated_by")?>">
							<?=$t->field("updated_by")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[updated_by]" name="obj[updated_by]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("updated_by"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[meta_description]" alt="<?=$t->tip("meta_description")?>" title="<?=$t->tip("meta_description")?>">
							<?=$t->field("meta_description")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[meta_description]" name="obj[meta_description]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("meta_description"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[meta_keywords]" alt="<?=$t->tip("meta_keywords")?>" title="<?=$t->tip("meta_keywords")?>">
							<?=$t->field("meta_keywords")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[meta_keywords]" name="obj[meta_keywords]" type="text" class="form-control type-string" value="<?=TextFormatter::format("string",$obj->get("meta_keywords"))?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[http_status]" alt="<?=$t->tip("http_status")?>" title="<?=$t->tip("http_status")?>">
							<?=$t->field("http_status")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[http_status]" name="obj[http_status]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("http_status"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[cache_maxage]" alt="<?=$t->tip("cache_maxage")?>" title="<?=$t->tip("cache_maxage")?>">
							<?=$t->field("cache_maxage")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[cache_maxage]" name="obj[cache_maxage]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("cache_maxage"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[cache_smaxage]" alt="<?=$t->tip("cache_smaxage")?>" title="<?=$t->tip("cache_smaxage")?>">
							<?=$t->field("cache_smaxage")?>
						</label>
					</div>
					<div class="col-sm-5">
						<input id="obj[cache_smaxage]" name="obj[cache_smaxage]" type="text" class="form-control type-integer" value="<?=TextFormatter::format("integer",$obj->get("cache_smaxage"))?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="obj[use_template]" alt="<?=$t->tip("use_template")?>" title="<?=$t->tip("use_template")?>">
							<?=$t->field("use_template")?>
						</label>
					</div>
					<div class="col-sm-5">
						<?php
						$checked1 = "";
						$checked0 = "";
						if($obj->get("use_template") === true){
							$checked1 = " CHECKED";
							$checked0 = "";
						}elseif($obj->get("use_template") === false){
							$checked1 = "";
							$checked0 = " CHECKED";
						}
						?>
						<label class="radio-inline" for="obj[use_template]-1">
							<input type="radio" name="obj[use_template]" id="obj[use_template]-1" value="true"<?=$checked1?>>
							Sim
						</label>
						<label class="radio-inline" for="obj[use_template]-0">
							<input type="radio" name="obj[use_template]" id="obj[use_template]-0" value="false"<?=$checked0?>>
							Não
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="required control-label" for="obj[status]" alt="<?=$t->tip("status")?>" title="<?=$t->tip("status")?>">
							<?=$t->field("status")?>
						</label>
					</div>
					<div class="col-sm-5">
						<select id="obj[status]" name="obj[status]" class="form-control type-string" required>
							<option></option>
							<?
							$list = System::get("tabval","status");
							$list = (is_array($list)?$list:array());
							?>
							<?foreach($list AS $item){
								$SELECTED = "";
								if($item->get("key") == $obj->get("status")){
									$SELECTED = " SELECTED";
								}
								?>
							<option value="<?=$item->get("key")?>"<?=$SELECTED?>><?=$item->get("value")?></option>
							<?}?>
						</select>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<?if(in_array($action,array("new","edit"))){?>
				<button type="submit" class="btn btn-outline-primary" id="register-button">Salvar</button>
				<?}?>
				<?if(in_array($action,array("edit"))){?>
				<button type="button" class="btn btn-outline-danger button-delete" data-url="/zion/rest/post/Page/?<?=$keys?>">Remover</button>
				<?}?>
				<a class="btn btn-outline-info button-new" href="/zion/mod/post/Page/new">Novo</a>
				<button type="button" class="btn btn-outline-secondary button-close">Fechar</button>
			</div>
		</div>
	</form>

</div>
</div>