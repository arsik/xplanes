<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Магазин - Покупка денежных средств";

$user = Yii::$app->user->identity;
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12 offset-md-3">
			<div class="ui-block">
		        <div class="ui-block-tabs">
					<a href="#" class="ui-block-tabs-item active">Покупка денежных средств</a>
					<a href="/site/donate?type=clan" class="ui-block-tabs-item">Создать клан</a>
				</div>
				<div class="ui-block-content">
					<form id="donate" action="/site/donate?type=money" method="POST">
					 	<input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
						<div class="form-group label-floating is-focused">
							<label class="control-label">Никнейм</label>
							<input class="form-control" type="text" placeholder="" value="<?=$user->pName?>" disabled>
							<span class="material-input"></span>
						</div>	
						<div class="form-group label-floating">
							<label class="control-label">E-Mail</label>
							<input class="form-control email" type="text" name="email" placeholder="" value="" required>
							<span class="material-input"></span>
						</div>			
						<div class="form-group label-floating">
							<label class="control-label">Сумма пополнения</label>
							<input class="form-control amount" type="text" name="amount" value="0">
							<span class="material-input"></span>
						</div>
						<div class="donate-error">*Сумма должна быть не менее 10 руб.</b></div>
						<div class="donate-echo">Вы получите: <b>$0</b></div>
						<table class="table">
							<tr>
								<td>от 10 до 100 руб.</td>
								<td>$750 за 1 руб.</td>
							</tr>
							<tr>
								<td>от 100 до 500 руб.</td>
								<td>$1000 за 1 руб.</td>
							</tr>
							<tr>
								<td>от 500 до 1000 руб.</td>
								<td>$1200 за 1 руб.</td>
							</tr>
							<tr>
								<td>от 1000 руб.</td>
								<td>$1500 за 1 руб.</td>
							</tr>
						</table>	
						<a href="#" id="form-submit" class="btn btn-lg <?=($user->pOnline ? 'btn-primary' : 'btn-blue')?> full-width"><?=($user->pOnline ? 'Нельзя пополнить баланс находясь на сервере!' : 'Пополнить')?></a>	
					</form>
					
					
        		</div>
      		</div>
    	</div>
  	</div>
</div>


<?php

$script = <<< JS

var donate_form = $('#donate');
var donate_input_amount = donate_form.find('input.amount');
var donate_input_email = donate_form.find('input.email');
var donate_echo = donate_form.find('.donate-echo > b');
var donate_error = donate_form.find('.donate-error');
var donate_submit = donate_form.find('#form-submit');

function getMoney(amount)
{
	var donate = amount;
	if(amount >= 0 && amount < 100) donate *= 750;
	else if(amount >= 100 && amount < 500) donate *= 1000;
	else if(amount >= 500 && amount < 1000) donate *= 1200;
	else if(amount >= 1000) donate *= 1500;
	return donate;
}
function checkError(amount)
{
	if(amount < 10) {
		donate_error.fadeIn(500);
	}
	else {
		donate_error.fadeOut(500);
	}
}	

$(donate_input_amount).keyup(function() {
	var v = $(donate_input_amount).val();
	$(donate_input_amount).val(parseInt(v));
	checkError(v);
	donate_echo.empty().text('$' + getMoney(v));
});

$(donate_input_amount).bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});

$(donate_submit).on('click', function(e) {
	if($(this).hasClass('btn-primary'))
	{
		alert('Нельзя пополнить баланс находясь на сервере!');
		return false;
	}
	else if(parseInt($(donate_input_amount).val()) < 10 || $(donate_input_amount).val() == '') 
	{
		alert('Сумма должна быть не менее 10 руб.');
		return false;
	}
	else if($(donate_input_email).val() == '')
	{
		alert('Необходимо заполнить поле E-Mail.');
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