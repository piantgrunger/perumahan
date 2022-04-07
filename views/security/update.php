<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Security */

$this->title = 'Ubah Security: ' . $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Data Security', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="security-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
