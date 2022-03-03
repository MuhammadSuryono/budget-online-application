<?php $CI = &get_instance() ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <div class="mb-2">
                    <h3 class="font-bold no-margins mb-3">
                        <?= $questions->data_group->description; ?>&nbsp;&nbsp;&nbsp;
                    </h3>
                </div>
                <br/>
                <?php if ($questions->data_group->filename_group != "") {?>
                    <audio src="<?= 'http://156.67.218.146:8080/api/v1/excel/group/question/listening/' . $questions->data_group->filename_group ?>" onplay="onPlay(this)" controls="controls" type="audion/mpeg" preload="preload" id="audio" data-id="<?= $questions->data_group->id ?>" style="width: 100%"></audio>
                    <small class="text-danger unsize">Melakukan refresh halaman sebelum audio selesai akan menyebabkan audio tidak dapat diputar kembali</small>
                <?php }?>

                <?php if ($questions->data_group->question_group != "") {
                    echo $questions->data_group->question_group;
                }?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php
      foreach ($questions->exam_questions as $question) {
    ?>
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <p>
                    <h4><?= $question->question ?></h4>
                </p>
            </div>

            <?php $option = ["a","b","c","d","e"]; for ($i = 1; $i < 5; $i++) {
                $checked = "";
                if (count($question->exam_result) > 0)
                {
                    $checked = $question->exam_result[0]->value == $i ? "checked" : "";
                }
                echo '<div class="ibox-content">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="form-check">
                            <input class="form-check-input" value="'.$i.'" type="radio" name="option'.$question->id.'" id="option" data-id="'.$question->id.'" data-register="'.$registerNumber.'" onclick="onSelectOption(this)" '.$checked.'><label class="form-check-label"> ' . $question->{"option_" . $i} .'</label>
                        </div>
                    </div>
                </div>
            </div>';
            } ?>
        </div>
    </div>

    <?php } ?>
</div>
<?php
$currentSection = $CI->get_session('sessionLastSection');
$dataSection = $CI->get_session('sessionSection');
?>
<div class="row mb-5">
    <div class="col-lg-8"></div>
    <?php if($questions->current_group != $questions->previous_group) {
        $path = base_url('exam/start/' . $token . "?action=previous");
        echo '<div class="col-lg-2">
        <a href="'.$path.'" class="btn btn-outline-secondary btn-block unsize" id="previous-exam"><i class="fa fa-arrow-circle-left"></i> Previous</a>
    </div>';
    }
    ?>

    <?php if ((int)$questions->next_group != (int)$questions->current_group) {
        $pathNext = base_url('exam/start/' . $token . "?action=next");
        echo '<div class="col-lg-2">
        <a href="' . $pathNext . '" class="btn btn-primary btn-block unsize" id="next-exam"><i class="fa fa-sign-in"></i> Next</a>
    </div>';
    }?>

    <?php if ((int)$questions->next_group == (int)$questions->current_group && $questions->is_last_category != 1) {
        $pathNext = base_url('exam/start/' . $token . "?action=next&section-submit=true");
        echo '<div class="col-lg-2">
        <a href="' . $pathNext . '" class="btn btn-primary btn-block unsize" id="next-exam"><i class="fa fa-sign-in"></i> Next Section</a>
    </div>';
    }?>

    <?php if ($questions->current_group == $questions->next_group && $dataSection->next_section == $currentSection && $questions->is_last_category == 1) {
        echo '<div class="col-lg-2">
        <button data-toggle="modal" data-target="#confirmFinish" class="btn btn-primary btn-block" id="finish-exam" data-backdrop="static" ><i class="fa fa-check"></i> Finish</button>
    </div>';
    }?>

</div>

<div class="modal fade" id="confirmFinish" tabindex="-1" aria-labelledby="confirmFinishLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmFinishLabel">Submit Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This action will be your doing is done. Do you want submit your exam?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit-finish" class="btn btn-danger">Yes, Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    function onSelectOption(e) {
        let registerNumber = e.dataset.register;
        let id = parseInt(e.dataset.id);
        let value = parseInt(e.value);

        $.ajax({
            type: 'POST',
            url: "http://156.67.218.146/cbt-be/api/v1/exam-question/push/option",
            data: JSON.stringify({
                "register_number": registerNumber,
                "id": id,
                "value": value
            }),
            dataType: "json",
            cache: false,
            processData: false,
            contentType: "application/json",
            success: function (msg) {
                console.log(msg);
            },
            error: function () {
                alert("Error");
            }
        });
    }

    function onPlay(e){
        let id = e.dataset.id;
        localStorage.setItem(id, 'played');
    }

    let idAudio = document.getElementById('audio');
    let id = idAudio.dataset.id;
    let isPlayed = localStorage.getItem(id) === 'played';
    if (isPlayed) idAudio.setAttribute('src', '#')
</script>