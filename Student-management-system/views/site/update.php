<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentMaster $model */

$this->title = 'Update Student Master: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
