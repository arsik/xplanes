<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-category-form adm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date')->textInput() ?>

    <?php echo $form->field($model, 'active')->dropDownList([
        '0' => 'Активный',
        '1' => 'Отключен'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(($model->isNewRecord ? 'Создать' : 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
