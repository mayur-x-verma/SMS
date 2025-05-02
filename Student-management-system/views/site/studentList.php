<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use yii\bootstrap5\;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Listing';

$this->params['breadcrumbs'][] = $this->title;
?>
<h2>search bar</h2>
<div class="student-master-index container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="bi bi-plus-circle"></i> Create Student', ['registration'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card shadow-sm" style="overflow: auto; max-height: 400px; max-width: 100%;"></div>
</div>
<div class="card-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-hover table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'Roll_no',
            'Enroll_no',
            'Course',
            'Sem',
            'Exam_type',
            'Student_type',
            [
                'attribute' => 'Gender',
                'contentOptions' => ['class' => 'text-capitalize'],
            ],
            [
                'attribute' => 'DOB',
                'format' => ['date', 'php:Y-m-d'],
            ],
            'Phone_no',
            [
                'attribute' => 'Address',
                'contentOptions' => ['class' => 'text-truncate', 'style' => 'max-width: 200px;'],
            ],
            [
                'attribute' => 'Created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'Updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                            return Html::a('<i class="bi bi-eye-fill"></i>', $url, ['class' => 'btn btn-sm btn-primary', 'title' => 'View']);
                        },
                    'update' => function ($url, $model) {
                            return Html::a('<i class="bi bi-pencil"></i>', $url, ['class' => 'btn btn-sm btn-warning', 'title' => 'Update']);
                        },
                    'delete' => function ($url, $model) {
                            return Html::a('<i class="bi bi-trash"></i>', $url, [
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'Delete',
                                'data-confirm' => 'Are you sure you want to delete this item?',
                                'data-method' => 'post',
                            ]);
                        },
                ],
            ],
        ],
    ]); ?>
</div>
</div>

</div>