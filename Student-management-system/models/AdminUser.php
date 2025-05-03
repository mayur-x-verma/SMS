<?php
namespace app\models;

use yii\db\ActiveRecord;

class AdminUser extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'admin_login';
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return '';
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
