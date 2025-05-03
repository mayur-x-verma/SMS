<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Listing';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-3">
    <?= Html::beginForm(['admin/student-list'], 'get', ['class' => 'form-inline']) ?>
    <div class="input-group">
        <?= Html::textInput('search', Yii::$app->request->get('search'), ['class' => 'form-control', 'placeholder' => 'Search...']) ?>
        <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i> Search</button>
    </div>
    <?= Html::endForm() ?>
</div>

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
            [
                'header' => 'S.No',
                'class' => 'yii\grid\SerialColumn'
            ],

            [
                'header' => 'ID',
                'attribute' => 'id',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'Roll_no',
                'header' => 'Roll Number',
            ],
            [
                'attribute' => 'Enroll_no',
                'header' => 'Enroll Number',
            ],
            [
                'attribute' => 'Course',
                'header' => 'Course',
            ],
            [
                'attribute' => 'Sem',
                'header' => 'Semester',
            ],
            [
                'attribute' => 'Exam_type',
                'header' => 'Exam Type',
            ],
            [
                'attribute' => 'Student_type',
                'header' => 'Student Type',
            ],
            [
                'header' => 'Gender',
                'attribute' => 'Gender',
                'contentOptions' => ['class' => 'text-capitalize'],
            ],
            [
                'header' => 'DOB',
                'attribute' => 'DOB',
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'header' => 'Ph No.',
                'attribute' => 'Phone_no',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
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
<div class="card-footer">
    <?= LinkPager::widget([
        'pagination' => $dataProvider->getPagination(),
        'options' => ['class' => 'pagination justify-content-center'],
        'maxButtonCount' => 5, // Show pagination after 5 rows
    ]); ?>
</div>
</div>

</div>