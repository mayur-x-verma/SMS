<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentMaster $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Roll_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Enroll_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Exam_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DOB')->textInput() ?>

    <?= $form->field($model, 'Sub1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sub2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sub3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sub4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sub5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Created_at')->textInput() ?>

    <?= $form->field($model, 'Updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
