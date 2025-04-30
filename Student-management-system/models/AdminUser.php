<?php
namespace app\models;

use yii\db\ActiveRecord;

class AdminUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'admin_login';
    }
}
