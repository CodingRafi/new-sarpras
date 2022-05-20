@extends('mylayouts.main')


@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
        margin-top: -25px;
    }

</style>
@endsection

@section('container')
<div class="container-fluid mt-3">
    <!-- Small boxes (Stat box) -->
    <div class="card mb-5">
        <div class="card-header" style="background-color: #25b5e9">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#data-usulan-sekolah" data-toggle="tab">
                        <i class="bi bi-house-fill mr-1"></i> Data Usulan Lahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#tambah-usulan-lahan" data-toggle="tab">
                        <i class="bi bi-plus-circle"></i> Pengajuan Usulan Lahan Baru</a>
                </li>
            </ul>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="row">
                        <div class="col">
                            @if (count($semua_usulan) > 0)
                            <table class="table table-hover table-border text-nowrap">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Nama Lahan</th>
                                        <th class="text-center" scope="col">Jenis Usulan</th>
                                        <th class="text-center" scope="col">Panjang(M)</th>
                                        <th class="text-center" scope="col">Lebar(M)</th>
                                        <th class="text-center" scope="col">Luas Lahan(M²)</th>
                                        <th class="text-center" scope="col">Alamat</th>
                                        <th class="text-center" scope="col">Proposal Lahan</th>
                                        <th class="text-center" scope="col">Status Usulan</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                {{-- end judul table --}}

                                {{-- isi table --}}
                                <tbody>
                                    @foreach ($semua_usulan as $usulan)
                                    <tr>
                                        <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-center">{{ $usulan->nama }}</td>
                                        <td class="text-center">{{ $usulan->jenis_usulan }}</td>
                                        <td class="text-center">{{ $usulan->panjang }} M</td>
                                        <td class="text-center">{{ $usulan->lebar }} M</td>
                                        <td class="text-center">{{ $usulan->luas }} M²</td>
                                        <td class="text-center">{{ $usulan->alamat }}</td>
                                        <td class="text-center">
                                            <a href="{{ asset('storage/'. $usulan->proposal) }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img src="/img/pdf.png" alt="image" style="width: 30px">
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $usulan->status }}</td>  
                                        <td>
                                            <div class="card-body">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn" data-toggle="dropdown">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" style="margin-left: -73px">
                                                            <a class="dropdown-item">Edit</a>
                                                            <form action="/usulan-lahan/{{ $usulan->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin akan menghapus usulan ini?')">Batalkan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{-- end isi table --}}
                            </table>
                            @else
                            <div class="container d-flex justify-content-center align-items-center"
                                style="height: 10rem">
                                <div class="alert" role="alert">
                                    Tidak ada data ditemukan
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="chart tab-pane" id="tambah-usulan-lahan">
                    <div class="card-body">
                        <form action="/usulan-lahan" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- input nama lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lahan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan"
                                    id="nama-lahan" name="nama" required>
                            </div>
                            {{-- end input nama lahan --}}

                            {{-- input panjang --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Panjang(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan"
                                    id="panjang" name="panjang" required>
                            </div>
                            {{-- end input panjang --}}

                            {{-- input lebar --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lebar(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan"
                                    id="lebar" name="lebar" required>
                            </div>
                            {{-- end input lebar --}}

                            {{-- input alamat --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Alamat"
                                    id="alamat" name="alamat" required>
                            </div>
                            {{-- end input alamat --}}

                            {{-- upload file(pdf) --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label pt-1" for="customFile">Upload File (PDF)</label>
                                <input type="file" id="chooseFile" accept=".pdf" name="proposal" required>
                            </div>
                            {{-- end upload file(pdf) --}}

                            {{-- button simpan --}}
                            <button type="submit" class="btn text-white col-sm-1"
                                style="background-color: #00a65b">Simpan</button>
                            {{-- end button simpan --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
