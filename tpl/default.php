<?php
use zion\core\System;
use zion\core\Page;
?>
<!DOCTYPE html>
<html lang="<?=System::get("lang")?>">
<head>
    <title><?=Page::getTitle()?></title>
    <meta charset="<?=\zion\CHARSET?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="<?=Page::getMeta("robots")?>">
    <meta name="keywords" content="<?=Page::getMeta("keywords")?>">
    <meta name="description" content="<?=Page::getMeta("description")?>">
    <!-- STYLES -->
    <?=implode("\n\t",Page::cssTags())?>
    <!-- STYLES -->
</head>
<body>
	<?if(Page::showHeader()){require(\zion\ROOT."tpl".\DS."header.php");}?>
    <div id="content"><?require(Page::getInclude());?></div>
	<div class="clearfix"></div>
    <?if(Page::showFooter()){require(\zion\ROOT."tpl".\DS."footer.php");}?>
    <!-- SCRIPTS -->
	<?=implode("\n\t",Page::jsTags())?>
	<!-- SCRIPTS -->
</body>
</html>