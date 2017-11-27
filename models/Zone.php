<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property integer $zoneId
 * @property string $zoneName
 *
 * @property Tenant[] $tenants
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zoneName'], 'required'],
            [['zoneName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zoneId' => 'Zone ID',
            'zoneName' => 'Zone Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['zoneId' => 'zoneId']);
    }
}
