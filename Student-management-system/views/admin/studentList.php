<?php

use app\models\StudentMaster;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\StudentMasterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Masters';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="student-master-index">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> Create Student Master', ['registration'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fas fa-times"></i> Clear All Filters', ['student-list'], [
            'class' => 'btn btn-danger',
        ]) ?>
    </p>

    <?= Html::beginForm(['admin/student-list'], 'get', ['class' => 'mb-4']) ?>

    <div class="col-md-4">
        <?= Html::textInput('StudentMasterSearch[globalSearch]', $searchModel->globalSearch, [
            'class' => 'form-control',
            'placeholder' => 'Search by roll no, enroll no, course, etc.',
            'title' => 'Enter keywords to search',
        ]) ?>
    </div>
    <div class="col-md-2 mt-2">
        <?= Html::submitButton('<i class="fas fa-search"></i> Search', ['class' => 'btn btn-primary w-100']) ?>
    </div>
</div>
<?= Html::endForm() ?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        // 'id',
        'Roll_no',
        'Enroll_no',
        [
            'attribute' => 'Course',
            'format' => 'raw',
            'filter' => Html::tag(
                'div',
                Html::dropDownList(
                    'StudentMasterSearch[Course]',
                    $searchModel->Course,
                    ArrayHelper::map(StudentMaster::find()->select('Course')->distinct()->all(), 'Course', 'Course'),
                    [
                        'prompt' => 'Select Course...',
                        'class' => 'form-select',
                        'title' => 'Filter by Course',
                    ]
                ) .
                ($searchModel->Course ? Html::a('<i class="fas fa-times"></i>', ['student-list'], [
                    'class' => 'clear-filter',
                    'title' => 'Clear Filter',
                    'data-filter' => 'Course',
                ]) : ''),
                ['class' => 'filter-container']
            ),
        ],
        [
            'attribute' => 'Sem',
            'format' => 'raw',
            'filter' => Html::tag(
                'div',
                Html::dropDownList(
                    'StudentMasterSearch[Sem]',
                    $searchModel->Sem,
                    ArrayHelper::map(StudentMaster::find()->select('Sem')->distinct()->all(), 'Sem', 'Sem'),
                    [
                        'prompt' => 'Select Semester...',
                        'class' => 'form-select',
                        'title' => 'Filter by Semester',
                    ]
                ) .
                ($searchModel->Sem ? Html::a('<i class="fas fa-times"></i>', ['student-list'], [
                    'class' => 'clear-filter',
                    'title' => 'Clear Filter',
                    'data-filter' => 'Sem',
                ]) : ''),
                ['class' => 'filter-container']
            ),
        ],
        [
            'attribute' => 'Student_type',
            'filter' => Html::dropDownList(
                'StudentMasterSearch[Student_type]',
                $searchModel->Student_type,
                ['' => 'Select Type...', 'Regular' => 'Regular', 'EX' => 'EX'],
                [
                    'class' => 'form-select',
                    'title' => 'Filter by Student Type',
                ]
            ),
        ],
        [
            'attribute' => 'Gender',
            'filter' => Html::dropDownList(
                'StudentMasterSearch[Gender]',
                $searchModel->Gender,
                ['' => 'Select Gender...', 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],
                [
                    'class' => 'form-select',
                    'title' => 'Filter by Gender',
                ]
            ),
        ],
        [

            'attribute' => 'DOB',

            'filter' => DatePicker::widget([
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'model' => $searchModel,
                'attribute' => 'DOB',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ],
            ]),

        ],
        'Phone_no',
        'Created_at',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, StudentMaster $model, $key, $index, $column) {
        return Url::toRoute([$action, 'id' => $model->id]);
    }
        ],
        // 'Created_at',
    ],
]); ?>