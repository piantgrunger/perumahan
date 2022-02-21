<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
$this->title = 'Pemilihan Rektor UIN Sunan Ampel';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'UIN Sunan Ampel Surabaya <br>
       <span> PEMILIHAN CALON REKTOR 2022-2026</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-green sticky-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mr-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Peraturan', 'url' => ['/site/peraturan']],
            ['label' => 'Jadwal', 'url' => ['/site/jadwal']],
            ['label' => 'Persyaratan', 'url' => ['/site/persyaratan']],
            
    
        ]
          
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
             Yii::$app->user->isGuest ? (
                 ['label' => 'Pendaftaran', 'url' => ['/site/login']]
             ) : (
                 '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
             )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
    
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="footer mt-auto h-auto navbar-dark py-3 text-white">
    <div class="container">
        <p class="float-left">Sekretariat: <br>
Gedung Twin Towers A Lantai 5 <br>
Jl. Jend. A. Yani 117 Surabaya, Jawa Timur, Indonesia <br>
Kode Pos 60237 <br>
Email: bacarek@uinsby.ac.id <br>
Telp: 031 8410298</p>
        <p class="float-right">
				© 2022 by Tim Seleksi Bakal Calon Rektor UIN Sunan Ampel Surabaya.
			</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
