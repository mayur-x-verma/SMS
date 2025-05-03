<?php

namespace app\models;

use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
class StudentLoginForm extends ActiveRecord
{
    public $roll_no;
    public $dob;
    public static function tableName()
    {
        return 'student_master'; // your table name
    }
    public function rules()
    {
        return [
            [['roll_no', 'dob'], 'required'],
            ['roll_no', 'string', 'max' => 255],
            ['dob', 'date', 'format' => 'php:Y-m-d'],
        ];
    }
}