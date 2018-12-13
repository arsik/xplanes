<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\models\User;
use backend\models\Invoice;

$this->title = $invoice->type == Invoice::TYPE_MONEY ? "Магазин - Ваш баланс успешно пополнен." : "Магазин - Создание клана произошло успешно.";
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title"><?= Html::encode($this->title) ?></h6>
				</div>
				<div class="ui-block-content">
					<div class="alert alert-success">
						<?php if($invoice->type == Invoice::TYPE_MONEY) : ?>
						Ваш баланс был успешно пополнен на сумму: <b>$<?=User::getMoneyDonate($invoice->amount)?></b>
						<?php else : ?>
						Вы успешно создали клан под названием: <b><a href="/clan?id=<?=Yii::$app->user->identity->pMember?>"><?=$invoice->clanName?></a></b>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
