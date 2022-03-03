<?php
$days = [
    "Minggu" => "Minggu",
    "Senin" => "Senin",
    "Selasa" => "Selasa",
    "Rabu" => "Rabu",
    "Kamis" => "Kamis",
    "Jumat" => "Jumat",
    "Sabtu" => "Sabtu"
]
?>

<div class="modal fade" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel" aria-hidden="true" data-type="create">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sessionModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="session_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="session_key">Session Key</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="generate key" name="session_key" aria-label="Input for session key" aria-describedby="generate">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button" id="generate" aria-label="generate session key"><i class="fa fa-cogs"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="session_name">Nama Session</label>
                        <input type="text" name="session_name" id="session_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="day">Hari
                        </label>
                        <select id="day" name="session_day" class="form-control">
                            <?php foreach ($days as $key => $value) : ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Waktu
                        </label>
                        <div class="d-flex justify-content-between">
                            <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Start Time">
                            <div class="mx-2 d-flex justify-content-center align-items-center">
                                -
                            </div>
                            <input type="time" class="form-control" id="end_time" name="end_time" placeholder="End Time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="is_active">
                            Aktif
                        </label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus session ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>