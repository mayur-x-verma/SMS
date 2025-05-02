<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class SubjectMaster extends ActiveRecord
{


    public static function tableName()
    {
        return 'subject_master';
    }
}
