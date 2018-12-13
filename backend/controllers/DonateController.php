<?php
namespace backend\controllers;

use backend\models\Invoice;
use yii\base\Event;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yarcode\freekassa\actions\ResultAction;
use yarcode\freekassa\events\GatewayEvent;
use yarcode\freekassa\Merchant;

class DonateController extends Controller
{
    public $enableCsrfValidation = false;

    protected $componentName = 'freeKassa';

    public function init()
    {
        parent::init();
        /** @var Api $pm */
        $freeKassa = \Yii::$app->get($this->componentName);
        $freeKassa->on(GatewayEvent::EVENT_PAYMENT_REQUEST, [$this, 'handlePaymentRequest']);
        $freeKassa->on(GatewayEvent::EVENT_PAYMENT_SUCCESS, [$this, 'handlePaymentSuccess']);
    }

    public function actions()
    {
        return [
            'result' => [
                'class' => ResultAction::className(),
                'componentName' => $this->componentName,
                'redirectUrl' => ['/site/donate-result'],
                'sendConfirmationResponse' => true
            ],
            'success' => [
                'class' => ResultAction::className(),
                'componentName' => $this->componentName,
                'redirectUrl' => ['/site/donate-success'],
                'silent' => false,
                'sendConfirmationResponse' => false
            ],
            'failure' => [
                'class' => ResultAction::className(),
                'componentName' => $this->componentName,
                'redirectUrl' => ['/site/donate-error'],
                'silent' => false,
                'sendConfirmationResponse' => false
            ]
       ];
    }

    /**
     * @param GatewayEvent $event
     * @return bool
     */
    public function handlePaymentRequest($event)
    {
        $invoice = Invoice::findOne(ArrayHelper::getValue($event->gatewayData, 'MERCHANT_ORDER_ID'));

        if (!$invoice || $invoice->status != Invoice::STATUS_NEW && $invoice->status != Invoice::STATUS_PAYED) {
            return;
        }

        //$invoice->debugData = VarDumper::dumpAsString($event->gatewayData);
        $event->invoice = $invoice;
        $event->handled = true;
    }

    /**
     * @param GatewayEvent $event
     * @return bool
     */
    public function handlePaymentSuccess($event)
    {
        $invoice = $event->invoice;
        $invoice->status = Invoice::STATUS_PAYED;
        $invoice->save(false);
        
        // TODO: invoice processing goes here 
    }
}
