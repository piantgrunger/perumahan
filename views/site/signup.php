<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;

use yii\bootstrap4\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use app\models\Propinsi;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$propinsi = ArrayHelper::map(Propinsi::find()->all(), 'id', 'nama');

$this->title = 'Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

   
            <div class="x_panel ">
                <div class="x_title">

                    <p>Silahkan Isi Data Dibawah ini :</p>


                </div>
                <div class="x_content">



                    <div class="row">
                        <div class="col-lg-8">
                            <?php $form = ActiveForm::begin(['id' => 'form-signup',
                     'layout' => 'horizontal' ,
                     'class' => 'form-horizontal' ,     ]); ?>
                            <?= $form->errorSummary($model); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            
                            <?= $form->field($model, 'password')->passwordInput([]) ?>

                            <?= $form->field($model, 'nama')->textInput([]) ?>

                            <?= $form->field($model, 'email')->textInput([]) ?>
                            <?= $form->field($model, 'pendidikan_terakhir')->textInput([]) ?>
                            
                            <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::className(), [
                                'type' => DateControl::FORMAT_DATE,
                                'widgetOptions' => [
                                    'pluginOptions' => [
                                        'autoclose' => true
                                    ]
                                ]
                            ]); ?>
                            <?= $form->field($model, 'tempat_lahir')->textInput([]) ?>
                            <?= $form->field($model, 'jenis_kelamin')->dropdownList([
                                'Laki-Laki' => 'Laki-Laki',
                                'Perempuan' => 'Perempuan',
                            ], ['prompt' => 'Pilih Jenis Kelamin']) ?>

                            
<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
                            
                            
                            
                            <?= $form->field($model, 'provinsi')->widget(Select2::classname(), [
                                'data' => $propinsi,
                                'options' => ['placeholder' => 'Pilih Provinsi'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]); ?>


<?= $form->field($model, 'kabupaten')->widget(DepDrop::classname(), [
'type'=>DepDrop::TYPE_SELECT2,
//'data'=> [$model->abupaten=>is_null($model->kabupaten)?"":$model->kabupaten->nama_kabupaten],
'options'=>[ 'placeholder'=>'Pilih Kabupaten ...'],
'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
'pluginOptions'=>[
    'depends'=>['signupform-provinsi'],
    'url'=>Url::to(['/site/kabupaten']),
    'placeholder'=>'Pilih kabupaten / Kota...',
    'initialize' =>true,
    
    ]
])->label('Kabupaten / Kota'); ?>

<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

                            
                            
                            

                    
                        </div>
                            </div>
                    

                       

                            <div class="form-group">
                                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>


                </div>
            </div>
      

</div>