<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class Partner extends Model
{

    public $link = "";
    public $promocode = "";
    public $payment = "";
    public $rules = 0;

    public function rules()
    {
        return [
            [['link', 'promocode', 'payment', 'rules'], 'required'],
            [['rules'], 'integer'],
            [['link', 'payment', 'promocode'], 'string'],
        ];
    }


    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //         'title' => 'Название',
    //         'date' => 'Дата создания/изменения',
    //         'active' => 'Статус',
    //     ];
    // }

    public function parseChannelInfo()
    {
        $url = $this->link;
        $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
        $response = file_get_contents($url, false, $context);
        $parse = \backend\models\SimpleHTMLDom::str_get_html($response);
        $element_id = 0;

        $roofAd = false;
        $floorAd = false;

        $body = @$parse->find('body', 0);
        $header = @$body->find('.epic-nav-item-heading', 0)->plaintext;
        $subscribesStr = @$body->find('.yt-subscription-button-subscriber-count-branded-horizontal', 0)->plaintext;
        $viewsStr = @$body->find('.compact-shelf-content-container ul .channels-content-item .yt-lockup-meta-info li', 0)->plaintext;
        $image = @$body->find('.channel-header-profile-image-container > img', 0)->getAttribute('src');

        $subscribes = str_replace(',', '', $subscribesStr);
        $views = str_replace(',', '', $viewsStr);

        $response = null;

        if(!strlen($header) || !strlen($subscribes) || !strlen($views))
        {
            $response = [
                'header' => $header,
                'image' => $image,
                'subscribes' => intval(@$subscribes),
                'views' => intval(@$views),
                'error' => true
            ];
        }
        else
        {
            $response = [
                'header' => $header,
                'image' => $image,
                'subscribes' => intval(@$subscribes),
                'views' => intval(@$views),
                'error' => false
            ];
        }

        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }


    public function getDates($promocode)
    {
        $currentTime = time() - 86400*22;
        $users = User::find()->where(['pPromocode' => $promocode])->all();

        $arr = "";

        for($i = 0; $i < 23; $i++)
        {
            $countPromocodesInDay = 0;

            $cDay = date('j', $currentTime);
            $cMonth = date('n', $currentTime);
            $cYear = date('Y', $currentTime);

            foreach($users as $user) {

                $userTime = $user->pPromocodeDate;
                $uDay = date('j', $userTime);
                $uMonth = date('n', $userTime);
                $uYear = date('Y', $userTime);

                if($cDay == $uDay && $cMonth == $uMonth && $cYear == $uYear) $countPromocodesInDay++;
            }
            $arr = $arr . $countPromocodesInDay . ",";

            $currentTime += 86400;
        }
        $arr = mb_substr($arr, 0, -1);
        return $arr;

    }

}
