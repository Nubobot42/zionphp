<?php
use zion\orm\Filter;
use zion\core\System;
use zion\mod\builder\model\Text;
$t = Text::getEntityTexts("mail","SendLog");
$fields = array("mandt","logid","created","server","user","from","to","subject","content_type","content_body_size","attachment_count","result","result_message");
sort($fields);
?>
<div class="center-content filter-page">
<div class="container-fluid">

	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/zion/mod/core/User/home">Início</a></li>
			<li class="breadcrumb-item"><a href="/zion/mod/mail/"><?=$t->module()?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Consulta de <?=$t->entity()?></li>
		</ol>
	</nav>
<h3>Consulta de <?=$t->entity()?></h3>
	<form class="form-inline hide-advanced-fields ajaxform" action="/zion/rest/mail/SendLog/" method="POST" data-callback="defaultFilterCallback">
		<br>
		<div class="card">
			<div class="card-header">
				Filtro
			</div>
			<div class="card-body">
				<div class="row row-filter-normal">
					<div class="col-sm-3">
						<label for="filter[mandt][low]" alt="<?=$t->tip("mandt")?>" title="<?=$t->tip("mandt")?>">
							<?=$t->field("mandt")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[mandt][operator]" name="filter[mandt][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[mandt][low]" name="filter[mandt][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[mandt][high]" name="filter[mandt][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-normal">
					<div class="col-sm-3">
						<label for="filter[logid][low]" alt="<?=$t->tip("logid")?>" title="<?=$t->tip("logid")?>">
							<?=$t->field("logid")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[logid][operator]" name="filter[logid][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[logid][low]" name="filter[logid][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[logid][high]" name="filter[logid][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[created][low]" alt="<?=$t->tip("created")?>" title="<?=$t->tip("created")?>">
							<?=$t->field("created")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[created][operator]" name="filter[created][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-datetime" id="filter[created][low]" name="filter[created][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-datetime" id="filter[created][high]" name="filter[created][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[server][low]" alt="<?=$t->tip("server")?>" title="<?=$t->tip("server")?>">
							<?=$t->field("server")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[server][operator]" name="filter[server][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[server][low]" name="filter[server][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[server][high]" name="filter[server][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[user][low]" alt="<?=$t->tip("user")?>" title="<?=$t->tip("user")?>">
							<?=$t->field("user")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[user][operator]" name="filter[user][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[user][low]" name="filter[user][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[user][high]" name="filter[user][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[from][low]" alt="<?=$t->tip("from")?>" title="<?=$t->tip("from")?>">
							<?=$t->field("from")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[from][operator]" name="filter[from][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[from][low]" name="filter[from][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[from][high]" name="filter[from][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[to][low]" alt="<?=$t->tip("to")?>" title="<?=$t->tip("to")?>">
							<?=$t->field("to")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[to][operator]" name="filter[to][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[to][low]" name="filter[to][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[to][high]" name="filter[to][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[subject][low]" alt="<?=$t->tip("subject")?>" title="<?=$t->tip("subject")?>">
							<?=$t->field("subject")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[subject][operator]" name="filter[subject][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[subject][low]" name="filter[subject][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[subject][high]" name="filter[subject][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[content_type][low]" alt="<?=$t->tip("content_type")?>" title="<?=$t->tip("content_type")?>">
							<?=$t->field("content_type")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[content_type][operator]" name="filter[content_type][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[content_type][low]" name="filter[content_type][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[content_type][high]" name="filter[content_type][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[content_body_size][low]" alt="<?=$t->tip("content_body_size")?>" title="<?=$t->tip("content_body_size")?>">
							<?=$t->field("content_body_size")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[content_body_size][operator]" name="filter[content_body_size][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[content_body_size][low]" name="filter[content_body_size][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[content_body_size][high]" name="filter[content_body_size][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[attachment_count][low]" alt="<?=$t->tip("attachment_count")?>" title="<?=$t->tip("attachment_count")?>">
							<?=$t->field("attachment_count")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[attachment_count][operator]" name="filter[attachment_count][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[attachment_count][low]" name="filter[attachment_count][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[attachment_count][high]" name="filter[attachment_count][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[result][low]" alt="<?=$t->tip("result")?>" title="<?=$t->tip("result")?>">
							<?=$t->field("result")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[result][operator]" name="filter[result][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[result][low]" name="filter[result][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[result][high]" name="filter[result][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[result_message][low]" alt="<?=$t->tip("result_message")?>" title="<?=$t->tip("result_message")?>">
							<?=$t->field("result_message")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[result_message][operator]" name="filter[result_message][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[result_message][low]" name="filter[result_message][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[result_message][high]" name="filter[result_message][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="order[field]">Ordenação</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control" id="order[field]" name="order[field]">
							<option value=""></option>
							<?foreach($fields AS $key){?>
							<option value="<?=$key?>"><?=$key?></option>
							<?}?>
						</select>
						
						<select class="form-control" id="order[type]" name="order[type]">
							<option value=""></option>
							<option value="ASC">ASC</option>
							<option value="DESC">DESC</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="limit">Limite</label>
					</div>
					<div class="col-sm-9">
						<input class="form-control type-integer" id="limit" name="limit" value="100">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="offset">Ignorar</label>
					</div>
					<div class="col-sm-9">
						<input class="form-control type-integer" id="offset" name="offset" value="0">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" id="filter-button" class="btn btn-primary">Filtrar</button>
				<button type="button" id="button-filter-basic" class="btn btn-outline-secondary">Basico</button>
				<button type="button" id="button-filter-advanced" class="btn btn-outline-secondary">Avançado</button>
				<a id="button-new" class="btn btn-outline-info" href="/zion/mod/mail/SendLog/new" target="_blank">Novo</a>
			</div>
		</div>
	</form>

	<div id="filter-result">
		<div class="container-fluid">Execute o filtro</div>
	</div>
</div></div>