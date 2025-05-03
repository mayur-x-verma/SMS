<?php

/** @var yii\web\View $this */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\StudentLoginForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Student Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-login container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body">
                    <p class="text-center">Please fill out the following fields to login:</p>

                    <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation']]); ?>

                    <?= $form->field($model, 'Roll_no')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Enter your Roll Number',
                        'class' => 'form-control'
                    ])->label('Roll Number') ?>

                    <?= $form->field($model, 'DOB')->input('date', [
                        'class' => 'form-control'
                    ])->label('Date of Birth') ?>

                    <div class="form-group text-center mt-4">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg w-100']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .student-login {
        font-family: Arial, sans-serif;
    }

    .card {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>