<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faq_category".
 *
 * @property int $id
 * @property string $title
 * @property int $date
 * @property int $active
 */
class FaqCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'date', 'active'], 'required'],
            [['date', 'active'], 'integer'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'date' => 'Дата создания/изменения',
            'active' => 'Статус',
        ];
    }
}
