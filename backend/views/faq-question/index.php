<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'FAQ вопросы';
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
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
          </p>

          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'id',
                  'category_id',
                  'title',
                  'answer:ntext',
                  'date',
                  //'active',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</div>
