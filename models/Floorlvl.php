<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "floorlvl".
 *
 * @property integer $floorId
 * @property string $level
 *
 * @property Tenant[] $tenants
 */
class Floorlvl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'floorlvl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'required'],
            [['level'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'floorId' => 'Floor ID',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['floorId' => 'floorId']);
    }
}
