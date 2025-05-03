<?php

use Codeception\Command\Bootstrap;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use app\models\StudentMaster;
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

    <div class="card shadow-sm">
        <div class="card-body" style="overflow-x: auto; overflow-y: auto; max-height: 400px;">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-striped table-hover table-bordered'],
                'columns' => [
                    ['header' => 'S.no', 'class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        // 'header' => 'Roll No',
                        'attribute' => 'Roll_no',
                    ],
                    'Enroll_no',
                    'Course',
                    'Sem',
                    'Exam_type',
                    'Student_type',
                    'Gender',
                    [
                        'attribute' => 'DOB',
                        'format' => ['date', 'php:Y-m-d'],
                    ],
                    'Phone_no',
                    [
                        'header' => 'Actions',
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, StudentMaster $model) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                    ],
                ],
            ]); ?>
        </div>
        <!-- echo LinkPager::widget([
        'pagination' => $pagination,
        ]); -->
        <div class="card-footer">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination justify-content-center'],
                // 'maxButtonCount' => 5,
            ]); ?>
        </div>
    </div>
</div>
</div>

</div>