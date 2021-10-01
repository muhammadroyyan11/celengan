<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data <?= $title ?> Uang</h4>

                    <div class="pull-right">
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Tgl Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $no = 0;
                                        foreach ($cash as $key => $row) {
                                            if (userdata('id_user') == $row->id_user) :
                                                $dateMasuk = new DateTime($row->date);
                                                $no++; ?>
                                                <td><?= $no ?></td>
                                                <td><?= ' Rp. ' . number_format($row->amount)  ?></td>
                                                <td><?= $row->description ?></td>
                                                <td><?= $dateMasuk->format('d F Y') ?></td>
                                                <th>
                                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('masuk/delete/') . $row->ID ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </th>
                                    </tr>
                                <?php endif; ?>
                            <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>