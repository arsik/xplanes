<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faq_question".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $answer
 * @property int $date
 * @property int $active
 */
class FaqQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'answer', 'date', 'active'], 'required'],
            [['category_id', 'date', 'active'], 'integer'],
            [['answer'], 'string'],
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
            'category_id' => 'Категория',
            'title' => 'Вопрос',
            'answer' => 'Ответ',
            'date' => 'Дата создания/изменения',
            'active' => 'Статус',
        ];
    }
}
