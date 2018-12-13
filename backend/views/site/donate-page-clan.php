<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Магазин - Создать клан";

$user = Yii::$app->user->identity;
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12 offset-md-3">
			<div class="ui-block">
		        <div class="ui-block-tabs">
					<a href="/site/donate?type=money" class="ui-block-tabs-item">Покупка денежных средств</a>
					<a href="#" class="ui-block-tabs-item active">Создать клан</a>
				</div>
				<div class="ui-block-content">
					<form id="donate" action="/site/donate?type=clan" method="POST">
					 	<input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
					 	<div class="donate-error" <?=$error ? 'style="display:block;"' : ''?>><b><?=$error_message?></b></div>
						<div class="form-group label-floating is-focused">
							<label class="control-label">Лидер</label>
							<input class="form-control" type="text" placeholder="" value="<?=$user->pName?>" disabled>
							<span class="material-input"></span>
						</div>	
						<div class="form-group label-floating">
							<label class="control-label">E-Mail</label>
							<input class="form-control email" type="text" name="email" placeholder="" value="" required>
							<span class="material-input"></span>
						</div>			
						<div class="form-group label-floating">
							<label class="control-label">Название клана</label>
							<input class="form-control clan-name" type="text" name="clan-name" value="" required="">
							<span class="material-input"></span>
						</div>
						<div class="form-group label-floating">
							<label class="control-label">Аббревиатура</label>
							<input class="form-control clan-shortName" type="text" name="clan-shortName" value="" required="">
							<span class="material-input"></span>
						</div>
						<div class="form-group label-floating">
							<label class="control-label">Цвет</label>
							<input class="form-control jscolor clan-color" type="text" name="clan-color" value="FFFFFF" required="" pattern="^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$">
							<span class="material-input"></span>
						</div>
						<div class="donate-echo">Стоимость создания клана: <b>300 руб.</b></div>
						<a href="#" id="form-submit" class="btn btn-lg <?=($user->pOnline ? 'btn-primary' : 'btn-blue')?> full-width"><?=($user->pOnline ? 'Нельзя создать клан находясь на сервере!' : 'Продолжить')?></a>	
					</form>
					
					
        		</div>
      		</div>
    	</div>
  	</div>
</div>


<?php

$this->registerJsFile('/js/jscolor.js',  ['position' => yii\web\View::POS_END]);

$script = <<< JS

var donate_form = $('#donate');
var donate_submit = donate_form.find('#form-submit');

$(donate_submit).on('click', function(e) {

	donate_form = $('#donate');
	var donate_input_clan_name = donate_form.find('input.clan-name');
	var donate_input_clan_shortName = donate_form.find('input.clan-shortName');
	var donate_input_clan_color = donate_form.find('input.clan-color');
	var donate_input_email = donate_form.find('input.email');
	var donate_echo = donate_form.find('.donate-echo > b');
	var donate_error = donate_form.find('.donate-error');

	if($(this).hasClass('btn-primary'))
	{
		alert('Нельзя пополнить баланс находясь на сервере!');
		return false;
	}

	if(donate_input_email.val() == '')
	{
		alert('Необходимо заполнить поле E-Mail.');
		return false;
	}

	if(donate_input_clan_name.val() == '')
	{
		alert('Необходимо заполнить поле Название клана.');
		return false;
	}
	if(donate_input_clan_name.val().length < 4 || donate_input_clan_name.val().length > 24)
	{
		alert('В названии клана должно быть от 4 до 24 символов.');
		return false;
	}

	if(donate_input_clan_shortName.val() == '')
	{
		alert('Необходимо заполнить поле Аббревиатура клана.');
		return false;
	}
	if(donate_input_clan_shortName.val().length < 2 || donate_input_clan_shortName.val().length > 3)
	{
		alert('В аббревиатуре может быть только 2-3 символа.');
		return false;
	}

	if(donate_input_clan_color.val() == '')
	{
		alert('Необходимо заполнить поле Цвет клана.');
		return false;
	}
	if(donate_input_clan_color.val().length != 6)
	{
		alert('Необходимо ввести кооректный код HEX цвета.');
		return false;
	}

	else 
	{
		$(donate_form).submit();
		return false;
	}
	
	e.preventDefault();
});

JS;

$this->registerJs($script);

?>