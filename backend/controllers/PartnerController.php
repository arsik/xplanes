<?php

namespace backend\controllers;

use backend\models\Partner;
// use backend\models\FaqQuestion;
use common\models\User;
use \Yii;

class PartnerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        if(strlen($user->channelName) > 0) {
        	return $this->redirect('partner/info');
        }
        return $this->render('index');
    }
    public function actionCreate()
    {
        $model = new Partner();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

        	if(Yii::$app->user->identity->pOnline > 0) {
            	return $this->render('index', [
                    'error' => 'Нельзя быть онлайн на сервере и заключать партнерство одновременно!'
                ]);
            }

            $parse = @parse_url($model->link);
            if(!array_key_exists('host', $parse) || $parse['host'] != 'www.youtube.com' && $parse['host'] != 'youtube.com') {
                return $this->render('index', [
                    'error' => 'Необходимо ввести ссылку на существующий YouTube канал.'
                ]);
            }
            $channelInfo = json_decode($model->parseChannelInfo());
            if($channelInfo->error == true)
            {
            	return $this->render('index', [
                    'error' => 'Произошла ошибка при получении информации о канале.<br>Ввведите актуальную ссылку на канал и повторите снова.'
                ]);
            }
            if(User::find()->where(['channelName' => $channelInfo->header])->one()) {
            	return $this->render('index', [
                    'error' => 'Данный канал уже зарегистрирован на нашем сервере.'
                ]);
            }
            if(User::find()->where(['channelPromocode' => $model->promocode])->one()) {
            	return $this->render('index', [
                    'error' => 'Данный промокод уже используется другим партнером.'
                ]);
            }

            $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            $user->channelName = $channelInfo->header;
            $user->channelPhoto = $channelInfo->image;
            $user->channelLink = $model->link;
            $user->channelPromocode = $model->promocode;
            $user->channelPayment = $model->payment;
            $user->save();

            return $this->redirect('info');
        }
        return $this->redirect('index');
    }
    public function actionInfo()
    {
    	$user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();

    	//STATISTIC



    	//PARTNER INFO
    	$referals = User::find()->where(['pPromocode' => $user->channelPromocode])->count();
    	$payers = User::find()->where(['pPromocode' => $user->channelPromocode])->andWhere('pDonate > 0');
    	$referalsPayers = $payers->count();
    	$money = $payers->sum('pDonate');
    	$money *= 0.25;
    	if(!empty($payers)) {

    		$user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
    		$user->channelMoney = $money;
    		$user->save();
    		//Yii::$app->db->createCommand()->update('accounts', ['pDonate' => 0], 'pPromocode = "'.$user->channelPromocode.'" AND pDonate > 0')->execute();
    	}
    	
    	return $this->render('info', [
    		'user' => $user,
    		'referals' => $referals,
    		'referalsPayers' => $referalsPayers,
    		'money' => $user->channelMoney,
    		'dates' => Partner::getDates($user->channelPromocode)
    	]);
    }

}
