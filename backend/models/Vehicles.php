<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property int $id
 * @property int $vModel
 * @property int $vOwned
 * @property string $vOwner
 * @property string $vNumber
 * @property double $vPosX
 * @property double $vPosY
 * @property double $vPosZ
 * @property double $vPosFa
 * @property int $vColor0
 * @property int $vColor1
 * @property double $vHealth
 * @property int $vArmour
 * @property int $vRocketSystem
 * @property int $vVirtualworld
 * @property int $vInterior
 * @property int $vStatus
 * @property int $vRentDate
 * @property int $vFuel
 * @property int $vRockets
 * @property int $vNeedFix
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vModel', 'vOwned', 'vOwner', 'vNumber', 'vPosX', 'vPosY', 'vPosZ', 'vPosFa', 'vColor0', 'vColor1', 'vHealth', 'vArmour', 'vRocketSystem', 'vVirtualworld', 'vInterior', 'vStatus', 'vRentDate', 'vFuel', 'vRockets', 'vNeedFix'], 'required'],
            [['vModel', 'vOwned', 'vColor0', 'vColor1', 'vArmour', 'vRocketSystem', 'vVirtualworld', 'vInterior', 'vStatus', 'vRentDate', 'vFuel', 'vRockets', 'vNeedFix'], 'integer'],
            [['vPosX', 'vPosY', 'vPosZ', 'vPosFa', 'vHealth'], 'number'],
            [['vOwner'], 'string', 'max' => 32],
            [['vNumber'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vModel' => 'V Model',
            'vOwned' => 'V Owned',
            'vOwner' => 'V Owner',
            'vNumber' => 'V Number',
            'vPosX' => 'V Pos X',
            'vPosY' => 'V Pos Y',
            'vPosZ' => 'V Pos Z',
            'vPosFa' => 'V Pos Fa',
            'vColor0' => 'V Color0',
            'vColor1' => 'V Color1',
            'vHealth' => 'V Health',
            'vArmour' => 'V Armour',
            'vRocketSystem' => 'V Rocket System',
            'vVirtualworld' => 'V Virtualworld',
            'vInterior' => 'V Interior',
            'vStatus' => 'V Status',
            'vRentDate' => 'V Rent Date',
            'vFuel' => 'V Fuel',
            'vRockets' => 'V Rockets',
            'vNeedFix' => 'V Need Fix',
        ];
    }
}
