<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "friendship".
 *
 * @property int $id
 * @property string $user_id_from
 * @property string $user_id_to
 * @property int $status
 */
class Friendship extends \yii\db\ActiveRecord
{
    const STATUS_FOLLOWER = 0;
    const STATUS_REQUEST = 1;
    const STATUS_FRIEND = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'friendship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id_from', 'user_id_to', 'status'], 'required'],
            [['user_id_from', 'user_id_to', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id_from' => 'User Id From',
            'user_id_to' => 'User Id To',
            'status' => 'Status',
        ];
    }
}
