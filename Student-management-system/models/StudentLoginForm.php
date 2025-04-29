<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * StudentLoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class StudentLoginForm extends Model
{
    public $rollno;
    public $dob;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // rollno and dob are both required
            [['rollno', 'dob'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Validates the date of birth.
     * This method serves as the inline validation for dob.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateDob($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || $user->dob !== $this->dob) {
                $this->addError($attribute, 'Incorrect roll number or date of birth.');
            }
        }
    }

    /**
     * Logs in a user using the provided roll number and date of birth.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[rollno]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne(['rollno' => $this->rollno]);
        }

        return $this->user;
    }
}
