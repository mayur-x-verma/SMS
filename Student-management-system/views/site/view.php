<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\StudentMaster $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Masters', 'url' => ['student-list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Roll_no',
            'Enroll_no',
            'Course',
            'Sem',
            'Exam_type',
            'Student_type',
            'Gender',
            'DOB',
            'Sub1',
            'Sub2',
            'Sub3',
            'Sub4',
            'Sub5',
            'Phone_no',
            'Address',
            'Created_at',
            'Updated_at',
        ],
    ]) ?>

</div>