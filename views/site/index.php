<?php

/* @var $this yii\web\View */

$this->title = 'Sistem Informasi Perumahan';
?>
<div class="site-index">

              <?php
                if (!Yii::$app->user->isGuest) {
                    if (Yii::$app->user->identity->pegawai) {
                        echo $this->render('_checkin');
                    }
                }


              ?>

</div>
