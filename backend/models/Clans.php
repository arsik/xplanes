<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clans".
 *
 * @property int $id
 * @property string $name
 * @property string $shortName
 * @property int $liderID
 * @property string $liderName
 * @property int $members
 * @property int $clanBank
 * @property int $income
 * @property string $color
 * @property int $cScore
 * @property int $activity
 */
class Clans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'shortName', 'liderID', 'liderName', 'members', 'clanBank', 'income', 'color', 'cScore', 'activity'], 'required'],
            [['liderID', 'members', 'clanBank', 'income', 'cScore', 'activity'], 'integer'],
            [['name', 'liderName'], 'string', 'max' => 32],
            [['shortName'], 'string', 'max' => 4],
            [['color'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'shortName' => 'Short Name',
            'liderID' => 'Lider ID',
            'liderName' => 'Lider Name',
            'members' => 'Members',
            'clanBank' => 'Clan Bank',
            'income' => 'Income',
            'color' => 'Color',
            'cScore' => 'C Score',
            'activity' => 'Activity',
        ];
    }
}
