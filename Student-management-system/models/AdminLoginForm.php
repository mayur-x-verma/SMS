<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\AdminUser; // Ensure this class exists in the app\models namespace
use yii\helpers\VarDumper; // Import the VarDumper class from yii\helpers
use \yii\web\IdentityInterface;
class AdminLoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function login()
    {
        $user = AdminUser::findOne(['Username' => $this->username]);

        if ($user && $user->Password === $this->password) { // You should hash passwords in real apps!
            Yii::$app->session->set('admin_id', $user->id); // simulate login session
            return true;
        }
        if (!$user) {
            $this->addError('username', 'Incorrect username.');
        }
        $this->addError('password', 'Incorrect password.');

        return false;
    }
}
