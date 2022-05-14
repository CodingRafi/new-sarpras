@extends('myLayouts.main')

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Pimpinan</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    {{-- ---------------------------------------------------------------------------------------- KONDISI IDEAL ---------------------------------------------------------------------------------------- --}}
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color: #25b5e9; width: auto; min-width: 207px;">
            <img src="/assets/img/icons/flaticons/town.png"
                style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
            <div class="ml-4">
                <span class="text-white">
                    Kondisi Ideal
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">30</h1>
                    <p class="text-white">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik mereka,Ruang guru
                juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya,dapat dimanfaatkan untuk tempat
                peristirahatan para guru ketika selesai mengajar,tempat berkumpulnya para guru ketika ingin melakukan
                rapat.</p>
        </div>
    </div>
    
    {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color: #fcc12d; width: auto; min-width: 207px;">
            <img src="/assets/img/icons/flaticons/building.png"
                style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
            <div class="ml-4 text-white">
                <span class="text white">
                    Ketersediaan
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">11</h1>
                    <p class="text-white">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik mereka,Ruang guru
                juga sRuang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik
                mereka,Ruang guru juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya,dapat
                dimanfaatkan untuk tempat peristirahatan para guru ketika selesai mengajar,tempat berkumpulnya para guru
                ketika ingin melakukan rapat.</p>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color: #263238; width: auto; min-width: 207px;">
            <img src="/assets/img/icons/flaticons/school.png"
                style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
            <div class="ml-4">
                <span class="text-white">
                    Kekurangan
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">3</h1>
                    <p class="text-white">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik mereka,Ruang guru
                juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya,dapat dimanfaatkan untuk tempat
                peristirahatan para guru ketika selesai m</p>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- USULAN PIMPINAN ---------------------------------------------------------------------------------------- --}}
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9;">
            <h3 class="card-title text-white">Usulan Ruang Pimpinan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Jenis Ruang</th>
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
                        <td style="vertical-align: middle">1</td>
                        <td style="vertical-align: middle">Ruang Guru</td>
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
                                <label for="jumlah-lahan" class="col-sm-2 col-form-label">Jenis Lahan</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option value="#">lahan 1</option>
                                        <option value="#">lahan 2</option>
                                        <option value="#">lahan 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah-lahan" class="col-sm-2 col-form-label">Jumlah Lahan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jumlah-lahan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Keterangan Luas Lahan</label>
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
