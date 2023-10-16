<main role="main" class="container">

    <div class="row">
        <div class="col-md-10 mx-auto">
            <?php $this->load->view('layouts/_alert') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Laporan Pendapatan</span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pembeli</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $total = 0;
                            foreach ($content as $row) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->account_name ?></td>
                                    <td><?= $row->product ?></td>
                                    <td><?= $row->qty ?></td>
                                    <td><?= str_replace('-', '/', date('d-m-Y', strtotime($row->date))) ?></td>
                                    <td>Rp. <?= number_format($row->nominal) ?>,-</td>
                                    <?php $total = $total + $row->nominal ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <h4><strong>TOTAL PENDAPATAN: </strong><span>Rp. <?= number_format($total) ?>,-</span></h4>
                    <br><br><hr>

                    <!-- Form Cetak Laporan Pendapatan -->
                    <h5 style="text-align: center;">Cetak Laporan Pendapatan</h5>
                    <div id="form-tanggal"><label for="select" class=" form-control-label">Pilih Periode By</label></div>
                    <select name="periode" id="periode" class="form-control form-control-user" title="Pilih Tahun Ajaran">
                        <option value="">-PILIH-</option>
                        <!-- <option value="tanggal">Tanggal</option> -->
                        <option value="bulan">Bulan</option>
                        <option value="tahun">Tahun</option>
                    </select>
                    <br>
                    <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>
                    <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>     
                </div>

                <div class="col-md-12 mx-auto" id="bulanfilter">
                    <div class="card">
                        <div class="card-header">
                        <strong>Form</strong> Filter by Bulan
                        </div>
                        <form id="formbulan" action="<?php echo base_url(); ?>Report/filter" method="POST" target="_blank">
                            <div class="card-body card-block">
                                <input type="hidden" name="nilaifilter" value="2">

                                <input name="valnilai" type="hidden">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label></div>
                                    <div class="col-12 col-md-10">
                                    <select name="tahun1" id="tahun1" class="form-control form-control-user" title="Pilih Tahun">
                                        <option value="">-PILIH-</option>
                                        <?php foreach($tahun as $thn): ?>
                                        <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="help-block form-text"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Bulan</label>
                                    </div>
                                    <div class="col-12 col-md-10">
                                        <select name="bulan" id="bulan" class="form-control form-control-user" title="Pilih Bulan">
                                            <option value="">-PILIH-</option>
                                            <option value="01">JANUARI</option>
                                            <option value="02">FEBRUARI</option>
                                            <option value="03">MARET</option>
                                            <option value="04">APRIL</option>
                                            <option value="05">MEI</option>
                                            <option value="06">JUNI</option>
                                            <option value="07">JULI</option>
                                            <option value="08">AGUSTUS</option>
                                            <option value="09">SEPTEMBER</option>
                                            <option value="10">OKTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DESEMBER</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>  
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="col-md-12 mx-auto" id="tahunfilter">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form</strong> Filter by Tahun
                        </div>
                        <form id="formtahun" action="<?php echo base_url(); ?>Report/filter" method="POST" target="_blank">
                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">
                                <input type="hidden" name="nilaifilter" value="3">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label></div>
                                    <div class="col-12 col-md-10">
                                    <select name="tahun2" id="tahun2" class="form-control form-control-user" title="Pilih Tahun">
                                        <option value="">-PILIH-</option>
                                        <?php foreach($tahun as $thn): ?>
                                        <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="help-block form-text"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>  
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</main>