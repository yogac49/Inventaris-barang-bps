@extends('layouts.stisla.index', ['title' => 'Halaman Data Ruang', 'page_heading' => 'Data User'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#user_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
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
              <th scope="col">Nama</th>
              <th scope="col">user</th>
              <th scope="col">Role</th>
              <th scope="col">Tanggal Ditambahkan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email}}</td>
              <td>{{ $user->role}}</td>
              <td>{{ $user->created_at }}</td>
              <td class="text-center">
                <a data-id="{{ $user->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#user_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $user->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('user.modal.create')
@include('user.modal.show')
@include('user.modal.edit')
@endpush

@push('js')
@include('user._script')
@endpush