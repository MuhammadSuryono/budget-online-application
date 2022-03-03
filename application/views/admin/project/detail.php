<?php
$label = $dataPengajuan->status == 'Disetujui' ? 'primary' : 'danger';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Status:</dt> </div>
                            <div class="col-sm-8 text-sm-left"><dd class="mb-1"><span class="label label-<?= $label ?>"><?= strtoupper($dataPengajuan->status) ?></span></dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>PIC Budget:</dt> </div>
                            <div class="col-sm-8 text-sm-left"><dd class="mb-1"><?= $dataPengajuan->pengaju ?></dd> </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Divisi:</dt> </div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">  <?= $dataPengajuan->divisi ?></dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Tahun:</dt> </div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"> <?= $dataPengajuan->tahun ?> </dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"> <dt>Pembuat Folder Budget:</dt></div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"> 	<?= $dataPengajuan->pembuat ?> </dd></div>
                        </dl>

                    </div>
                    <div class="col-lg-6" id="cluster_info">

                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Total Budget:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataPengajuan->totalbudget) ?></dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Total Di Bayarkan:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataPengajuan->total_pembayaran) ?></dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Diajukan Pada:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1"> <?= $dataPengajuan->waktu ?></dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="row mb-0">
                            <div class="col-sm-2 text-sm-right">
                                <dt>Completed:</dt>
                            </div>
                            <div class="col-sm-10 text-sm-left">
                                <dd>
                                    <div class="progress m-b-1">
                                        <div style="width: <?= $dataPengajuan->persentase_pembayaran ?>%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div>
                                    <small>Budget telah dibayarkan <strong><?= $dataPengajuan->persentase_pembayaran ?>%</strong> dari total <strong>Rp. <?= number_format($dataPengajuan->totalbudget) ?></strong></small>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="row m-t-sm">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-item-budget">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rincian</th>
                                    <th>Kota</th>
                                    <th>Jenis</th>
                                    <th>Penerima Pembayaran</th>
                                    <th>Total Biaya</th>
                                    <th>Total Pembayaran</th>
                                    <th>Total BPU</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody id="body-item-budget">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>