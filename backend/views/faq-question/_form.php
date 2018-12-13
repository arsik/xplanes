<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\FaqCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-question-form adm-form">

    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    <?php $form = ActiveForm::begin(); ?>

    <?php $categories = FaqCategory::find()->all();
    $items = ArrayHelper::map($categories,'id','title');
    $params = [
        'prompt' => 'Выбрать категорию'
    ];
    echo $form->field($model, 'category_id')->dropDownList($items,$params); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6, 'id' => 'editor_answer']) ?>

    <?php // $form->field($model, 'date')->textInput() ?>

    <?php echo $form->field($model, 'active')->dropDownList([
        '0' => 'Активный',
        '1' => 'Отключен'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(($model->isNewRecord ? 'Создать' : 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script type="text/javascript">
      CKEDITOR.replace( document.getElementById('editor_answer') );

    </script>

</div>
