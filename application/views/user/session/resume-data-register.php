<div class="animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="ibox-content">
                <div class="d-block text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" width="200" />
                </div>
                <div id="error-message"></div>
                <h3><strong><i class="fa fa-user"></i> DATA DIRI</strong></h3>
                <table class="table mb-3">
                    <tr>
                        <td>Nomor Pendaftaran</td>
                        <td>: <?= $userData->number_of_register ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?= $userData->full_name ?></td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>: <?= $userData->place_of_birth ?>, <?= $userData->date_of_birth ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $userData->email ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td>: <?= $userData->phone_number ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $userData->address ?></td>
                    </tr>
                </table>
                <h3><strong><i class="fa fa-calendar"></i> JADWAL UJIAN</strong></h3>
                <table class="table mb-3">
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?= date("d-m-Y") ?></td>
                    </tr>
                    <tr>
                        <td>Nama Sesi</td>
                        <td>: <?= $sessionData->session_name ?></td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td>: <?= $sessionData->start_time ?> - <?= $sessionData->end_time ?></td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary block full-width m-b" id="btn-next-resume"><i class="fa fa-sign-in"></i> Lanjutkan</button>
            </div>
        </div>
    </div>
</div>