<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class StudentMaster extends ActiveRecord
{
    public static function tableName()
    {
        return 'student_master';
    }

    public function rules()
    {
        return [
            [['roll_no', 'enrol_no', 'course', 'semester', 'exam_type', 'student_type', 'dob'], 'required'],
            [['semester'], 'integer'],
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['address'], 'string'],
            [['roll_no', 'enrol_no'], 'string', 'max' => 20],
            [['phone_no'], 'string', 'max' => 15],
            [['sub1', 'sub2', 'sub3', 'sub4', 'sub5'], 'string', 'max' => 100],
            [['exam_type', 'student_type', 'course'], 'string', 'max' => 50],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }
}
