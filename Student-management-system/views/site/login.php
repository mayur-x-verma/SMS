<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\AdminLoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Admin Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex justify-content-center align-items-center vh-80 bg-light">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px; border-radius: 15px;">
        <div class="card-header bg-primary text-white text-center rounded-top" style="border-radius: 15px 15px 0 0;">
            <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <p class="text-center text-muted">Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'action' => ['site/login'],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'form-label fw-bold'],
                    'inputOptions' => ['class' => 'form-control rounded-pill'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput([
                'autofocus' => true,
                'placeholder' => 'Enter your username',
                'class' => 'form-control rounded-pill'
            ]) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => 'Enter your password',
                'class' => 'form-control rounded-pill'
            ]) ?>

            <div class="form-group text-center mt-4">
                <?= Html::submitButton('Login', [
                    'class' => 'btn btn-primary btn-block rounded-pill px-4 py-2',
                    'name' => 'login-button',
                    'style' => 'font-size: 16px;'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- <div class="card-footer text-center text-muted">
            <small>Forgot your password? <a href="#" class="text-primary">Reset it here</a>.</small>
        </div> -->
    </div>
</div>