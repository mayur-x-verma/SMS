<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\StudentMaster $model */
\yii\web\YiiAsset::register($this);
$this->title = "Student Report: " . Html::encode($model->Cd_name);

?>
<div class="student-master-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center"></p>

    </p>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center bg-primary text-white">Student Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Candidate Name</th>
                    <td><?= Html::encode($model->Cd_name) ?></td>
                </tr>
                <tr>
                    <th>Roll Number</th>
                    <td><?= Html::encode($model->Roll_no) ?></td>
                </tr>
                <tr>
                    <th>Enrollment Number</th>
                    <td><?= Html::encode($model->Enroll_no) ?></td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td><?= Html::encode($model->Course) ?></td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td><?= Html::encode($model->Sem) ?></td>
                </tr>
                <tr>
                    <th>Exam Type</th>
                    <td><?= Html::encode($model->Exam_type) ?></td>
                </tr>
                <tr>
                    <th>Student Type</th>
                    <td><?= Html::encode($model->Student_type) ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= Html::encode($model->Gender) ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?= Html::encode($model->DOB) ?></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th colspan="2" class="text-center bg-primary text-white">Subjects</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Subject 1</th>
                    <td><?= Html::encode($model->Sub1) ?></td>
                </tr>
                <tr>
                    <th>Subject 2</th>
                    <td><?= Html::encode($model->Sub2) ?></td>
                </tr>
                <tr>
                    <th>Subject 3</th>
                    <td><?= Html::encode($model->Sub3) ?></td>
                </tr>
                <tr>
                    <th>Subject 4</th>
                    <td><?= Html::encode($model->Sub4) ?></td>
                </tr>
                <tr>
                    <th>Subject 5</th>
                    <td><?= Html::encode($model->Sub5) ?></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th colspan="2" class="text-center bg-primary text-white">Contact Information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Profile Picture</th>
                    <td>
                        <?= Html::img('@web/' . $model->Profile_img, ['alt' => 'Profile Picture', 'class' => 'img-thumbnail', 'style' => 'width: 150px; height: 150px;']) ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?= Html::encode($model->Phone_no) ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?= Html::encode($model->Address) ?></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th colspan="2" class="text-center bg-primary text-white">Timestamps</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Created At</th>
                    <td><?= Html::encode($model->Created_at) ?></td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td><?= Html::encode($model->Updated_at) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="form-group text-center mt-4">
            <button class="btn btn-success" onclick="window.print()">Save as PDF</button>
        </div>

    </div>