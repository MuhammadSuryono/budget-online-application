<div class="loginColumns animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="ibox-content">
                <div class="d-block text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" width="200" />
                </div>
                <div id="error-message"></div>
                <?php $this->load->view($form_session); ?>
            </div>
        </div>
    </div>
</div>