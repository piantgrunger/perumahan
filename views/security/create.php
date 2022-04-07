<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Security */

$this->title = 'Security Baru';
$this->params['breadcrumbs'][] = ['label' => 'Data Security', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
