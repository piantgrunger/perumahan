<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use hscstudio\mimin\components\Mimin;

$gridColumns=[    ['class' => 'yii\grid\SerialColumn'],

'nik',
'nama',
'alamat:ntext',
'no_hp',
'tempat_lahir',
'tanggal_lahir:date',
//'jenis_kelamin',
//'agama',
//'tanggal_masuk',
[
    'class' => ActionColumn::className(),
    'urlCreator' => function ($action, $model, $key, $index, $column) {
        return Url::toRoute([$action, 'id' => $model->id]);
    }
],];

/* @var $this yii\web\View */
/* @var $searchModel app\models\SecuritySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Security';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,

        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,

        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
             'heading' => ' <strong> '.'Security'. '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a('Security Baru', ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>

</div>
