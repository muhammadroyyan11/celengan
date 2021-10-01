<input type="hidden" placeholder="<?= userdata('id_user') ?>">


<section id="dashboard-analytics">
    <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pencatatan Keuangan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="<?php echo base_url('dashboard/addsaldo') ?>" class="form" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-label-group">
                                            <input type="number" name="amount" class="form-control input-sm" required>
                                            <label for="">Jumlah Uang</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-label-group">
                                            <label>Jenis</label>
                                            <select name="mutation" id="inputMutation" class="form-control input-sm" required>
                                                <option value="">-- Jenis --</option>
                                                <option value="masuk">Uang Masuk</option>
                                                <option value="keluar">Uang Keluar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-label-group">
                                            <select name="categori" id="inputMutation" class="form-control input-sm" required>
                                                <option value="" selected disabled>-- Categori --</option>
                                                
                                                <?php foreach ($categori as $key => $row) { 
                                                    if (userdata('id_user') == $row->id_user) :?>
                                                    <option value="<?=$row->id_categori?>" <?=$row->id_categori ? 'selected' : NULL?>><?= $row->nama_categori ?></option>
                                                    <?php endif; ?>
                                                <?php } ?>
                                            </select>
                                            <label for="first-name-column">-- JENIS --</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="description" class="form-control" rows="2" placeholder="Keterangan..." required></textarea>
                                            <label for="email-id-column">Email</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        /* HITUNG SALDO */



        $debit = 0;
        $kredit = 0;
        $saldo = 0;
        foreach ($total as $key => $row) {
            if ($row->id_user == userdata('id_user')) {
                if ($row->mutation == 'masuk')
                    $debit += $row->amount;

                if ($row->mutation == 'keluar')
                    $kredit += $row->amount;

                $saldo = ($debit - $kredit);
            }
        }

        // $debit += 0;

        $saldo = ($debit - $kredit);
        ?>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="<?= base_url() ?>assets/app-assets/images/elements/decore-left.png" class="img-left" alt="card-img-left">
                        <img src="<?= base_url() ?>assets/app-assets/images/elements/decore-right.png" class="img-right" alt="card-img-right">
                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                            <div class="avatar-content">
                                <i class="feather icon-award white font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-2 text-white"> Rp. <?php echo number_format($saldo) ?></h1>
                            <p class="m-auto w-75">Jumlah uang anda yang ada di dompet . </p><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row match-height">

        <div class="col-xl-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Uang Masuk</h4>
                        <p class="card-text">5 Terbaru Jumlah Pemasukan Uang Hari ini</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Tgl Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 0;
                                    foreach ($satuanIn as $key => $show) {
                                        if (userdata('id_user') == $show->id_user) :
                                            $dateMasuk = new DateTime($show->date);
                                    ?>
                                            <td><Strong><?= ' Rp. ' . number_format($show->amount)  ?></Strong>
                                                <p><small><?= $show->description ?></small></p>

                                            </td>
                                            <td>
                                                <p><i class="fa fa-clock-o"></i> <?= $dateMasuk->format('d F Y') ?></p>
                                            </td>
                                            <!-- <td><p><i class="fa fa-clock-o"></i> <?= date('H:i A') ?></p></td> -->
                                </tr>
                            <?php endif; ?>
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Uang Keluar</h4>
                        <p class="card-text">5 Terbaru Jumlah Pengeluaran Uang Hari ini</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Tgl Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 0;
                                    foreach ($satuanOut as $key => $show) {
                                        if (userdata('id_user') == $show->id_user) :
                                            $dateMasuk = new DateTime($show->date);
                                    ?>
                                            <td><Strong><?= '- Rp. ' . number_format($show->amount)  ?></Strong>
                                                <p><small><?= $show->description ?></small></p>

                                            </td>
                                            <td>
                                                <p><i class="fa fa-clock-o"></i> <?= $dateMasuk->format('d F Y') ?></p>
                                            </td>
                                            <!-- <td><p><i class="fa fa-clock-o"></i> <?= date('H:i A') ?></p></td> -->
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
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zero configuration</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</p>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
</section>