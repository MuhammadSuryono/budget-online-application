<?php $idExam = isset($soal) ? $soal['id'] : null ?>

<div class="col-md-12">
    <?php $this->load->view('components/import_soal.php') ?>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <?php $this->load->view('components/pagination_soal.php') ?>
        </div>
        <div class="col-md-12 col-xl-8">
            <form id="form-create-question" action="<?= $type == 'add' ? '/admin/exam-question/create' : '/admin/exam-question/edit/' . $idExam ?>">
                <?php $this->load->view('components/soal_box.php') ?>
            </form>
        </div>
    </div>
</div>

<?= $this->load->view('components/modal_group_add.php', [], true) ?>