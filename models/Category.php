<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $categoryId
 * @property string $categoryName
 * @property string $categoryDesc
 *
 * @property Tenant[] $tenants
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryName', 'categoryDesc'], 'required'],
            [['categoryDesc'], 'string'],
            [['categoryName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'categoryName' => 'Category Name',
            'categoryDesc' => 'Category Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['categoryId' => 'categoryId']);
    }
}
