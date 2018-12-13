<?php

namespace backend\controllers;

use common\models\User;
use backend\models\Clans;

class ClanController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        \yii\helpers\Url::remember();
        
        if($clan = Clans::find()->where(['id' => $id])->one())
        {
            $members = User::find()->where(['pMember' => $id])->all();
            return $this->render('index', [
                'clan' => $clan,
                'members' => $members
            ]);
        }
        return $this->goHome();
    }

}
