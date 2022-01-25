<div class="card-body">
    <?= $this->session->flashdata('message') ?>
    <?php unset($_SESSION['message']) ?>
    <?php

    $jenis_edit = '';
    $harga_edit = '';
    $imei_edit = '';
    if ($edit_barang) {
        $harga_edit = $edit_barang['harga'];
        $imei_edit = $edit_barang['imei'];
        $jenis_edit = $edit_barang['nama_jenis'];
    }
    ?>
    <form action="<?= base_url('barang/') . $type == 'add' ?? 'edit/' . $type ?>" method="post">
        <div class="form-group">
            <label for="jenis_hp">Pilih Jenis HP</label>
            <?php if ($type == 'add') : ?>
                <select class="custom-select<?= form_error('jenis') ? '  is-invalid' : '' ?>" name="jenis" aria-label="Default select example">
                    <option selected disabled>-- Pilih Jenis HP --</option>
                    <?php foreach ($jenis as $row) : ?>
                        <option value="<?= $row['jenis_id'] ?>"><?= $row['nama_jenis'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <input class="form-control" disabled value="<?= $jenis_edit ?>">
            <?php endif; ?>
            <div class="invalid-feedback"><?= form_error('jenis') ?></div>
        </div>
        <!-- IMEI -->
        <div class="form-group">
            <label for="imei">IMEI</label>
            <input type="text" name="imei" class="form-control <?= form_error('imei') ? '  is-invalid' : '' ?>" value="<?= set_value('imei') ? set_value('imei') : $imei_edit ?>" placeholder="90384092482938">
            <div class="invalid-feedback"><?= form_error('imei') ?></div>
        </div>
        <!-- HARGA -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control <?= form_error('harga') ? '  is-invalid' : '' ?>" value="<?= set_value('harga') ? set_value('harga') : $harga_edit ?>" placeholder="3000000">
            <div class="invalid-feedback"><?= form_error('harga') ?></div>
        </div>
        <input type="text" name="type" value="<?= $type ?>" hidden />
        <button class="btn btn-primary float-right">Simpan</button>
    </form>

</div>
<!-- /.card-body -->