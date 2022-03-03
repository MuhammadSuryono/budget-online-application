<div class="animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="ibox-content">
                <div class="d-block text-center">
                    <?php
                    $alpha = ["A", "B", "C", "D", "E","F"];
                    echo '<h1 class="font-bold" style="font-size: 24pt">PART '.$alpha[$dataSection->section_id - 1].'</h1>';
                    ?>
                </div>

                <?= $dataSection->description ?>

                <?php if($lastSection->start_at == "") { ?>
                    <a href="<?= base_url('exam/start') ?>" type="button" class="btn btn-primary block full-width m-b" id="btn-start-exam"><i class="fa fa-sign-in"></i> Start</a>
                <?php } ?>

                <?php if($lastSection->start_at != "") { ?>
                    <a href="<?= base_url('exam/start/' . $token) ?>" type="button" class="btn btn-primary block full-width m-b" id="btn-next-section-exam"><i class="fa fa-sign-in"></i> Continue</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>