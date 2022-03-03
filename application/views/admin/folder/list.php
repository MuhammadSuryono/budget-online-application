<div class="row">
    <div class="col-lg-2">
        <div class="ibox ">
            <div class="ibox-content">
                <div class="file-manager">
                    <h5>Tahun Folder</h5>
                    <ul class="folder-list" style="padding: 0">
                        <?php
                        $year = (int)date('Y');
                        $active = '';
                        for ($i = $year; $i >= $year - 4; $i--) {
                            if ($i == $yearSelected) {
                                $active = 'text-navy';
                            } else {
                                $active = '';
                            }
                            echo '<li><a href="?year='.$i.'"><i class="fa fa-folder '.$active.'"></i> ' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10 animated fadeInRight">
        <div class="row">
            <div class="col-lg-12 bg-white">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-list-folder">
                        <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Project</th>
                            <th>Tahun</th>
                            <th>Yang Mengajukan</th>
                            <th>Divisi</th>
                            <th>Total</th>
                            <th>Total Biaya dan Uang Muka</th>
                            <th>Sisa Budget</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="body-list-folder">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>