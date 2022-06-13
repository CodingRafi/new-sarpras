@extends('mylayouts.main')

@section('container')
    {{-- --------------------------------------------------------------------------------- TITLE --------------------------------------------------------------------------------- --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Riwayat Bantuan {{ $profil->nama }}
                    </h1>
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
                        <h3 class="display-4" style="font-size: 2rem;">{{ $profil->npsn }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="info-box bg-success">
                    <div class="info-box-content">
                        <span class="font-weight-bold">Status</span>
                        <h3 class="display-4" style="font-size: 2rem;">{{ $profil->status_sekolah }}</h3>
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
                        @foreach ($riwayats as $key => $riwayat)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $riwayat->tahun_bantuan }}</td>
                                <td>{{ $riwayat->jenis }}</td>
                                <td>{{ $riwayat->pemberian_bantuan }}</td>
                                <td style="text-transform: uppercase;">{{ $riwayat->sumber_anggaran }}</td>
                                <td>{{ $riwayat->nilai_bantuan }}</td>
                                <td style="max-width: 90px; white-space: normal">{{ $riwayat->keterangan }}</td>
                                @foreach ($fotos[$key] as $ke => $foto)
                                    <td class="text-center">
                                        <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                            data-fancybox="gallery{{ $key }}">
                                            <img src="{{ asset('storage/' . $foto->nama) }}" class="rounded"
                                                style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endSection
