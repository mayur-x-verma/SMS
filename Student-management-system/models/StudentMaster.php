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
            [['Roll_no', 'Enroll_no', 'Course', 'Sem', 'Exam_type', 'Gender', 'DOB'], 'required'],
            [['Sem'], 'integer'],
            [['DOB', 'Created_at', 'Updated_at'], 'safe'],
            [['Address'], 'string'],
            [['Roll_no', 'Enroll_no'], 'string', 'max' => 20],
            [['Phone_no'], 'string', 'max' => 15],
            [['Sub1', 'Sub2', 'Sub3', 'Sub4', 'Sub5'], 'string', 'max' => 100],
            [['Exam_type', 'Student_type', 'Course'], 'string', 'max' => 50],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->Created_at = date('Y-m-d H:i:s');
        }
        $this->Updated_at = date('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }
}
