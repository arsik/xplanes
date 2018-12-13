<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use backend\models\Friendship;
use backend\models\Clans;
use backend\models\Vehicles;
use backend\models\Invoice;
use yii\db\Expression;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                    'actions' => [
                            'logout', 'index', 'about', 'update-photo', 'update-photobg', 'profile',
                            'friends', 'add-friend', 'decline-friend', 'remove-friend', 'accept-friend', 'reject-friend',
                            'rating', 'donate', 'donate-success', 'donate-error'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if($user = Yii::$app->user->identity) {

            \yii\helpers\Url::remember();

            $players = User::find()->where(['pOnline' => 1])->all();
            $friends = Friendship::find()
              ->where(['user_id_from' => $user->id, 'status' => Friendship::STATUS_FRIEND])
              ->orWhere(['user_id_to' => $user->id, 'status' => Friendship::STATUS_FRIEND])
              ->orderBy(new Expression('rand()'))
              ->all();

            return $this->render('index', [
                'user' => $user,
                'friends' => $friends,
                'players' => $players
            ]);
        }
        return $this->goHome();
    }

    public function actionProfile($nickname)
    {
        \yii\helpers\Url::remember();

        if($user = User::findOne(['pName' => $nickname])) {

            $players = User::find()->where(['pOnline' => 1])->all();
            $haveFriend = Friendship::find()->where(['user_id_from' => $user->id])->orWhere(['user_id_to' => $user->id])->one();
            $friends = Friendship::find()
              ->where(['user_id_from' => $user->id, 'status' => Friendship::STATUS_FRIEND])
              ->orWhere(['user_id_to' => $user->id, 'status' => Friendship::STATUS_FRIEND])
              ->orderBy(new Expression('rand()'))
              ->all();
            return $this->render('index', [
                'user' => $user,
                'haveFriend' => $haveFriend,
                'friends' => $friends,
                'players' => $players
            ]);
        }
        return $this->goHome();
    }

    public function actionFriends($action)
    {
        \yii\helpers\Url::remember();

        $user = Yii::$app->user->identity;
        $friends = null;

        switch ($action) {
            case 'all': {
                $friends = Friendship::find()
                  ->where(['user_id_from' => $user->id, 'status' => Friendship::STATUS_FRIEND])
                  ->orWhere(['user_id_to' => $user->id, 'status' => Friendship::STATUS_FRIEND])
                  ->all();
                break;
            }
            case 'requests': {
                $friends = Friendship::find()
                  ->where(['user_id_to' => $user->id, 'status' => Friendship::STATUS_REQUEST])
                  ->all();
                break;
            }
            case 'following': {
                $friends = Friendship::find()
                  ->where(['user_id_from' => $user->id, 'status' => Friendship::STATUS_REQUEST])
                  ->all();
                break;
            }
            case 'followers': {
                $friends = Friendship::find()
                  ->where(['user_id_to' => $user->id, 'status' => Friendship::STATUS_FOLLOWER])
                  ->all();
                break;
            }
        }

        $countRequests = Friendship::find()->where(['user_id_to' => $user->id, 'status' => Friendship::STATUS_REQUEST])->count();
        $countFollowing = Friendship::find()->where(['user_id_from' => $user->id, 'status' => Friendship::STATUS_REQUEST])->count();
        $countFollowers = Friendship::find()->where(['user_id_to' => $user->id, 'status' => Friendship::STATUS_FOLLOWER])->count();

        return $this->render('friends', [
            'user' => $user,
            'friends' => $friends,
            'countRequests' => $countRequests,
            'countFollowing' => $countFollowing,
            'countFollowers' => $countFollowers
        ]);
    }

    public function actionAddFriend($id)
    {
        if(!Friendship::find()->where(['user_id_from' => $id])->orWhere(['user_id_to' => $id])->one())
        {
            $friendship = new Friendship();
            $friendship->isNewRecord = true;
            $friendship->user_id_from = Yii::$app->user->identity->id;
            $friendship->user_id_to = $id;
            $friendship->status = Friendship::STATUS_REQUEST;
            $friendship->save();
            return $this->goBack();
        }
        else if($friendship = Friendship::find()->where(['user_id_from' => $id, 'user_id_to' => Yii::$app->user->identity->id, 'status' => Friendship::STATUS_FOLLOWER])->one()) {
            $friendship->status = Friendship::STATUS_FRIEND;
            $friendship->save();
            return $this->goBack();
        }
        return $this->goHome();
    }

    public function actionRemoveFriend($id)
    {
        if($friendship = Friendship::find()->where(['user_id_from' => $id])->orWhere(['user_id_to' => $id])->andWhere(['status' => Friendship::STATUS_FRIEND])->one())
        {
            $friendship->user_id_from = $id;
            $friendship->user_id_to = Yii::$app->user->identity->id;
            $friendship->status = Friendship::STATUS_FOLLOWER;
            $friendship->save();
            return $this->goBack();
        }
        return $this->goHome();
    }

    public function actionDeclineFriend($id)
    {
        if($friendship = Friendship::find()->where(['user_id_from' => Yii::$app->user->identity->id, 'user_id_to' => $id, 'status' => Friendship::STATUS_REQUEST])->one())
        {
            $friendship->delete();
            return $this->goBack();
        }
        return $this->goHome();
    }

    public function actionAcceptFriend($id)
    {
        $user = Yii::$app->user->identity;
        if($haveRequest = Friendship::find()
          ->where(['user_id_from' => $id, 'user_id_to' => $user->id, 'status' => Friendship::STATUS_REQUEST])
          ->orWhere(['user_id_from' => $id, 'user_id_to' => $user->id, 'status' => Friendship::STATUS_FOLLOWER])
          ->one()) {
            $haveRequest->status = Friendship::STATUS_FRIEND;
            $haveRequest->save();
        }
        return $this->goBack();
    }

    public function actionRejectFriend($id)
    {
        $user = Yii::$app->user->identity;
        if($haveRequest = Friendship::find()->where(['user_id_from' => $id, 'user_id_to' => $user->id, 'status' => Friendship::STATUS_REQUEST])->one()) {
            $haveRequest->status = Friendship::STATUS_FOLLOWER;
            $haveRequest->save();
        }
        return $this->goBack();
    }

    public function actionRating()
    {
        $users = User::find()->orderBy(['pAllDamage' => SORT_DESC])->all();
        $clans = Clans::find()->all();
        return $this->render('rating', [
            'users' => $users,
            'clans' => $clans
        ]);
    }

    public function actionAbout()
    {
        $vehicle = Vehicles::find()->where(['vOwned' => Yii::$app->user->identity->id])->one();
        return $this->render('about', [
            'vehicle' => $vehicle
        ]);
    }

    public function actionUpdatePhoto()
    {
        if (Yii::$app->request->isAjax) {
          $this->enableCsrfValidation = false;

          $postData = Yii::$app->request->post();

          if($postData && !Yii::$app->user->isGuest)
          {
              $photoName = 'avatars/'.Yii::$app->user->identity->id.'_'.rand(1000, 9999).'.png';
              $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $postData['photo']));
              file_put_contents(Yii::getAlias('@web') . $photoName, $data);
              $user = User::findByUsername(Yii::$app->user->identity->pName);
              $user->setPhoto($photoName);
              $user->save(false);
              return 'success';
          }
          return 'error';
        }
        return $this->redirect(['index']);
    }
    public function actionUpdatePhotobg()
    {
        if (Yii::$app->request->isAjax) {
          $this->enableCsrfValidation = false;

          $postData = Yii::$app->request->post();

          if($postData && !Yii::$app->user->isGuest)
          {
              $photoName = 'covers/'.Yii::$app->user->identity->id.'_'.rand(1000, 9999).'.png';
              $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $postData['photo']));
              file_put_contents(Yii::getAlias('@web') . $photoName, $data);
              $user = User::findByUsername(Yii::$app->user->identity->pName);
              $user->setPhotoBg($photoName);
              $user->save(false);
              return 'success';
          }
          return 'error';
        }
        return $this->redirect(['index']);
    }

    public function actionDonate($type)
    {
        $invoice = new \backend\models\Invoice();

        switch ($type) 
        {
            case 'money': 
            {
                if ($postData = Yii::$app->request->post()) {

                    $invoice->isNewRecord;
                    $invoice->user_id = Yii::$app->user->identity->id;
                    $invoice->amount = $postData['amount'];
                    $invoice->email = $postData['email'];
                    $invoice->description = Yii::$app->user->identity->pName;
                    $invoice->type = \backend\models\Invoice::TYPE_MONEY;
                    $invoice->status = \backend\models\Invoice::STATUS_NEW;
                    $invoice->save();

                    return $this->render('donate', [
                      'invoice' => $invoice
                    ]);
                }
                return $this->render('donate-page');
            }
            case 'clan': 
            {
                $error = false;
                $error_message = '';

                if ($postData = Yii::$app->request->post()) {

                    if(Clans::find()->count() >= 20) {

                        $error = true;
                        $error_message = 'На сервере достаточное кол-во кланов';
                    }
                    if(Clans::find()->where(['name' => $postData['clan-name']])->one()) {

                        $error = true;
                        $error_message = 'Клан с таким названием уже существует';
                    }
                    if(Clans::find()->where(['shortName' => $postData['clan-shortName']])->one()) {

                        $error = true;
                        $error_message = 'Клан с такой аббревиатурой уже существует';
                    }
                    if(Clans::find()->where(['liderID' => Yii::$app->user->identity->id])->one()) {

                        $error = true;
                        $error_message = 'У вас уже есть клан';
                    }

                    if($error)
                    {
                        return $this->render('donate-page-clan', [
                          'invoice' => $invoice,
                          'error' => $error,
                          'error_message' => $error_message
                        ]);
                    }

                    $invoice->isNewRecord;
                    $invoice->user_id = Yii::$app->user->identity->id;
                    $invoice->amount = 300;
                    $invoice->email = $postData['email'];

                    $invoice->clanName = $postData['clan-name'];
                    $invoice->clanShortName = $postData['clan-shortName'];
                    $invoice->clanColor = $postData['clan-color'];

                    $invoice->description = Yii::$app->user->identity->pName;
                    $invoice->type = \backend\models\Invoice::TYPE_CLAN;
                    $invoice->status = \backend\models\Invoice::STATUS_NEW;
                    $invoice->save();

                    return $this->render('donate', [
                      'invoice' => $invoice,
                    ]);
                }
                return $this->render('donate-page-clan', [
                  'error' => $error,
                  'error_message' => $error_message
                ]);

            }
            default:
                return $this->redirect(['index']);
        }
    }

    public function actionDonateSuccess()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $invoice = Invoice::find()->where(['user_id' => Yii::$app->user->identity->id, 'status' => Invoice::STATUS_PAYED])->one();
        if($invoice) {

            if($invoice->type == Invoice::TYPE_MONEY)
            {
                $invoice->status = Invoice::STATUS_END;
                $user = User::findByUsername(Yii::$app->user->identity->pName);
                $user->pMoney += User::getMoneyDonate($invoice->amount);
                $user->pDonate += $invoice->amount;
                $user->save(false);
                $invoice->save(false);
            }
            else if($invoice->type == Invoice::TYPE_CLAN)
            {
                $invoice->status = Invoice::STATUS_END;
                $user = User::findByUsername(Yii::$app->user->identity->pName);

                $clan = new Clans();
                $clan->isNewRecord;
                $clan->liderID = $user->id;
                $clan->liderName = $user->pName;
                $clan->members = 1;
                $clan->clanBank = 0;
                $clan->income = 0;
                $clan->cScore = 0;
                $clan->activity = time();
                $clan->name = $invoice->clanName;
                $clan->shortName = $invoice->clanShortName;
                $clan->color = $invoice->clanColor;
                $clan->save();

                $user->pHaveClan = $clan->id;
                $user->pMember = $clan->id;

                $invoice->save(false);
                $user->save(false);
            }


            return $this->render('donate-success', [
                'invoice' => $invoice
            ]);
        }
        return $this->render('donate-error');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = "login_layout";

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {

            $errors = count($model->getErrors());

            $players = User::find()->where(['pOnline' => 1])->all();
            //$query = new \backend\models\SampQueryAPI('95.213.236.203', 7777);
            return $this->render('login', [
                'model' => $model,
                'players' => $players,
                //'queryInfo' => $query->getInfo(),
                'errors' => $errors
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
