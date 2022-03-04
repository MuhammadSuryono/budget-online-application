<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                            <h2>Rincian Item Budget</h2>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Nomor Item:</dt> </div>
                            <div class="col-sm-8 text-sm-left"><dd class="mb-1"><?= $dataItem->no ?></dd> </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Rincian:</dt> </div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">  <?= $dataItem->rincian ?></dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"><dt>Kota:</dt> </div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"> <?= $dataItem->kota ?> </dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"> <dt>Jenis:</dt></div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"> 	<?= $dataItem->status ?> </dd></div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right"> <dt>Penerima Pembayaran:</dt></div>
                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"> 	<?= $dataItem->penerima ?> </dd></div>
                        </dl>

                    </div>
                    <div class="col-lg-6" id="cluster_info">

                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Biaya Satuan:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataItem->harga) ?> x <?= $dataItem->quantity ?></dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Total Biaya:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataItem->total) ?></dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Total Pembayaran:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataItem->total_pembayaran) ?></dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-4 text-sm-right">
                                <dt>Sisa Pembayaran:</dt>
                            </div>
                            <div class="col-sm-8 text-sm-left">
                                <dd class="mb-1">Rp. <?= number_format($dataItem->sisa_pembayaran) ?></dd>
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
                                        <div style="width: <?= $dataItem->persentase_pembayaran ?>%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div>
                                    <small>Budget telah dibayarkan <strong><?= $dataItem->persentase_pembayaran ?>%</strong> dari total <strong>Rp. <?= number_format($dataItem->total) ?></strong></small>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="row m-t-sm">
                    <div class="col-lg-12">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i> Buat BPU </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-list-bpu">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No BPU</th>
                                    <th>Term BPU</th>
                                    <th>STKB</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Penerima</th>
                                    <th>Total Request</th>
                                    <th>Total Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody id="body-list-bpu">
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