<!-- Modal -->
<div class="modal fade" id="school_operational_assistance_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah sssData</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post" name="school_operational_assistance_create" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Uploader</label>
                                <input type="text" name="uploader" class="form-control"  value=" {{ Auth::user()->name }} " id="uploader_create" readonly>
                            </div>
                         </div>
                        @can('admin')
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name_create">
                            </div>
                        </div>
                        @endcan
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Gambar:</label>
                                <input class="form-control" type="file" id="image_create" name="image" class="form-control">
                            </div>
                        </div>    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control" id="description_create" cols="30" rows="10"></textarea>
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
