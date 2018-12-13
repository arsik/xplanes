<?php

namespace backend\controllers;

use backend\models\FaqCategory;
use backend\models\FaqQuestion;

class FaqController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $categories = FaqCategory::find()->where(['active' => 0])->all();
        $currentCategory = FaqCategory::find()->where(['id' => $id, 'active' => 0])->one();
        $questions = FaqQuestion::find()->where(['category_id' => $id])->all();
        return $this->render('index', [
            'currentCategory' => $currentCategory,
            'categories' => $categories,
            'questions' => $questions
        ]);
    }

}
