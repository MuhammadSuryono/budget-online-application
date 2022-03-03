<div class="animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5">
            <div class="ibox-content">
                <div class="d-block text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" width="200" />
                </div>
                <div class="text-center mb-3">
                    <img alt="image"
                         style="border: #3a526b solid 3px; border-radius: 50%;"
                         class="rounded-circle mb-2"
                         src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                         width="100">
                    <h3><strong><?= strtoupper($userData->full_name) ?></strong></h3>
                    <h5><?= $userData->number_of_register ?></h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="label label-danger"><i class="fa fa-envelope"></i> <?= $userData->email ?></span>
                            <span class="label label-info"><i class="fa fa-phone"></i> <?= $userData->phone_number ?></span>
                        </div>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center">
                                OVERVIEW
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <td>No</td>
                                            <td>Category</td>
                                            <td>Total Question</td>
                                            <td>Total Answer</td>
                                            <?= $sessionExam->with_result ? '<td>Score</td>' : '' ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($resumeDataExam as $resume) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td><?= $resume->name ?></td>
                                                <td class="text-center"><?= $resume->total_question ?></td>
                                                <td class="text-center"><?= $resume->total_answer ?></td>
                                                <?= $sessionExam->with_result ? '<td class="text-center">100</td>' : '' ?>
                                            </tr>
                                        <?php
                                        $no++;
                                        } ?>
                                    </tbody>
                                    <?php
                                    if ($sessionExam->with_result) {
                                        ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-center font-bold">Total Score</td></td>
                                                <td class="text-center">250</td>
                                            </tr>
                                        </tfoot>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading text-center">
                                TIME EXAM
                            </div>
                            <div class="panel-body">
                                <table class="table mb-3">
                                    <tr>
                                        <td>Duration</td>
                                        <td>: <?= $duration ?></td>
                                    </tr>
                                    <tr>
                                        <td>Start Time</td>
                                        <td>: <?= $sessionExam->start_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>End Time</td>
                                        <td>: <?= $sessionExam->finish_at ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading text-center">
                                ATTENTION
                            </div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url("exam/logout") ?>" class="btn btn-outline-secondary btn-block">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>