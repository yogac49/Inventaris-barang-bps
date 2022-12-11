@extends('layouts.stisla.index', ['title' => 'Halaman data services', 'page_heading' => 'Data Servicesss'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#school_operational_assistance_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Taaa
      </button>

    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Pengunggah</th>
              <th scope="col">Nama</th>
              <th scope="col">Nota</th>
              <th scope="col">Tanggal Ditambahkan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($school_operational_assistances as $school_operational_assistance)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $school_operational_assistance->uploader }}</td>
              <td>{{ $school_operational_assistance->name }}</td>
              <td style="width:15%;" class="text-center"><img class="img-fluid" src="{{asset('file/upload/'.$school_operational_assistance ->image)}}" /></td>
              <td>{{ $school_operational_assistance->created_at }}</td>
              <td class="text-center">
                <a data-id="{{ $school_operational_assistance->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_school_operational_assistance">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $school_operational_assistance->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#school_operational_assistance_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $school_operational_assistance->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('school-operational-assistances.modal.create')
@include('school-operational-assistances.modal.show')
@include('school-operational-assistances.modal.edit')
@include('school-operational-assistances._script')
@endpush

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function() {
        $("imageClassOrTagOrID").click( function() {
            this.requestFullscreen();
        });
    });
</script>
<script>
    console.log("buw");
    $(document).ready(function() {
        $(".show_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "school-operational/json/" + id,
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#modalLabel").html(data.data.name)
                    $("#name").html(data.data.name)
                    $("#description").html(data.data.description)
                }
            })
        })

        $(".swal-edit-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "school-operational/json/" + id + "/edit",
                type: "GET",
                
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#name_edit").val(data.data.name)
                    $("#description_edit").val(data.data.description)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $("#swal-update-button").click(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let id = $("#swal-update-button").attr("data-id");
            let token = $("input[name=_token]").val();

            let name = $("#name_edit").val();
            let description = $("#description_edit").val();

            $.ajax({
                url: "school-operational/json/" + id,
                type: "PUT",
                data: {
                    _token: token,
                    name: $("#name_edit").val(),
                    description: $("#description_edit").val()
                },
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil diubah.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 800)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat mengubah data.", "warning");
                }
            });
        });

        $("form[name='school_operational_assistance_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();
            console.log(e);
            $.ajax({
                method: "POST",
                url: "school-operational/json",
                enctype: "multipart/form-data",
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                data:new FormData(this),
                // data: {
                //     _token: "{{ csrf_token() }}",
                //     name: $("#name_create").val(),
                //     description: $("#description_create").val(),
                //     image: $("#image_create").val()
                // },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                },
                error: function(data) {
                    console.log('gagal');
                    console.log(data);
                }
            })
        })

        $(".swal-delete-button").click(function() {
            Swal.fire({
                title: "Hapus?",
                text: "Data tidak akan bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    let id = $(this).data("id");
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "school-operational/json/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent();
                                        if (content) {
                                            const b = content.querySelector("b");
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft();
                                            }
                                        }
                                    }, 100);
                                },
                                showConfirmButton: false
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
