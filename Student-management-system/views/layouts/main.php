<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="bi bi-mortarboard"></i> Student Management System',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-primary fixed-top']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                [
                    'label' => 'Services',
                    'items' => [
                        ['label' => 'Service 1', 'url' => ['/site/service1']],
                        ['label' => 'Service 2', 'url' => ['/site/service2']],
                    ],
                ],
                Yii::$app->user->isGuest
                ? ['label' => 'Admin', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                . Html::beginForm(['/admin/logout'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->Username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container mt-5 pt-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-3 rounded">
                        <?= Breadcrumbs::widget([
                            'links' => $this->params['breadcrumbs'],
                            'options' => ['class' => 'breadcrumb mb-0'],
                            'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                            'activeItemTemplate' => "<li class='breadcrumb-item active' aria-current='page'>{link}</li>\n",
                        ]) ?>
                    </ol>
                </nav>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-4 bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    &copy; My Company <?= date('Y') ?>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>