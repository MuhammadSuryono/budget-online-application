<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="user_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="session_id">session</label>
                        <select id="session_id" name="session_id" class="form-control">
                            <?php foreach ($session as $key => $value) : ?>
                                <option value="<?= $value->id ?>"><?= $value->session_name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" name="full_name" id="full_name" placeholder="Masukan nama lengkap" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth">Tempat Lahir</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" placeholder="Masukan tempat lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Tanggal Lahir</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" placeholder="Masukan email" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor HP</label>
                        <input class="form-control" placeholder="Masukan Nomor HP" type="tel" name="phone_number" id="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input class="form-control" placeholder="Masukan Alamat" type="text" name="address" id="address">
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