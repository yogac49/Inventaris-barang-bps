<!-- Modal -->
<div class="modal fade" id="user_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="user_store" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name_create">
                            </div>
                            <div class="form-group">
                                <label for="name">email</label>
                                <input type="email" name="email" class="form-control" id="email_create">
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" name="password" class="form-control" id="password_create">
                            </div>
                            <div class="input-group">
                                <label class="input-group-text  text-white btn-primary" for="inputGroupSelect01">Role User</label>
                                <select class="form-select" name="role" id="inputGroupSelect01">
                                    <option selected>Pilih Role</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</optsion>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>