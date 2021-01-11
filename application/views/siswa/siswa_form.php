<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jurusan <?php echo form_error('nama') ?></label>
            <select class="form-control" name="kode_jurusan">
                <option value="<?php echo $kode_jurusan ?>"><?php echo $kode_jurusan ?></option>
                <?php 
                $sql = $this->db->query("SELECT * FROM jurusan");
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="password" id="nama" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Nohp <?php echo form_error('nohp') ?></label>
            <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Nohp" value="<?php echo $nohp; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Wali <?php echo form_error('wali') ?></label>
            <input type="text" class="form-control" name="wali" id="wali" placeholder="Wali" value="<?php echo $wali; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Latittude <?php echo form_error('latittude') ?></label>
            <input type="text" class="form-control" name="latittude" id="latittude" placeholder="Latittude" value="<?php echo $latittude; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
        </div>
        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
    </form>