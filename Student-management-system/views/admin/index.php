<?php

/** @var yii\web\View $this */

$this->title = 'SMS';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome!</h1>

        <p class="lead">Welcome to the Student Management System. Please log in with your credentials.</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
        <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['/student/student-login']) ?>">student
            login</a>
    </div>

    <div class="body-content">

    </div>
</div>