
<?php


  $model = Yii::$app->user->identity->pegawai;
  $js = "
var myVar = setInterval(myTimer ,1000);
function myTimer() {
  var d = new Date();
  document.getElementById('jam').innerHTML = d.toLocaleTimeString(navigator.language, {
    hour: '2-digit',
    minute:'2-digit'
  }) +' WIB';
}
$( document ).ready(function() {
  navigator.geolocation.getCurrentPosition(function(position) {
    let lat = position.coords.latitude;
    let long = position.coords.longitude;
     $('#lokasi').val(long+' : '+lat);
     var mapLink = document.querySelector('#map-link');
        $('#map-link').addClass('btn-success');
        $('#absen-latitude-masuk').val(lat.toFixed(8));
        $('#absen-longitude-masuk').val(long.toFixed(8));
         $('#absen-latitude-pulang').val(lat.toFixed(8));
        $('#absen-longitude-pulang').val(long.toFixed(8));
        minlat = lat - (0.009 * 0.05);
        maxlat = lat + (0.009 * 0.05);
        minlon = long - (0.009 * 0.05);
        maxlon = long + (0.009 * 0.05);
   var mapLink = document.querySelector('#map');
    mapLink.src = `https://www.openstreetmap.org/export/embed.html?bbox=\${minlon},\${minlat},\${maxlon},\${maxlat}&marker=\${lat},\${long}`;


  },
       (error) => {
        console.log(error)
        $('#map-link').addClass('btn-danger');
        $('#map-link'). html('<i class=\"fas fa-lock\"></i> Lokasi  tidak Sesuai');

      },
      {enableHighAccuracy: true, timeout: 20000, maximumAge: 10000}

  );
});
";
$this->registerJS($js);



?>
<div class="check-in">


<h4 class="my-1"><?= $model->nama; ?></h4>
                  <h6 class="my-1"><?= $model->nik; ?></h6>
                           <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                <h4 class="my-1"><?=Yii::$app->formatter->asDate(date("Y-m-d"), 'full')?></h4>
                                <h6 class="my-1"><div id='jam'></div>  </h6>
                 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">



                                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

                <iframe id="map" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>

                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">


















</div>