<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $newPass, $retypePass, $oldPassword;
    public $role;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['retypePass','oldPassword', 'newPass'], 'required', 'on'=>'update'],
            ['newPass','compare','compareAttribute'=>'retypePass','on'=>'update'],
            [['username'], 'string', 'max' => 255],
            [['password','retypePass','oldPassword'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'authKey',
            'newPass' => 'New Password',
            'retypePass' => 'Retype New Password',
            'oldPassword' => 'Old Password',
            'role' => 'Role',
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            
            $this->password = sha1($this->password);
            return true;
        }
        return false;
    }

    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public static function findByUsername($username){
        if($model = User::find()->where(['username'=>$username])->one()){
            return $model;
        }
        return null;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        //return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/

    }


}
