<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU UTAMA</b></li>
                <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something"></li>
                <li class="list-group-item"><a href="<?php echo base_url()?>"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                
                <?php 
                if ($this->session->userdata('level') == 'admin') {
                  ?>
                  <li class="list-group-item"><a href="<?php echo base_url()?>siswa"><i class="glyphicon glyphicon-home"></i>Siswa </a></li>
                  <li class="list-group-item"><a href="<?php echo base_url()?>jurusan"><i class="glyphicon glyphicon-home"></i>Jurusan </a></li>


                  <li>
                    <a href="#demo6" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-home"></i>Laporan  <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <li class="collapse" id="demo6">
                        <a href="<?php echo base_url('app/laporan_siswa')?>" class="list-group-item">Seluruh Siswa</a>

                      </li>
                  </li>

                  <li class="list-group-item"><a href="<?php echo base_url()?>user"><i class="glyphicon glyphicon-home"></i>Data User </a></li>
                  <?php
                  } elseif ($this->session->userdata('level') == '') {
                    ?>
                    <li class="list-group-item"><a href="<?php echo base_url()?>app/lihat_alumni/<?php echo $this->session->userdata('id_user'); ?>"><i class="glyphicon glyphicon-home"></i>Lihat detail alumni </a></li>
                    <?php
                  } elseif ($this->session->userdata('level') == 'hubin') {
                    ?>
                    <li class="list-group-item"><a href="<?php echo base_url()?>siswa"><i class="glyphicon glyphicon-home"></i>Lihat Data siswa </a></li>
                    <?php
                  }
                 ?>
               

                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-home"></i>Logout </a></li>

              </ul>
          </div>