<?php
/**
 * @var yii\web\View $this
 * @var app\models\StudentMaster $model
 */
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

?>

<div class="student-registration">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Roll_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'Enroll_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'Course')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'Sem')->textInput() ?>

            <!-- Radio button for Exam Type -->
            <?= $form->field($model, 'Exam_type')->radioList([
                'Annual' => 'Annual',
                'Semester' => 'Semester',
            ]) ?>
        </div>

        <div class="col-md-6">
            <!-- Radio button for Exam Type -->
            <?= $form->field($model, 'Student_type')->radioList([
                'Regular' => 'Regular',
                'Ex' => 'Ex',
            ]) ?>

            <!-- Checkbox for Gender/Student Type -->
            <?= $form->field($model, 'Gender')->checkboxList([
                'Male' => 'Male',
                'Female' => 'Female',
                'Other' => 'Other',
            ]) ?>

            <!-- Date of Birth -->
            <?= $form->field($model, 'DOB')->input('date') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Dropdown for Subjects -->
            <?php $subjects = [
                'Subject01' => 'Subject01',
                'Subject02' => 'Subject02',
                'Subject03' => 'Subject03',
                'Subject04' => 'Subject04',
                'Subject05' => 'Subject05',
            ]; ?>

            <?= $form->field($model, 'Sub1')->dropDownList($subjects, ['prompt' => 'Select Subject 1']) ?>
            <?= $form->field($model, 'Sub2')->dropDownList($subjects, ['prompt' => 'Select Subject 2']) ?>
            <?= $form->field($model, 'Sub3')->dropDownList($subjects, ['prompt' => 'Select Subject 3']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'Sub4')->dropDownList($subjects, ['prompt' => 'Select Subject 4']) ?>
            <?= $form->field($model, 'Sub5')->dropDownList($subjects, ['prompt' => 'Select Subject 5']) ?>
            <?= $form->field($model, 'Phone_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'Address')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>