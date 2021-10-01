<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data <?= $title ?> Uang</h4>
                    <div class="">
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <hr>
                <!-- <div class="card-content">
                    <div class="card-body card-dashboard">
                        <label>Dari :</label>
                        <input type='text' class="form-control pickadate" />
                    </div>
                </div> -->
                <!-- <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3 col-12 mb-1">
                                <p class="text-bold-500">Dari Tanggal :</p>
                                <form>
                                    <input type="text" class="form-control pickadate" name="from" id="tgl-dari" value="<?php echo (!$this->input->get('from')) ? date('Y-m-d') : $this->input->get('from') ?>" required />
                                </form>
                            </div>
                            <div class="col-md-3 col-12 mb-1">
                                <p class="text-bold-500">Sampai Tanggal :</p>
                                <form>
                                    <input type="text" class="form-control pickadate" />
                                </form>
                            </div>
                            <div class="col-md-3 col-12 mb-1">
                                <p class="text-bold-500">Kategori :</p>
                                <select name="categori" id="inputMutation" class="form-control input-sm" required>
                                    <option value="">-- Categori --</option>
                                    <?php foreach ($categori as $key => $row) {
                                        if (userdata('id_user') == $row->id_user) : ?>
                                            <option value="<?= $row->id_categori ?>" <?= $row->id_categori ? 'selected' : ''; ?>><?= $row->nama_categori ?></option>
                                        <?php endif; ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-12 mb-1">
                                <p class="text-bold-500 text-white">Filter</p>
                                <a href="<?= site_url('masuk/add') ?>" class="btn btn-primary btn-flat">
                                    <i class="fa fa-user-plus"></i> Filter
                                </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                </div> -->
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Tgl Masuk</th>
                                        <th>Nominal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $subtotal = 0;
                                        $no = 0;
                                        foreach ($cash as $key => $row) {
                                            if (userdata('id_user') == $row->id_user) :
                                                $dateMasuk = new DateTime($row->date);
                                                $subtotal += $row->amount;
                                                $no++; ?>
                                                <td><?= $no ?></td>
                                                <td><?= $row->description ?></td>
                                                <td><?= $row->nama_categori ?></td>
                                                <td><?= $dateMasuk->format('d F Y') ?></td>
                                                <td><?= ' Rp. ' . number_format($row->amount)  ?></td>
                                                <th>
                                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('keluar/delete/') . $row->ID ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </th>
                                    </tr>
                                <?php endif; ?>
                            <?php } ?>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>TOTAL :</th>
                                        <th>Rp. <?php echo number_format($subtotal) ?></th>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>