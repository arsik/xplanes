<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Магазин";
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
		        <div class="ui-block-title">
					<h6 class="title"><?= Html::encode($this->title) ?></h6>
				</div>
				<div class="ui-block-content">

					<?= \yarcode\freekassa\RedirectForm::widget([
					'message' => 'Перенаправление на платежную систему...',
					'api' => Yii::$app->get('freeKassa'),
					'invoiceId' => $invoice->id,
					'amount' => $invoice->amount,
					'description' => $invoice->description,
					'email' => $invoice->email
					]); ?>

				</div>
			</div>
		</div>
	</div>
</div>
