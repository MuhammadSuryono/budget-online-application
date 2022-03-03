<div class="row border-bottom white-bg dashboard-header">
    <div class="col-sm-12 mb-2">
        <button class="btn btn-flat btn-primary" style="float: right" data-toggle="modal" data-target="#createFolderProjectModal"><i class="fa fa-plus"></i> Buat Folder Budget</button>
    </div>
    <div class="col-md-12 mb-2">
        <h3><i class="fa fa-folder"></i> FOLDER BUDGET</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Folder</th>
                    <th>Nama</th>
                    <th>Tahun</th>
                    <th>Pembuat</th>
                    <th>PIC</th>
                    <th>Divisi</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="9" class="text-center"><i class="fa fa-times"></i> Tidak ada data</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <h3><i class="fa fa-file"></i> BUKTI PENGELUARAN UANG</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No BPU</th>
                    <th>Folder</th>
                    <th>Nama Project</th>
                    <th>Nama Item</th>
                    <th>Jenis</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="9" class="text-center"><i class="fa fa-times"></i> Tidak ada data</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->load->view('admin/dashboard/modal_create_folder_project.php', [], true) ?>