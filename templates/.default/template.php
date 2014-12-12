<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$itd_req = function ($key) use ($arResult)
{
	if ($arResult['FIELDS_REQUIRED'][$key]) return 'required="required"';
}
?>

<div class="itd-msgs"></div>
<form class="uk-form" method="post" id="itd-form-mail">
	<div class="uk-grid uk-grid-small">
		<div class="uk-width-1-3">
			<? if($arResult['FIELDS']['NAME']): ?>
			<input placeholder="ФИО" name="NAME" class="uk-width-1-1 uk-form-large" type="text" <?= $itd_req('NAME') ?>>
			<? endif ?>
		</div>
		<div class="uk-width-1-3">
			<? if($arResult['FIELDS']['PHONE']): ?>
			<input placeholder="Телефон" name="PHONE" class="uk-width-1-1 uk-form-large" type="text" <?= $itd_req('PHONE') ?>>
			<? endif ?>
		</div>
		<div class="uk-width-1-3">
			<? if($arResult['FIELDS']['EMAIL']): ?>
			<input placeholder="E-mail" name="EMAIL" class="uk-width-1-1 uk-form-large" type="text" <?= $itd_req('EMAIL') ?>>
			<? endif ?>
		</div>
	</div>
	<div class="uk-grid uk-grid-small">
		<div class="uk-width-1-1">
			<? if($arResult['FIELDS']['MSG']): ?>
			<textarea <?= $itd_req('MSG') ?> class="uk-width-1-1" name="MSG" placeholder="Сообщение.." cols="30" rows="10"></textarea>
			<? endif ?>
		</div>
	</div>
	<div class="uk-grid uk-grid-small uk-margin-bottom">
		<div class="uk-width-1-1 uk-text-right">
			<button class="uk-button uk-button-large uk-button-danger" 
					onclick="return itd_send_form($('#itd-form-mail'))" 
					type="submit"
			>Отправить</button>
		</div>
	</div>
</form>

