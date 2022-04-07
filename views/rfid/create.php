<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rfid */

$this->title = Yii::t('app', 'RFID Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data RFID'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rfid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
