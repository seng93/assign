<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenant".
 *
 * @property integer $tenantId
 * @property string $name
 * @property string $lotNo
 * @property integer $zoneId
 * @property integer $floorId
 * @property integer $categoryId
 *
 * @property Category $category
 * @property Floorlvl $floor
 * @property Zone $zone
 */
class Tenant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lotNo', 'zoneId', 'floorId', 'categoryId'], 'required'],
            [['zoneId', 'floorId', 'categoryId'], 'integer'],
            [['name', 'lotNo'], 'string', 'max' => 255],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'categoryId']],
            [['floorId'], 'exist', 'skipOnError' => true, 'targetClass' => Floorlvl::className(), 'targetAttribute' => ['floorId' => 'floorId']],
            [['zoneId'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zoneId' => 'zoneId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tenantId' => 'Tenant ID',
            'name' => 'Name',
            'lotNo' => 'Lot No',
            'zoneId' => 'Zone',
            'floorId' => 'Floor Level',
            'categoryId' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floorlvl::className(), ['floorId' => 'floorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['zoneId' => 'zoneId']);
    }
}
