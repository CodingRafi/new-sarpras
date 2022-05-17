@extends('myLayouts.main')

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Lab Komputer</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- JUMLAH ROMBEL ---------------------------------------------------------------------------------------- --}}
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Jumlah Rombel</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool"><i class="fas fa-minus" style="display: none"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">5</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KONDISI IDEAL ---------------------------------------------------------------------------------------- --}}
            <div class="card card-info">
                <div class="card-header" style="background-color: #25b5e9">
                    <h3 class="card-title">Kondisi Ideal</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool"><i class="fas fa-minus" style="display: none"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">25</h1>
                    <p>/ Kelas</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title text-white">Ketersediaan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                        data-target="#edit-ketersediaan"><i class="bi bi-pencil-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">11</h1>
                    <p>/ Kelas</p>
                </div>
            </div>

            {{-- ---------------------------------------------------------------------------------------- MODAL KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
            <div class="modal fade" id="edit-ketersediaan">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h4 class="modal-title">Ketersediaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="ketersediaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Kekurangan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal"
                        data-target="#edit-kekurangan"><i class="bi bi-pencil-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">4</h1>
                    <p>/ Kelas</p>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL KEKURANGAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="edit-kekurangan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title">Kekurangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="kekurangan">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- USULAN LAB KOMPUTER ---------------------------------------------------------------------------------------- --}}
    <div class="card card-info">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title">Usulan Lab Komputer</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal" data-target="#tambah-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Jenis Ruang</th>
                        <th rowspan="2" style="vertical-align: middle;">Jumlah Ruang</th>
                        <th colspan="2">Ketersedian Lahan</th>
                        <th rowspan="2" style="vertical-align: middle;">Proposal</th>
                        <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                    </tr>
                    <tr class="text-center">
                        <th>Gambar Lahan</th>
                        <th>Luas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="vertical-align: middle">1</td>
                        <td class="text-center" style="vertical-align: middle">Ruang Komputer</td>
                        <td class="text-center" style="vertical-align: middle">3</td>
                        <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/assets/img/backgrounds/school.jpg" class="rounded" style="object-fit: cover; width: 100px; aspect-ratio: 1/1;"></a></td>
                        <td class="text-center" style="vertical-align: middle">100m²</td>
                        <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                        <td class="text-center" style="vertical-align: middle"><button class="btn btn-success">Batalkan</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jumlah-ruangan" class="col-sm-2 col-form-label">Jumlah Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jumlah-ruangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Luas Lahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="luas-lahan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar-lokasi" class="col-sm-2 col-form-label">Gambar Lokasi</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar-lokasi">
                                            <label class="custom-file-label" for="gambar-lokasi">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="proposal" class="col-sm-2 col-form-label">Proposal</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="proposal">
                                            <label class="custom-file-label" for="proposal">Pilih Proposal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container-fluid -->
@endsection
