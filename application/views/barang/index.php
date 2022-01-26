<div class="card">
    <div class="card-header">
        <?= $this->session->flashdata('message') ?>
        <?php unset($_SESSION['message']) ?>
        <div class="float-sm-right">
            <a href="<?= base_url('barang/add') ?>" class="btn btn-primary">+ Tambah</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $row) : ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?></td>
                        <td style="margin: 0 auto; width: 130px">
                            <img src="<?= base_url('assets/pictures/') . $row['foto'] ?>" alt="me" style="width: 130px" />
                        </td>
                        <td class="align-middle"><?= $row['nama_jenis'] ?></td>
                        <!-- <td style="text-align: center;"><img src="<?= base_url('assets/pictures/') . $row['foto'] ?>" class="rounded float-right" width="100px" height="100px" alt=""></img></td> -->
                        <td class="align-middle"><?= $row['harga'] ?></td>
                        <td class="align-middle"><?= $row['stok'] ?></td>
                        <td class="align-middle">
                            <a href="<?= base_url('barang/edit/') . $row['barang_id'] ?>" class="badge bg-success">Ubah</a>
                            <a onClick="return confirm('Yakin ingin menghapus barang ini ?')" href="<?= base_url('barang/delete/') . $row['barang_id'] ?>" class="badge bg-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- /.card -->