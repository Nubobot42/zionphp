<?php
use zion\orm\Filter;
use zion\core\System;
use zion\mod\builder\model\Text;
$t = Text::getEntityTexts("mail","User");
$fields = array("mandt","user","password","server","status","hourly_quota","daily_quota","sent_success","sent_error");
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
	<form class="form-inline hide-advanced-fields ajaxform" action="/zion/rest/mail/User/" method="POST" data-callback="defaultFilterCallback">
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
						<label for="filter[password][low]" alt="<?=$t->tip("password")?>" title="<?=$t->tip("password")?>">
							<?=$t->field("password")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[password][operator]" name="filter[password][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[password][low]" name="filter[password][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[password][high]" name="filter[password][high]" rows="1"></textarea>
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
						<label for="filter[status][low]" alt="<?=$t->tip("status")?>" title="<?=$t->tip("status")?>">
							<?=$t->field("status")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[status][operator]" name="filter[status][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-string" id="filter[status][low]" name="filter[status][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-string" id="filter[status][high]" name="filter[status][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[hourly_quota][low]" alt="<?=$t->tip("hourly_quota")?>" title="<?=$t->tip("hourly_quota")?>">
							<?=$t->field("hourly_quota")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[hourly_quota][operator]" name="filter[hourly_quota][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[hourly_quota][low]" name="filter[hourly_quota][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[hourly_quota][high]" name="filter[hourly_quota][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[daily_quota][low]" alt="<?=$t->tip("daily_quota")?>" title="<?=$t->tip("daily_quota")?>">
							<?=$t->field("daily_quota")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[daily_quota][operator]" name="filter[daily_quota][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[daily_quota][low]" name="filter[daily_quota][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[daily_quota][high]" name="filter[daily_quota][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[sent_success][low]" alt="<?=$t->tip("sent_success")?>" title="<?=$t->tip("sent_success")?>">
							<?=$t->field("sent_success")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[sent_success][operator]" name="filter[sent_success][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[sent_success][low]" name="filter[sent_success][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[sent_success][high]" name="filter[sent_success][high]" rows="1"></textarea>
					</div>
				</div>
				<div class="row row-filter-advanced">
					<div class="col-sm-3">
						<label for="filter[sent_error][low]" alt="<?=$t->tip("sent_error")?>" title="<?=$t->tip("sent_error")?>">
							<?=$t->field("sent_error")?>
						</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control filter-operator" id="filter[sent_error][operator]" name="filter[sent_error][operator]">
							<option value=""></option>
							<?foreach(Filter::getOperators() AS $key => $text){?>
							<option value="<?=$key?>"><?=$text?></option>
							<?}?>
						</select>
						
						<textarea class="form-control filter-low type-integer" id="filter[sent_error][low]" name="filter[sent_error][low]" rows="1"></textarea>
						<textarea class="form-control filter-high type-integer" id="filter[sent_error][high]" name="filter[sent_error][high]" rows="1"></textarea>
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
				<a id="button-new" class="btn btn-outline-info" href="/zion/mod/mail/User/new" target="_blank">Novo</a>
			</div>
		</div>
	</form>

	<div id="filter-result">
		<div class="container-fluid">Execute o filtro</div>
	</div>
</div></div>