<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'FAQ категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
          <p>
              <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                  'class' => 'btn btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                  ],
              ]) ?>
          </p>
          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'id',
                  'title',
                  'date',
                  'active',
              ],
          ]) ?>
        </div>
      </div>
    </div>
  </div>
</div>
