<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#sessionModal">Tambah Data</button>
<div class="ibox ">
    <div class="ibox-title">
        <h5><?= $title_tab ?> </h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Days</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Session Key</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data)) : ?>
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td class="text-left"><?= $value->session_name ?></td>
                            <td class="text-left"><?= $value->session_day ?></td>
                            <td><?= $value->start_time ?></td>
                            <td><?= $value->end_time ?></td>
                            <td class="text-left"><?= $value->session_key ?></td>
                            <td><span class="badge <?= $value->is_active == 1 ? "badge-primary" : "badge-danger" ?>"><?= $value->is_active == 1 ? "Aktif" : "Nonaktif" ?></span></td>
                            <td>
                                <button data-toggle="modal" data-target="#sessionModal" data-id="<?= $value->id ?>" data-session="<?= htmlspecialchars(json_encode($value)) ?>" class="btn btn-primary">Edit</button>
                                <button data-toggle="modal" data-target="#modalDelete" data-id="<?= $value->id ?>" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->load->view('admin/session/modal_form', [], true) ?>