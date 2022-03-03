<div class="modal fade" id="questionAdd" tabindex="-1" role="dialog" aria-labelledby="questionAddLabel" aria-hidden="true" data-type="create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questionAddLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="question_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Kategori Soal</label>
                        <select id="day" name="question_category_id" class="form-control">
                            <?php foreach ($category as $value) : ?>
                                <option value="<?= $value->id ?>"><?= $value->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title_question">Judul Soal</label>
                        <input type="text" class="form-control" name="title_question" id="title_question" placeholder="Judul soal">
                    </div>
                    <div class="form-group">
                        <label for="name">Section</label>
                        <select id="day" name="section_id" class="form-control">
                            <?php foreach (["A", "B", "C", "D", "E", "F"] as $key => $value) : ?>
                                <option value="<?= $key + 1 ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title_question">Description Section</label>
                        <textarea class="ckeditor" name="description"></textarea>
                    </div>
                    
                    <input type="hidden" name="is_publish" class="form-control">
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
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalStatusQuestion" tabindex="-1" aria-labelledby="modalStatusQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusQuestionLabel">Konfirmasi Publish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mengubah status data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="publish" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>