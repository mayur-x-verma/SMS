<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-master-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['registration'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Roll_no',
            'Enroll_no',
            'Course',
            'Sem',
            'Exam_type',
            'Student_type',
            'Gender',
            'DOB',
            'Phone_no',
            'Address',
            'Created_at',
            'Updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>