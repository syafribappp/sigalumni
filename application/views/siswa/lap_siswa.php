<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootflat-admin/css/bootstrap.min.css">
</head>
<body onload="print();">

    <center><h2>LAPORAN DATA SISWA</h2></center>
    <hr>
    <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Nis</th>
        <th>Alamat</th>
        <th>Nama</th>
        <th>Nohp</th>
        <th>Wali</th>
        <th>Latittude</th>
        <th>Longitude</th>
            </tr><?php
            $start = 0;
            $siswa_data = $this->db->query("SELECT * FROM siswa");
            foreach ($siswa_data->result() as $siswa)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $siswa->nis ?></td>
            <td><?php echo $siswa->nama ?></td>
            <td><?php echo $siswa->alamat ?></td>
            <td><?php echo $siswa->nohp ?></td>
            <td><?php echo $siswa->wali ?></td>
            <td><?php echo $siswa->latittude ?></td>
            <td><?php echo $siswa->longitude ?></td>
            
        </tr>
                <?php
            }
            ?>
        </table>

</body>
</html>