<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$dataPegawai = ArrayHelper::map(\app\models\Security::find()->asArray()->select(['id','nama'=>"concat(nik,' - ',nama)"])->all(), 'id', 'nama')


/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
    ]); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Active',
            'offText' => 'Banned',
        ]
    ]) ?>


<?= $form->field($model, 'id_pegawai')->widget(
        Select2::className(),
        ['data'=>$dataPegawai,
        'options' => [
            'placeholder' => 'Pilih Pegawai ...',
        ]
        ]
    )->label('Pegawai') ?>


	<?php if (!$model->isNewRecord) { ?>
		<strong> Leave blank if not change password</strong>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password') ?>
		<?= $form->field($model, 'repeat_password') ?>
		<?= $form->field($model, 'old_password') ?>
	<?php } ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
