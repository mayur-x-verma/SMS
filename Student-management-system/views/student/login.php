<?php

/** @var yii\web\View $this */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\StudentLoginForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Student Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="login-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Roll_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter your Roll Number']) ?>

        <?= $form->field($model, 'DOB')->input('date') ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>