

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
                      
                        $kode   = $data->nis;
                        $nama   = $data->nama;
                        $alamat   = $data->alamat;
                        $lat    = $data->latittude;
                        $lon    = $data->longitude;
                        // $gambar = '<img src="'. base_url('gambar/'.$data->foto).'" style="height: 50px; width:50px;">';
                        ?>

                        var image = "<?php echo base_url('gambar/rumah.png') ?> ";

                        <?php
                        
                        echo ("addMarker($lat, $lon, '<b>$nama</b><br>$alamat');\n"); 
                      
                        
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
              <hr>
              
<form action="<?php echo base_url();?>app/edit_alumni/<?php echo $data->id_siswa; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nis </label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $data->nis; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama </label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $data->nama; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jurusan </label>
            <select class="form-control" name="kode_jurusan">
                <option value="<?php echo $data->kode_jurusan ?>"><?php echo $data->kode_jurusan ?></option>
                <?php 
                $sql = $this->db->query("SELECT * FROM jurusan");
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Password </label>
            <input type="text" class="form-control" name="password" id="nama" placeholder="Password" value="<?php echo $data->password; ?>" />
        </div>
        <div class="form-group">
            <label for="alamat">Alamat </label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $data->alamat; ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Nohp </label>
            <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Nohp" value="<?php echo $data->nohp; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Wali </label>
            <input type="text" class="form-control" name="wali" id="wali" placeholder="Wali" value="<?php echo $data->wali; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Latittude </label>
            <input type="text" class="form-control" name="latittude" id="latittude" placeholder="Latittude" value="<?php echo $data->latittude; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Longitude </label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $data->longitude; ?>" />
        </div>
        <input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa; ?>" /> 
        <button type="submit" class="btn btn-primary">Update</button> 
    </form>
              