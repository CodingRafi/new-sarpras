@extends('mylayouts.main')

@section('tambahcss')
    <style>
        /* .row-data .col-3 {
                                    max-width: 15.5rem !important;
                                } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

        .input-group-prepend button i {
            position: absolute;
            margin-top: -25px;
        }

    </style>
@endsection

@section('container')
    <!-- title -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end title -->

    {{-- card atas --}}
    <div class="row">
        {{-- usulan lahan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="display:flex; height:100px; background-color: #00a65b">
                    <div class="gambar">
                        <img src="/assets/img/icons/flaticons/paper.png" class="mt-3"
                            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-5 mt-2">
                        <div class="text-atas text-center">
                            <h2>{{ $jml_usulan_lahan }}</h2>
                        </div>
                        <div class="text-bawah text-center">
                            <h4>Usulan Lahan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan lahan --}}

        {{-- usulan bangunan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="display:flex; height:100px; background-color: #25b5e9">
                    <div class="gambar">
                        <img src="/assets/img/icons/flaticons/building.png" class="mt-3"
                            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-4 mt-2">
                        <div class="text-atas text-center">
                            <h2>{{ $jml_usulan_bangunan }}</h2>
                        </div>
                        <div class="text-bawah text-center">
                            <h4>Usulan Bangunan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan bangunan --}}

        {{-- usulan peralatan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="display:flex; height:100px; background-color: #fcc12d">
                    <div class="gambar">
                        <img src="/assets/img/icons/flaticons/tools.png" class="mt-3"
                            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-4 mt-2">
                        <div class="text-atas text-center">
                            <h2>{{ $jml_usulan_peralatan }}</h2>
                        </div>
                        <div class="text-bawah text-center">
                            <h4>Usulan Peralatan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan peralatan --}}

        {{-- total usulan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="display:flex; height:100px; background-color: #263238">
                    <div class="gambar">
                        <img src="/assets/img/icons/flaticons/email.png" class="mt-3"
                            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-5 mt-2">
                        <div class="text-atas text-center">
                            <h2>{{ $jml_usulan_lahan + $jml_usulan_bangunan + $jml_usulan_peralatan }}</h2>
                        </div>
                        <div class="text-bawah text-center">
                            <h4>Total Usulan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end total usulan --}}
    </div>
    {{-- end card atas --}}

    {{-- konten --}}
    <div class="card card-info">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title">Status Sarana Pra sarana Sekolah</h3>
        </div>
        <div class="card-body table-responsive">
            <div class="search" style="display: flex">
                <a class="btn btn-light dropdown-toggle" style="border: 1px solid #263238" data-toggle="dropdown" href="#">
                    Order by... <span class="caret"></span>
                </a>
                <div class="dropdown-menu" style="min-width: auto !important; width: 160px;">
                    <form action="/" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search"
                                value="{{ request('search') }}">
                        @endif
                        <input type="hidden" name="filter" value="kota">
                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                            type="submit">Kota/Kabupaten</button>
                    </form>
                    <form action="/" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search"
                                value="{{ request('search') }}">
                        @endif
                        <input type="hidden" name="filter" value="kcd">
                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                            type="submit">Kantor Cabang Dinas</button>
                    </form>
                </div>
                <form class="form-inline ml-2" action="/" method="GET" style="width: 100%;">
                    @if (request('filter'))
                        <input type="hidden" name="filter" value="{{ request('filter') }}">
                    @endif
                    <div class="input-group" style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search Nama Sekolah"
                            aria-label="Search" style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;"
                            name="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card mt-3">
                <table class="table table-responsive table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="text-center col-1" style="background-color: #eeeeee" scope="col">No</th>
                            <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Nama Sekolah</th>
                            <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Status Sekolah</th>
                            <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Kabupaten/ Kota</th>
                            <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Kantor Cabang Dinas
                            </th>
                            <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Status Sarpras</th>
                            <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Usulan</th>
                            <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th class="text-center col-1" scope="row">
                                    {{ ($profils->currentpage() - 1) * $profils->perpage() + $loop->index + 1 }}</th>
                                <td class="text-center col-1">{{ $data['nama'] }}</td>
                                <td class="text-center col-1">{{ $data['status_sekolah'] }}</td>
                                <td class="text-center col-1">{{ $data['kabupaten'] }}</td>
                                <td class="text-center col-2">{{ $data['instansi'] }}</td>
                                <td class="text-center col-2">
                                    <div class="text-white mt-1" style="background-color: #00a65b; border-radius:5px">Lahan
                                        ideal</div>
                                    <div class="text-white mt-1" style="background-color: #25b5e9; border-radius:5px">
                                        Peralatan ideal</div>
                                    <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Belum
                                        ideal, kurang ruang praktik TKJ</div>
                                    <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Belum
                                        ideal, kurang ruang kelas</div>
                                </td>
                                <td class="text-center col-2">
                                    @foreach ($data['usulanLahan'] as $usulan)
                                        <a class="btn text-white mt-1" style="background-color: #fcc12d"
                                            href="/usulan-lahan/{{ $usulan->id }}">Usulan Lahan
                                            ({{ $usulan->nama }})</a>
                                    @endforeach
                                    @foreach ($data['usulanBangunan'] as $usulan)
                                        <a class="btn text-white mt-1"
                                            style="background-color: #fcc12d;text-transform: capitalize;"
                                            href="/usulan-bangunan/{{ $usulan['id'] }}">Usulan Bangunan
                                            ({{ str_replace('_', ' ', $usulan->jenis) }})</a>
                                    @endforeach
                                    @foreach ($data['rehab'] as $usulan)
                                        <a class="btn text-white mt-1"
                                            style="background-color: #fcc12d;text-transform: capitalize;"
                                            href="/bangunan/ruang-rehabrenov/{{ $usulan['id'] }}">Rehab Renov
                                            ({{ str_replace('_', ' ', $usulan->jenis) }})</a>
                                    @endforeach
                                </td>
                                <td class="text-center"><a class="text-center btn text-white"
                                        style="background-color: #263238" href="/profil/{{ $data['id'] }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container d-flex justify-content-end">
                {{ $profils->links() }}
            </div>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>
    {{-- end konten --}}
@endsection


@section('tambahjs')
    <script>
        const kab = document.querySelector('.kab');
        const kcd = document.querySelector('.kcd');

        kab.addEventListener('click', function() {

        })
    </script>
@endsection







@section('tambahjs')
    {{-- <script>
        const tombolEdit = document.querySelectorAll('.tombol-edit');
        const inputNamaEdit = document.querySelector('.input-nama-edit');
        const inputPanjangEdit = document.querySelector('.panjang-nama-edit');
        const inputLebarEdit = document.querySelector('.lebar-nama-edit');
        const nama = document.querySelectorAll('.nama');
        const panjang = document.querySelectorAll('.panjang');
        const lebar = document.querySelectorAll('.lebar');
        const id_kekuranganLahan = document.querySelectorAll('.id_kekuranganLahan');
        const inputIdKekurangan = document.querySelector('.inputIdKekurangan');

        tombolEdit.forEach((e, i) => {
            e.addEventListener('click', function() {
                console.log()
                inputNamaEdit.value = '';
                inputNamaEdit.value = nama[i].innerHTML;
                inputPanjangEdit.value = '';
                inputPanjangEdit.value = parseInt(panjang[i].innerHTML.replace('m²', ''));
                inputLebarEdit.value = '';
                inputLebarEdit.value = parseInt(lebar[i].innerHTML.replace('m²', ''));
                inputIdKekurangan.value = '';
                inputIdKekurangan.value = id_kekuranganLahan[i].value;
            })
        });
    </script> --}}
@endsection
