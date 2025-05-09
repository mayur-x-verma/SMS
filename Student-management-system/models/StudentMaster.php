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

    public $photo;
    public $email;
    public function rules()
    {
        return [
            [['Roll_no', 'Addmission_year'], 'number'],
            [['Enroll_no', 'Course', 'Sem', 'Exam_type', 'Gender', 'DOB'], 'required'],
            [['Cd_name'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Cd_name can only contain letters and spaces.'],
            [['Cd_name'], 'required'],
            [['Sem', 'Profile_img'], 'string'],
            [['DOB', 'Created_at', 'Updated_at'], 'safe'],
            [['Address'], 'string'],
            [['Enroll_no', 'Category', 'Remark'], 'string', 'max' => 255],
            [['Email'], 'email'],
            [['Phone_no'], 'string', 'max' => 15],
            [['Sub1', 'Sub2', 'Sub3', 'Sub4', 'Sub5'], 'string', 'max' => 100],
            [['Exam_type', 'Student_type', 'Course'], 'string', 'max' => 50],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
            // [['photo'], 'string'],
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
