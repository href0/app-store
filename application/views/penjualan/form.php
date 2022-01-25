<div class="card-body">
    <?= $this->session->flashdata('message') ?>
    <?php unset($_SESSION['message']) ?>
    <?php

    $imei_edit = '';
    // if ($edit_barang) {
    //     $harga_edit = $edit_barang['harga'];
    //     $imei_edit = $edit_barang['imei'];
    //     $jenis_edit = $edit_barang['nama_jenis'];
    // }
    ?>
    <form action="<?= base_url('barang/') . $type == 'add' ?? 'edit/' . $type ?>" method="post">

        <!-- IMEI -->
        <div class="form-group">
            <label for="imei">IMEI</label>
            <input type="text" name="imei" class="form-control <?= form_error('imei') ? '  is-invalid' : '' ?>" value="<?= set_value('imei') ? set_value('imei') : $imei_edit ?>" placeholder="90384092482938">
            <div class="invalid-feedback"><?= form_error('imei') ?></div>
        </div>

        <input type="text" name="type" value="<?= $type ?>" hidden />
        <button class="btn btn-primary float-right">Simpan</button>
    </form>

</div>
<!-- /.card-body -->