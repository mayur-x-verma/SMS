<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentMaster $model */

$this->title = 'Create Student Master';
$this->params['breadcrumbs'][] = ['label' => 'Student Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
