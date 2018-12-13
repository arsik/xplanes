<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%accounts}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public function number_shorten($number, $precision = 3, $divisors = null) {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return number_format($number / $divisor, $precision) . $shorthand;
    }

    public function getRank($clanDamage)
    {
        if($this->pHaveClan > 0) return 10;
        $rank = 0;
        $rankExp = $clanDamage;

        if($rankExp <= 0) $rank = 0;
        else if($rankExp >= 1 && $rankExp <= 1000) $rank = 1;
        else if($rankExp >= 1001 && $rankExp <= 2000) $rank = 2;
        else if($rankExp >= 2001 && $rankExp <= 4000) $rank = 3;
        else if($rankExp >= 4001 && $rankExp <= 8000) $rank = 4;
        else if($rankExp >= 8001 && $rankExp <= 16000) $rank = 5;
        else if($rankExp >= 16001 && $rankExp <= 32000) $rank = 6;
        else if($rankExp >= 32001 && $rankExp <= 64000) $rank = 7;
        else if($rankExp >= 64001 && $rankExp <= 128000) $rank = 8;
        else if($rankExp >= 128001 && $rankExp <= 256000) $rank = 9;
        else if($rankExp >= 256001) $rank = 10;

        return $rank;
    }

    public function getAchievementScoreImage($score)
    {
        return '/img/achievements/'.$score.'.png';
    }

    public function getAchievementScoreTitle($score)
    {
        $str = '';
        switch($score)
        {
            case 1: $str = "Новичок"; break;
            case 2: $str = "Рейдер"; break;
            case 3: $str = "Пилот"; break;
            case 4: $str = "Головорез"; break;
            case 5: $str = "Истребитель"; break;
            case 6: $str = "Ас"; break;
            case 7: $str = "Командор"; break;
            case 8: $str = "Хан"; break;
            case 9: $str = "Адмирал"; break;
        }
        return $str;
    }

    public function getAchievementTimeImage($score)
    {
        return '/img/achievements/time/'.$score.'.png';
    }

    public function getAchievementTimeTitle($score)
    {
        $str = '';
        switch($score)
        {
            case 1: $str = "Активный"; break;
            case 2: $str = "Гиперактивный"; break;
            case 3: $str = "Нереальный"; break;
        }
        return $str;
    }

    function getMoneyDonate($amount)
    {
        $donate = $amount;
        if($amount >= 0 && $amount < 100) $donate *= 750;
        else if($amount >= 100 && $amount < 500) $donate *= 1000;
        else if($amount >= 500 && $amount < 1000) $donate *= 1200;
        else if($amount >= 1000) $donate *= 1500;
        return $donate;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['pName' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return 0;
        //return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $currentHash = hash('sha256', $password.$this->password_code);
        return (!strnatcasecmp($currentHash,$this->password_hash));

        //return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPhotoBg($photo)
    {
        $this->photo_bg = $photo;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
