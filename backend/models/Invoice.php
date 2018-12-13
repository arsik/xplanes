<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $amount
 * @property int $description
 * @property string $email
 */
class Invoice extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_PAYED = 1;
    const STATUS_END = 2;

    const TYPE_MONEY = 0;
    const TYPE_CLAN = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'description', 'email', 'user_id'], 'required'],
            [['amount', 'user_id'], 'integer'],
            [['description'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'description' => 'Description',
            'email' => 'Email',
        ];
    }
}
