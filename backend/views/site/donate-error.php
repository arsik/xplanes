<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\models\User;

$this->title = "Магазин - Произошла ошибка.";
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
        <div class="ui-block-title">
					<h6 class="title"><?= Html::encode($this->title) ?></h6>
				</div>
				<div class="ui-block-content">

			<div class="alert alert-danger">
             <p>Произошла ошибка при пополнении баланса. Возможно вы уже пополнили свой баланс, либо оплата не была произведена.</p>
            <p>Попробуйте повторить снова, либо обратитесь к Администрации.</p>     
             </div>
          

        </div>
      </div>
    </div>
  </div>
</div>
