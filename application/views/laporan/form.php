<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Download Laporan Keuangan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="transaksi">Laporan Keuangan :</label>
                    <div class="col-md-7">
                        <div class="custom-control custom-radio">
                            <input value="pemasukan" type="radio" id="pemasukan" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="pemasukan">Pemasukan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="pengeluaran" type="radio" id="pengeluaran" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="pengeluaran">Pengeluaran</label>
                        </div>
                        <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal :</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggalrange" type="text" class="form-control" placeholder="Periode Tanggal">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                            </div>
                        </div>
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        <br>
                        <p style="color : #ea5455 !important; font-size: smaller;">Note : Di Anjurkan mendownload file laporan pada PC / Laptop</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Cetak
                            </span>
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

