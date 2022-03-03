<div class="animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="ibox-content">
                <div class="d-block text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" width="200" />
                </div>
                <div id="error-message"></div>
                <form action="<?= base_url('/exam/register/user') ?>" id="user_form" method="post">
                    <div class="form-group">
                        <input type="hidden" name="token" class="form-control" value="<?= $token ?>" placeholder="Session Key" required />
                    </div>
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" name="full_name" id="full_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth">Tempat Lahir</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Tanggal Lahir</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor HP</label>
                        <input class="form-control" type="tel" name="phone_number" id="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input class="form-control" type="text" name="address" id="address">
                        <small>Masukkan alamat yang lengkap guna untuk keperluan pengiriman Sertifikat</small>
                    </div>
                    <button id="btn-submit-form" type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-check"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>