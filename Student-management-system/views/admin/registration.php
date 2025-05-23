<?php
/**
 * @var yii\web\View $this
 * @var app\models\StudentMaster $model
 * @var app\models\SubjectMaster $subjectModel
 */

$recentStudent = app\models\StudentMaster::find()->orderBy(['id' => SORT_DESC])->one();
$this->params['breadcrumbs'][] = ['label' => 'Students Lists', 'url' => ['student-list']];

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Student Registration';
?>

<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <div class="card-header bg-primary text-white text-center">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="student-registration">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'Cd_name')->textInput(['maxlength' => true, 'placeholder' => 'Student Name'])->label('Student Name', ['style' => 'font-weight: bold;']) ?>

                        <?= $form->field($model, 'Roll_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter Roll Number'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Enroll_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter Enrollment Number'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?php


                        $courses = ArrayHelper::map(app\models\SubjectMaster::find()->select(['Course'])->distinct()->all(), 'Course', 'Course');
                        $semesters = ArrayHelper::map(app\models\SubjectMaster::find()->select(['Semester'])->distinct()->all(), 'Semester', 'Semester');
                        ?>

                        <?= $form->field($model, 'Course')->dropDownList($courses, ['id' => 'course-dropdown', 'prompt' => 'Select Course'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Sem')->dropDownList($semesters, ['id' => 'semester-dropdown', 'prompt' => 'Select Course'])->label(null, ['style' => 'font-weight: bold;']) ?>

                        <!-- Radio button for Exam Type -->
                        <?= $form->field($model, 'Exam_type')->radioList([
                            'Annual' => 'Annual',
                            'Semester' => 'Semester',
                        ], [
                            'itemOptions' => ['class' => 'form-check-input'],
                            'class' => 'form-check form-check-inline',
                            'item' => function ($index, $label, $name, $checked, $value) {
                                return '<div class="form-check form-check-inline">' .
                                    Html::radio($name, $checked, [
                                        'value' => $value,
                                        'class' => 'form-check-input',
                                        'id' => $name . $index,
                                    ]) .
                                    Html::label($label, $name . $index, ['class' => 'form-check-label']) .
                                    '</div>';
                            },
                        ])->label(null, ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div class="col-md-6">
                        <!-- Radio button for Student Type -->
                        <?= $form->field($model, 'Student_type')->radioList([
                            'Regular' => 'Regular',
                            'Ex' => 'Ex',
                        ], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                return '<div class="form-check form-check-inline">' .
                                    Html::radio($name, $checked, [
                                        'value' => $value,
                                        'class' => 'form-check-input',
                                        'id' => $name . $index,
                                    ]) .
                                    Html::label($label, $name . $index, ['class' => 'form-check-label']) .
                                    '</div>';
                            },
                        ])->label(null, ['style' => 'font-weight: bold;']) ?>

                        <!-- Checkbox for Gender -->
                        <?= $form->field($model, 'Gender')->checkboxList([
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Other' => 'Other',
                        ], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                return '<div class="form-check form-check-inline">' .
                                    Html::checkbox($name, $checked, [
                                        'value' => $value,
                                        'class' => 'form-check-input',
                                        'id' => $name . $index,
                                    ]) .
                                    Html::label($label, $name . $index, ['class' => 'form-check-label']) .
                                    '</div>';
                            },
                        ])->label(null, ['style' => 'font-weight: bold;']) ?>

                        <!-- Date of Birth -->
                        <?= $form->field($model, 'DOB')->input('date')->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Addmission_year')->input('string')->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Category')->dropDownList([
                            'General' => 'General',
                            'OBC' => 'OBC',
                            'SC' => 'SC',
                            'ST' => 'ST',
                            'Others' => 'Others',
                        ], ['prompt' => 'Select Category'])->label(null, ['style' => 'font-weight: bold;']) ?>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Dropdown for Subjects -->
                        <?php
                        $subjects = ArrayHelper::map(
                            app\models\SubjectMaster::find()->select(['Subject'])->distinct()->all(),
                            'Subject',
                            'Subject'
                        );
                        ?>
                        <?= $form->field($model, 'Sub1')->dropDownList($subjects, ['prompt' => 'Select Subject 1'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Sub2')->dropDownList($subjects, ['prompt' => 'Select Subject 2'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Sub3')->dropDownList($subjects, ['prompt' => 'Select Subject 3'])->label(null, ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'Sub4')->dropDownList($subjects, ['prompt' => 'Select Subject 4'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Sub5')->dropDownList($subjects, ['prompt' => 'Select Subject 5'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Phone_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter Phone Number'])->label(null, ['style' => 'font-weight: bold;']) ?>
                        <?= $form->field($model, 'Address')->textarea(['rows' => 3, 'placeholder' => 'Enter Address'])->label(null, ['style' => 'font-weight: bold;']) ?>
                    </div>
                </div>
                <?= $form->field($model, 'photo')->fileInput() ?>

                <!-- make to form field to add mail and message -->
                <?= $form->field($model, 'Email')->input('string', ['maxlength' => true, 'placeholder' => 'Enter Email'])->label(null, ['style' => 'font-weight: bold;']) ?>
                <?= $form->field($model, 'Remark')->textarea(['rows' => 3, 'placeholder' => 'Enter Message'])->label(null, ['style' => 'font-weight: bold;']) ?>
                <div class="form-group text-center mt-4">
                    <?= Html::submitButton('Register', ['class' => 'btn btn-success btn-lg']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<<JS
function fetchSubjects() {
    var course = $('#course-dropdown').val();
    var semester = $('#semester-dropdown').val();

    if (course && semester) {
        $.ajax({
            url: '/admin/get-subjects',
            data: { course: course, semester: semester },
            success: function(response) {
                let subjectDropdowns = ['#studentmaster-sub1', '#studentmaster-sub2', '#studentmaster-sub3', '#studentmaster-sub4', '#studentmaster-sub5'];
                subjectDropdowns.forEach(function(id) {
                    let dropdown = $(id);
                    dropdown.empty().append('<option value="">Select Subject</option>');
                    response.subjects.forEach(function(item) {
                        dropdown.append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                });
            }
        });
    }
}

$('#course-dropdown, #semester-dropdown').change(fetchSubjects);
JS;
$this->registerJs($script);
?>