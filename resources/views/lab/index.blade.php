@extends('mylayouts.main')

@section('container')
<div class="container pt-4">
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9; margin-right: -1px; margin-top: -1px;">
            <h3 class="card-title text-white">Data Laboratorium</h3>
            <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                data-target="#modal-tambah">
                <i class="bi bi-plus"></i>
                Tambah Laboratorium
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Jenis Lab</th>
                            <th scope="col" class="text-center">Kondisi Ideal</th>
                            <th scope="col" class="text-center">Ketersediaan</th>
                            <th scope="col" class="text-center">Kekurangan</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center" scope="row">
                                1
                            </th>
                            <td class="text-center">
                                Lab Komputer
                            </td>
                            <td class="text-center">
                                10
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                <a href="/detail" class="btn btn-info btn-block">Detail</a>
                                <a href="#" class="btn text-white btn-block" data-toggle="modal" data-target="#modal-edit"
                                    style="background-color: #00a65b">
                                    Edit
                                </a>
                                <form action="#" method="post" style="padding-top: .5rem">
                                    <button class="btn btn-danger btn-block" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
    
                        <tr>
                            <th class="text-center" scope="row">
                                2
                            </th>
                            <td class="text-center">
                                Teknik Elektronika Industri
                            </td>
                            <td class="text-center">
                                10
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-block">Detail</a>
                                <a href="#" class="btn text-white btn-block" data-toggle="modal" data-target="#modal-edit"
                                    style="background-color: #00a65b">
                                    Edit
                                </a>
                                <form action="#" method="post" style="padding-top: .5rem">
                                    <button class="btn btn-danger btn-block" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">
                                3
                            </th>
                            <td class="text-center">
                                Multimedia
                            </td>
                            <td class="text-center">
                                10
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-block">Detail</a>
                                <a href="#" class="btn text-white btn-block" data-toggle="modal" data-target="#modal-edit"
                                    style="background-color: #00a65b">
                                    Edit
                                </a>
                                <form action="#" method="post" style="padding-top: .5rem">
                                    <button class="btn btn-danger btn-block" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/bidang-kompetensi" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis Lab</label>
                                <div class="col-sm-10">
                                    <select class="form-control col-15 fstdropdown-select" id="kompetensi-keahlian"
                                        name="kota_kabupaten_id">
                                        <option value="Lab Komputer">Lab Komputer</option>
                                        <option value="teknik elektronika industri">Teknik Elektronika Industri</option>
                                        <option value="multimedia">Multimedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kondisi" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ketersediaan" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kekurangan" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn text-white float-right"
                                style="background-color: #00a65b">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal tambah --}}
    
    {{-- modal edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/bidang-kompetensi" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis Lab</label>
                                <div class="col-sm-10">
                                    <select class="form-control col-15 fstdropdown-select" id="kompetensi-keahlian"
                                        name="kota_kabupaten_id">
                                        <option value="Lab Komputer">Lab Komputer</option>
                                        <option value="teknik elektronika industri">Teknik Elektronika Industri</option>
                                        <option value="multimedia">Multimedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kondisi" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ketersediaan" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kekurangan" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn text-white float-right"
                                style="background-color: #00a65b">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
