<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (!empty($arResult)): ?>

<ul class="site-menu js-clone-nav d-none d-lg-block" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <? $previousLevel = 0; ?>
		<? foreach ($arResult as $key => $arItem): ?>
			<? if($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
				echo str_repeat("</li></ul>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>

			<?if($arItem['DEPTH_LEVEL'] == 1 && $arItem['IS_PARENT'] == 1): ?>
                <li class="has-children <? if ($arItem['SELECTED']=='Y'):?> active <?endif;?>" id="element<?=$key?>">
					<a href="<?=$arItem['LINK']?>" itemprop="url"><?=$arItem['TEXT']?></a>
                    <ul class="dropdown arrow-top">
			<? else: ?>
                <li class="<? if ($arItem['SELECTED']=='Y'):?> active <?endif;?>" id="element<?=$key?>">
                    <a href="<?=$arItem['LINK']?>" itemprop="url"><?=$arItem['TEXT']?></a>
			<? endif; ?>
			<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
		<? endforeach; ?>
		<? if ($previousLevel > 1)
			echo str_repeat("</li></ul>", ($previousLevel-1) );
		?>
	</ul>
<? endif; ?>