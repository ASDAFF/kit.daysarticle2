<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode(true); ?>
		<!-- second view -->
<?if(count($arResult["ITEMS"])>0):?>
	<?foreach($arResult["ITEMS"] as $key => $arItem):?>
		<? if (isset($arItem['OFFERS']) && !empty($arItem['OFFERS'])) { 
			$element = $arItem['OFFERS'][0];
		 } else {
			$element = $arItem;
		 } 
		 if (isset($arItem['OFFERS'][0]['DAYSARTICLE2']) && !empty($arItem['OFFERS'][0]['DAYSARTICLE2'])) { 
			$timer = $arItem['OFFERS'][0]['DAYSARTICLE2'];
		 } else {
			$timer = $arItem['DAYSARTICLE2'];
		 } ?>
		<div class="flat_wrap daysarticle view1" id="<?=$element['ID']?>">
			<div class="top_info">
				<div class="left_part">
					<h4><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h4>
					<div class="discount_price"><?=$element["PRICES"][$arParams["PRICE_CODE"]]["PRINT_VALUE"]?><span class="rub" style="display: none;">?</span></div>
					<div class="price"><?=$element["PRICES"][$arParams["PRICE_CODE"]]["PRINT_DISCOUNT_VALUE"]?></div>
					<div class="discount"><span><?=GetMessage("DISCOUNT_VALUE")?></span> <?=$timer["DISCOUNT_FORMATED"]?><div class="triangle"></div></div>
				</div>
				<div class="right_part">
					<?if($arItem["PREVIEW_PICTURE"]["SRC"]!=""):?>
						<a class="img_wrap" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["TRUE_SIZE"][0]?>" height="<?=$arItem["PREVIEW_PICTURE"]["TRUE_SIZE"][1]?>" border="" alt="" />
						</a>
					<?elseif($arItem["DETAIL_PICTURE"]["SRC"]!=""):?>
						<a class="img_wrap" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arItem["DETAIL_PICTURE"]["TRUE_SIZE"][0]?>" height="<?=$arItem["DETAIL_PICTURE"]["TRUE_SIZE"][1]?>" border="" alt="" />
						</a>
					<?endif;?>
				</div>
			</div>
			<div class="bottom_info">
				<div class="time_icon_wrap">
					<!-- <div class="tinytriangle"></div> -->
					<div class="time_icon"></div>
					<!-- <div class="triangle"></div> -->
				</div>
				<div class="title">
					<?=GetMessage("DA2_BLOCK_TITLE")?>
				</div>
				<div class="digits" data-dateto="<? echo strtotime($timer['DATE_TO']); ?>">
					<div class="time">
						<span><?=GetMessage("DA2_TIME")?></span>
						<? if ($timer["TIMER"]["DAYS"]==0) { ?>
							<div class="digit" id="hours"><div class="digit_outter"><span class="number js-hours" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_HOUR")?></span></div>
							<div class="digit" id="minutes"><div class="digit_outter"><span class="number js-minutes" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_MIN")?></span></div>
							<div class="digit" id="seconds"><div class="digit_outter"><span class="number js-seconds" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_SEC")?></span></div>
						<? } else { ?>
							<div class="digit" id="days"><div class="digit_outter"><span class="number js-days" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_DAY")?></span></div>
							<div class="digit" id="hours"><div class="digit_outter"><span class="number js-hours" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_HOUR")?></span></div>
							<div class="digit" id="minutes"><div class="digit_outter"><span class="number js-minutes" data-time=""></span><hr></div><span><?=GetMessage("DA2_TIME_MIN")?></span></div>
						<? } ?>
					</div>
					<div class="percentage">
						<span><?=GetMessage("DA2_TO_THE_END")?></span>
						<div class="digit progress"><div class="digit_outter"><span class="number"><?=$timer["DINAMICA_EX"]["PHP_DATA"]["persent"]?></span><hr></div></div><span class="quantity">%</span>
					</div>
				</div>
			</div>
		</div>
	<? endforeach; ?>
<? endif; ?>
		<!-- /second view -->