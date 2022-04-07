<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use hscstudio\mimin\components\Mimin;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],


    'no_rfid',
    'nama',
    'alamat:ntext',
    'no_hp',
    'tgl_expired:date',
    [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        }
    ],
];
/* @var $this yii\web\View */
/* @var $searchModel app\models\RfidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data RFID');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rfid-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,

        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,

        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
             'heading' => ' <strong> '.'RFID'. '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a('RFID Baru', ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>

    <?php Pjax::end(); ?>

</div>
