@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
@endsection

@section('container')
    <div class="callout mt-4 callout-success">
        <h5 class="m-0">Jumlah Rombel: <span class="ml-2 h4 font-weight-bold">@if($rombel) {{ $rombel }} @else <span style="font-size: 1rem;">Data belum diinput</span> @endif</span></h5>
    </div>
    <div class="card">
        <div class="card-header p-3" style="background-color: #25b5e9; margin-right: -1px; margin-top: -1px;">
            <h3 class="card-title text-white font-weight-bold">Data Laboratorium</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                    data-target="#modal-tambah">
                    <i class="bi bi-plus"></i>
                    Tambah Laboratorium
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($laboratoriums) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Jenis Lab</th>
                                <th scope="col" class="text-center">Kondisi Ideal</th>
                                <th scope="col" class="text-center">Ketersediaan</th>
                                <th scope="col" class="text-center">Kekurangan</th>
                                <th scope="col" class="text-center">Keterangan</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laboratoriums as $lab)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="text-center">
                                        {{ $lab->jenis }}
                                    </td>
                                    <td class="text-center kondisi-ideal">
                                        {{ $lab->kondisi_ideal }}
                                    </td>
                                    <td class="text-center ketersediaan">
                                        {{ $lab->ketersediaan }}
                                    </td>
                                    <td class="text-center kekurangan">
                                        {{ $lab->kekurangan }}
                                    </td>
                                    <td class="text-center keterangan">
                                        {{ $lab->keterangan }}
                                    </td>
                                    <td class="text-center">
                                        <a href="/bangunan/laboratorium/{{ $lab->id_lab }}"
                                            class="btn btn-block text-white" style="background-color: #00a65b">Detail</a>
                                        <a href="#" class="btn text-white tombol-edit btn-block" data-toggle="modal"
                                            data-target="#modal-edit" style="background-color: #fcc12d"
                                            data-id="{{ $lab->id_lab }}">
                                            Edit
                                        </a>
                                        <form action="/bangunan/laboratorium/{{ $lab->id_lab }}" method="post"
                                            class="mt-2">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('apakah anda yakin akan menghapus laboratorium ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                        <div class="alert" role="alert">
                            Data Tidak Ditemukan
                        </div>
                    </div>
                @endif
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
                    @if (count($jenis_laboratoriums) > 0)
                        <form class="form-horizontal" action="/bangunan/laboratorium" method="post" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Lab</label>
                                    <div class="col-sm-10">
                                        <select class="form-control col-15 fstdropdown-select" id="kompetensi-keahlian"
                                            name="jenis_laboratorium_id" required>
                                            @foreach ($jenis_laboratoriums as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="kondisi" name="kondisi_ideal"
                                            required placeholder="Kondisi Ideal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="ketersediaan" name="ketersediaan"
                                            required placeholder="Ketersediaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="kekurangan" name="kekurangan"
                                            required placeholder="Kekurangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea name="keterangan" id="" cols="30" class="form-control" placeholder="Keterangan" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Tidak ada jenis laboratorium tersedia
                            </div>
                        </div>
                    @endif
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
                    <form class="form-horizontal form-edit" action="/bangunan/laboratorium" method="post" onsubmit="myLoading()">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-kondisi-ideal" id="kondisi"
                                        name="kondisi_ideal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-ketersediaan" id="ketersediaan"
                                        name="ketersediaan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-kekurangan" id="kekurangan"
                                        name="kekurangan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-2 col-form-label">keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="keterangan" id="" cols="30" class="form-control input-keterangan" placeholder="Keterangan" required></textarea>
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
    {{-- modal edit --}}

    {{-- End Row --}}
    <div class="card" style="margin-bottom: 10rem !important">
        <div class="card-header bg-warning">
            <h3 class="card-title text-white pt-2 font-weight-bold" style="text-transform: capitalize">Usulan Laboratorium
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-default"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="table-responsive">
                        @if (count($usulans) > 0)
                            <table class="table table-bordered mt-3">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Jenis
                                            Ruang
                                        </th>
                                        <th colspan="2" class="text-center">Ketersediaan Lahan</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Proposal
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">
                                            Keterangan
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-center">Luas Lahan</th>
                                        <th scope="col" class="text-center">Gambar Lahan</th>
                                    </tr>
                                </thead>
                                {{-- end judul table --}}

                                {{-- isi table --}}
                                <tbody>
                                    @foreach ($usulans as $key => $usulan)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center text-capitalize">
                                                {{ $usulan->nama_jenis_laboratorium }}</td>
                                            <td class="text-center">{{ $usulan->luas_lahan }} M²</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                @foreach ($usulanFotos[$key] as $ke => $foto)
                                                    <a href="{{ asset('storage/' . $foto->nama) }}"
                                                        class="fancybox" data-fancybox="gallery{{ $key }}">
                                                        <img src="{{ asset('storage/' . $foto->nama) }}"
                                                            class="rounded"
                                                            style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                                    <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $usulan->keterangan }}</td>
                                            <td class="text-center">
                                                <a href="/bangunan/usulan/{{ $usulan->id }}/edit"
                                                    class="btn btn-warning text-white">Edit</a>

                                                <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger mt-2"
                                                        onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>
                                                </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- end isi table --}}
                            </table>
                        @else
                            <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Main-Content --}}
    <!-- modal tambah usulan -->
    <div class=" modal fade modal-bangunan {{ $errors->any() ? 'show' : '' }}" id="modal-default"
        style="{{ $errors->any() ? 'display: block;background: rgba(69,90,100, .5);' : '' }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-transform: capitalize;">Usulan Laboratorium</h4>
                    <button type="button" class="close tombol-exnya" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (count($laboratoriums) > 0)
                        <form action="/bangunan/usulan-laboratorium" method="post" enctype="multipart/form-data" onsubmit="myLoading()">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Laboratorium</label>
                                <select class="custom-select col-sm-7" id="kompetensi-keahlian" name="laboratorium_id"
                                    required>
                                    @foreach ($laboratoriums as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                    @endforeach
                                </select>
                                @error('laboratorium_id')
                                    <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- input luas lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Luas Lahan (m²)</label>
                                <input type="number"
                                    class="form-control col-sm-7 @error('luas_lahan') is-invalid @enderror loading-tambah"
                                    placeholder="Masukan Luas Lahan" id="luas-lahan" name="luas_lahan"
                                    value="{{ old('luas_lahan') }}" required>
                                @error('luas_lahan')
                                    <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- end luas lahan --}}
                            {{-- upload gambar lokasi --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan
                                    <br><small class="text-danger">*Note Max 1 Gambar 5MB</small></label>
                                <input type="file" id="gambar-lahan" multiple accept="image/*" name="gambar[]"
                                    class="gambar-lahan mt-2 @error('gambar') is-invalid @enderror loading-tambah"
                                    value="{{ old('gambar') }}" required>
                                @error('gambar.*')
                                    <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- end upload gambar lokasi --}}
                            {{-- upload proposal --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1 @error('proposal') is-invalid @enderror"
                                    value="{{ old('proposal') }}" for="customFile">Proposal</label>
                                <input type="file" class="loading-tambah" id="proposal" accept=".pdf" name="proposal"
                                    required>
                                @error('proposal')
                                    <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- end upload proposal --}}
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default tombol-Close" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn text-white loading-simpan"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Tidak ada laboratorium ditemukan
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
@endsection

@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
    <script>
        const kondisiIdeal = document.querySelectorAll('.kondisi-ideal');
        const ketersediaan = document.querySelectorAll('.ketersediaan');
        const kekurangan = document.querySelectorAll('.kekurangan');
        const tombolEdit = document.querySelectorAll('.tombol-edit');
        const inputKondisiIdeal = document.querySelector('.input-kondisi-ideal');
        const inputKetersediaan = document.querySelector('.input-ketersediaan');
        const inputKekurangan = document.querySelector('.input-kekurangan');
        const formEdit = document.querySelector('.form-edit');
        const keterangan = document.querySelectorAll('.keterangan');
        const inputKeterangan = document.querySelector('.input-keterangan');

        tombolEdit.forEach((e, i) => {
            e.addEventListener('click', function() {
                // console.log(kekurangan[i].innerHTML.trim())
                inputKondisiIdeal.value = '';
                inputKondisiIdeal.value = kondisiIdeal[i].innerHTML.trim();
                inputKetersediaan.value = '';
                inputKetersediaan.value = ketersediaan[i].innerHTML.trim();
                inputKekurangan.value = '';
                inputKekurangan.value = kekurangan[i].innerHTML.trim();
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/bangunan/laboratorium/' + e.getAttribute('data-id'));
                inputKeterangan.innerHTML = '';
                inputKeterangan.innerHTML = keterangan[i].innerHTML.trim();
            })
        });
    </script>
@endsection
