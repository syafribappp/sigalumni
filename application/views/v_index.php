<?php include 'config/header.php'; ?>
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">

          <?php include 'config/menu.php'; ?>
          
          <div class="col-xs-12 col-sm-9 content">
            
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> <?php echo $judul; ?></h3>
              </div>
              <div class="panel-body">
                <div class="content-row">
                  <h2 class="content-row-title"><?php echo $judul; ?></h2>
                  <div class="row">
                    <div class="col-md-12">
                     <?php include $konten.'.php'; ?>
                    </div>
                  </div>
                </div>

              </div><!-- panel body -->
            </div>

        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
    <?php //include 'config/footer.php'; ?>