<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jurusan Read</h2>
        <table class="table">
	    <tr><td>Kode Jurusan</td><td><?php echo $kode_jurusan; ?></td></tr>
	    <tr><td>Jurusan</td><td><?php echo $jurusan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jurusan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>