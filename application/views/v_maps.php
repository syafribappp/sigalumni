<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=place&key=AIzaSyAp7JWH9dpfxJIvjQ7baNTIKoa58zIB_qg"></script>
                  
                  <script>
                    
                    var marker;
                      function initialize() {
                      
                    // Variabel untuk menyimpan informasi (desc)
                    var infoWindow = new google.maps.InfoWindow;
                    
                    //  Variabel untuk menyimpan peta Roadmap
                    var mapOptions = {
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        } 
                    
                    // Pembuatan petanya
                    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                              
                        // Variabel untuk menyimpan batas kordinat
                    var bounds = new google.maps.LatLngBounds();

                    // Pengambilan data dari database
                    <?php
                      $as = $this->db->query("SELECT * FROM siswa");
                      foreach ($as->result() as $data) {
                        $kode   = $data->nis;
                        $nama   = $data->nama;
                        $alamat   = $data->alamat;
                        $lat    = $data->latittude;
                        $lon    = $data->longitude;
                        // $gambar = '<img src="'. base_url('gambar/'.$data->foto).'" style="height: 50px; width:50px;">';
                        ?>

                        var image = "<?php echo base_url('gambar/icon.png') ?> ";

                        <?php
                        
                        echo ("addMarker($lat, $lon, '<b>$nama</b><br>$alamat');\n"); 
                      }
                        
                    ?>
                      
                    // Proses membuat marker 
                    function addMarker(lat, lng, info) {
                      var lokasi = new google.maps.LatLng(lat, lng);
                      bounds.extend(lokasi);
                      
                      var marker = new google.maps.Marker({
                        map: map,
                        position: lokasi,
                        icon:image
                      });       
                      map.fitBounds(bounds);
                      bindInfoWindow(marker, map, infoWindow, info);
                     }
                    
                    // Menampilkan informasi pada masing-masing marker yang diklik
                        function bindInfoWindow(marker, map, infoWindow, html) {
                          google.maps.event.addListener(marker, 'click', function() {
                            infoWindow.setContent(html);
                            infoWindow.open(map, marker);
                          });
                        }
                 
                        }
                      google.maps.event.addDomListener(window, 'load', initialize);
                    
                  </script>
                  <div id="map-canvas" style="width: auto; height: 400px;"></div>

<script type="text/javascript">
  <?php 
  $sql = $this->db->query("SELECT jurusan.jurusan, COUNT(jurusan.jurusan) AS jumlah FROM siswa, jurusan WHERE siswa.kode_jurusan=jurusan.kode_jurusan GROUP BY jurusan.jurusan")->result();
   ?>
  var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                <?php 
                foreach ($sql as $row) {
                 ?>
                    <?php echo $row->jumlah; ?>,
                <?php } ?>
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
            },  ],
            labels: [
                <?php 
                    foreach ($sql as $row) {
                 ?>
                "<?php echo $row->jurusan; ?> ",

                <?php } ?>
            ]
        },
        options: {
            responsive: true
        }
    };

    

    function pie1() {
        var ctx = document.getElementById("chartContainer").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };
    
</script>
<br><br>
<div class="col-md-12">
  <center>
  <div class="canvas-holder" style="width:400px; height: 400px;">
    <h3>Siswa perjurusan</h3>
        <canvas id="chartContainer" width="300" height="300" />
    </div>
  </center> 
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>