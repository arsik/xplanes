<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqCategory */

$this->title = 'Редактирование FAQ категории: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'FAQ категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
        <div class="ui-block-title">
					<h6 class="title"><?= Html::encode($this->title) ?></h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>
        </div>
      </div>
    </div>
  </div>
</div>
