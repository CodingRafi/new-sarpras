@extends('mylayouts.main')

@section('container')
{{-- --------------------------------------------------------------------------------- TITLE --------------------------------------------------------------------------------- --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Riwayat Bantuan (nama sekolah)</h1>
            </div>
        </div>
    </div>
</div>

{{-- --------------------------------------------------------------------------------- TITLE --------------------------------------------------------------------------------- --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="info-box bg-info">
                <div class="info-box-content">
                    <span class="font-weight-bold">NPSN</span>
                    <h3 class="display-4" style="font-size: 2rem;">20202020</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="info-box bg-success">
                <div class="info-box-content">
                    <span class="font-weight-bold">Status</span>
                    <h3 class="display-4" style="font-size: 2rem;">Negeri</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title font-weight-bold text-white">Detail</h3>
        </div>
        <div class="card-body table-responsive pt-0">
            <table class="table table-bordered text-nowrap">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Tahun Bantuan</th>
                        <th>Jenis</th>
                        <th>Pemberi Bantuan</th>
                        <th>Sumber Anggaran</th>
                        <th>Nilai Bantuan</th>
                        <th>Keterangan</th>
                        <th>Foto Bantuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>2019</td>
                        <td>Sumbangan</td>
                        <td>Dinas Pendidikan JABAR</td>
                        <td>APBN</td>
                        <td>Bangunan Kelas</td>
                        <td style="max-width: 90px; white-space: normal">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td class="text-center">
                            <a href="/assets/img/backgrounds/school.jpg"
                                class="fancybox"
                                data-fancybox="gallery">
                                <img src="/assets/img/backgrounds/school.jpg"
                                    class="rounded"
                                    style="object-fit: cover; width: 150px; aspect-ratio: 1/1;">
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>2019</td>
                        <td>Sumbangan</td>
                        <td>Dinas Pendidikan JABAR</td>
                        <td>APBN</td>
                        <td>Bangunan Kelas</td>
                        <td style="max-width: 90px; white-space: normal">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td class="text-center">
                            <a href="/assets/img/backgrounds/school.jpg"
                                class="fancybox"
                                data-fancybox="gallery">
                                <img src="/assets/img/backgrounds/school.jpg"
                                    class="rounded"
                                    style="object-fit: cover; width: 150px; aspect-ratio: 1/1;">
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection
