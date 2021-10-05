<!-- Nav Filled Starts -->
<section id="nav-filled">
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="keluar-tab-fill" data-toggle="tab" href="#keluar-fill" role="tab" aria-controls="keluar-fill" aria-selected="true">Pengeluaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="masuk-tab-fill" data-toggle="tab" href="#masuk-fill" role="tab" aria-controls="masuk-fill" aria-selected="false">Pemasukan</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1">
                            <div class="tab-pane active" id="keluar-fill" role="tabpanel" aria-labelledby="keluar-tab-fill">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pengeluran</h4>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Keterangan</th>
                                                    <th>Kategori</th>
                                                    <th>Tgl Keluar</th>
                                                    <th>Nominal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $subtotal = 0;
                                                    $no = 0;
                                                    foreach ($cashk as $key => $row) {
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
                            <div class="tab-pane" id="masuk-fill" role="tabpanel" aria-labelledby="masuk-tab-fill">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pemasukan</h4>
                                </div>
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
                                                    foreach ($cashm as $key => $row) {
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
                            <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                                <p>
                                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake powder
                                    pudding pastry.
                                </p>
                            </div>
                            <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                                <p>
                                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton candy
                                    gummi
                                    bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love caramels
                                    powder.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Nav Filled Ends -->