<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Jurusan <?php echo form_error('kode_jurusan') ?></label>
            <input type="text" class="form-control" name="kode_jurusan" id="kode_jurusan" placeholder="Kode Jurusan" value="<?php echo $kode_jurusan; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jurusan <?php echo form_error('jurusan') ?></label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
        </div>
        <input type="hidden" name="id_jurusan" value="<?php echo $id_jurusan; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('jurusan') ?>" class="btn btn-default">Cancel</a>
    </form>