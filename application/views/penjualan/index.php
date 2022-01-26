<div class="card">
    <div class="card-header">
        <?= $this->session->flashdata('message') ?>
        <?php unset($_SESSION['message']) ?>
        <div class="float-sm-right">
            <a href="<?= base_url('penjualan/add') ?>" class="btn btn-primary">+ Tambah Penjualan</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>IMEI</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Tanggal Terjual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $row) : ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $row['imei'] ?></td>
                        <td class="align-middle"><?= $row['nama_jenis'] ?></td>
                        <td class="align-middle"><?= $row['harga'] ?></td>
                        <td class="align-middle"><?= $row['tanggal_penjualan'] ?></td>
                        <!-- <td style="text-align: center;"><img src="<?= base_url('assets/pictures/') . $row['foto'] ?>" class="rounded float-right" width="100px" height="100px" alt=""></img></td> -->

                        <!-- <td class="align-middle"><a href="https://www.imei.info/api/imei/docs/" class="btn btn-primary">Cek disini</a></td> -->
                        <td class="align-middle">
                            <a href="<?= base_url('penjualan/edit/') . $row['penjualan_id'] ?>" class="badge bg-success">Ubah</a>
                            <a onClick="return confirm('Yakin ingin menghapus penjualan ini ?')" href="<?= base_url('penjualan/delete/') . $row['penjualan_id'] ?>" class="badge bg-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- /.card -->