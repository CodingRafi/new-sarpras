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
            @if (count($datas) > 0)
                <div class="search" style="display: flex">
                    @if (!Auth::user()->hasRole('kcd'))
                        <a class="btn btn-light dropdown-toggle" style="border: 1px solid #263238" data-toggle="dropdown"
                            href="#">
                            Order by... <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="min-width: auto !important; width: 160px;">
                            <form action="/" method="get">
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                <input type="hidden" name="filter" value="kota">
                                <button class="dropdown-item text-truncate kab" tabindex="-1"
                                    type="submit">Kota/Kabupaten</button>
                            </form>
                            <form action="/" method="get">
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                <input type="hidden" name="filter" value="kcd">
                                <button class="dropdown-item text-truncate kab" tabindex="-1" type="submit">Kantor Cabang
                                    Dinas</button>
                            </form>
                        </div>
                    @endif
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
                                <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Nama Sekolah
                                </th>
                                <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Status Sekolah
                                </th>
                                <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Kabupaten/ Kota
                                </th>
                                <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Kantor Cabang
                                    Dinas
                                </th>
                                <th class="text-center col-2" style="background-color: #eeeeee" scope="col" colspan="2">
                                    Status Sarpras
                                </th>
                                <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Usulan</th>
                                <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <th class="text-center col-1" scope="row" rowspan="3">
                                        {{ ($profils->currentpage() - 1) * $profils->perpage() + $loop->index + 1 }}</th>
                                    <td class="text-center col-1" rowspan="3">{{ $data['nama'] }}</td>
                                    <td class="text-center col-1" rowspan="3">{{ $data['status_sekolah'] }}</td>
                                    <td class="text-center col-1" rowspan="3">{{ $data['kabupaten'] }}</td>
                                    <td class="text-center col-2" rowspan="3">{{ $data['instansi'] }}</td>
                                    <td class="text-center col-2">
                                        <div class="mt-1 p-1">
                                            Lahan</div>
                                    </td>
                                    <td class="text-center col-2">
                                        <div class="text-white mt-1 p-1"
                                            style="background-color: #00a65b; border-radius:5px">
                                            {{ $data['status_lahan']['kondisi'] }}, Kekurangan
                                            {{ $data['status_lahan']['kekurangan'] }} m²
                                        </div>
                                    </td>
                                    
                                    <td class="text-center col-2" rowspan="3">
                                        <div class="accordion" id="accordionExample{{ $loop->index }}">
                                            @if ($data['usulanLahan']->count())
                                                <div class="card shadow-none">
                                                    <div class="card-header p-0 border-0" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left text-white" type="button"
                                                                data-toggle="collapse" data-target="#collapseOne{{ $loop->index }}"
                                                                aria-expanded="true" aria-controls="collapseOne" style="background-color: #00a65b; white-space:nowrap">
                                                                <i class="bi bi-caret-down-fill icon"></i> Usulan Lahan
                                                            </button>
                                                        </h2>
                                                    </div>

                                                    <div id="collapseOne{{ $loop->index }}" class="collapse" aria-labelledby="headingOne"
                                                        data-parent="#accordionExample{{ $loop->index }}">
                                                        @foreach ($data['usulanLahan'] as $usulan)
                                                            <a class="btn text-white mt-1" style="background-color: #00a65b"
                                                                href="/usulan-lahan/{{ $usulan->id }}">Usulan Lahan
                                                                ({{ $usulan->nama }})
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($data['usulanBangunan']->count())
                                                <div class="card shadow-none">
                                                    <div class="card-header p-0 border-0" id="headingTwo">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left text-white collapsed"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseTwo{{ $loop->index }}" aria-expanded="false"
                                                                aria-controls="collapseTwo" style="background-color: #fcc12d; white-space:nowrap">
                                                                <i class="bi bi-caret-down-fill icon"></i> Usulan Bangunan
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwo{{ $loop->index }}" class="collapse" aria-labelledby="headingTwo"
                                                        data-parent="#accordionExample{{ $loop->index }}">
                                                        @foreach ($data['usulanBangunan'] as $usulan)
                                                            <a class="btn text-white mt-1"
                                                                style="background-color: #fcc12d;text-transform: capitalize;"
                                                                href="/usulan-bangunan/{{ $usulan['id'] }}">Usulan Bangunan
                                                                ({{ str_replace('_', ' ', $usulan->jenis) }})
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($data['rehab']->count())
                                                <div class="card shadow-none">
                                                    <div class="card-header p-0 border-0" id="headingThree">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left text-white collapsed"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseThree{{ $loop->index }}" aria-expanded="false"
                                                                aria-controls="collapseThree" style="background-color: #fcc12d; white-space:nowrap">
                                                                <i class="bi bi-caret-down-fill icon"></i> Rehab Renov
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThree{{ $loop->index }}" class="collapse" aria-labelledby="headingThree"
                                                        data-parent="#accordionExample{{ $loop->index }}">
                                                        @foreach ($data['rehab'] as $usulan)
                                                            <a class="btn text-white mt-1"
                                                                style="background-color: #fcc12d;text-transform: capitalize;"
                                                                href="/bangunan/ruang-rehabrenov/{{ $usulan['id'] }}">Rehab Renov
                                                                ({{ str_replace('_', ' ', $usulan->jenis) }})
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- @dd($data) --}}
                                    </td>
                                    <td class="text-center" rowspan="3"><a class="text-center btn text-white"
                                            style="background-color: #263238" href="/profil/{{ $data['id'] }}">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center col-2">
                                        <div class="mt-1">
                                            Peralatan
                                            {{-- {{ count($data['status_peralatan']) > 0 ? 'Tidak Ideal' : 'Ideal' }} --}}
                                        </div>
                                    </td>
                                    <td class="text-center col-2">
                                        @if (count($data['status_peralatan']) > 0)
                                            <div class="accordion" id="accordionKetPeralatan">
                                                <div class="card shadow-none">
                                                    <div class="card-header p-0 border-0" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left text-white" type="button"
                                                                data-toggle="collapse" data-target="#ketPeralatan"
                                                                aria-expanded="true" aria-controls="collapseOne" style="background-color: #25b5e9;white-space: nowrap;">
                                                                <i class="bi bi-caret-down-fill icon"></i>  Tidak ideal
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="ketPeralatan" class="collapse" aria-labelledby="headingOne" data-parent="#accordionKetPeralatan">
                                                        @foreach ($data['status_peralatan'] as $peralatan)
                                                            <div class="text-white mt-1"
                                                                style="background-color: #25b5e9; border-radius:5px">
                                                                Tidak Ideal, kekurangan {{ $peralatan['kekurangan'] }} peralatan pada
                                                                jurusan
                                                                {{ $peralatan['jurusan'] }}</div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-white mt-1"
                                                style="background-color: #25b5e9; border-radius:5px">Ideal, Peralatan sudah
                                                sesuai standar
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center col-2">
                                        <div class="mt-1">
                                            Bangunan
                                        </div>
                                    </td>
                                    <td class="text-center col-2">
                                        @if (count($data['status_bangunan']) > 0)
                                            <div class="accordion" id="accordionKetBangunan">
                                                <div class="card shadow-none">
                                                    <div class="card-header p-0 border-0" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left text-white" type="button"
                                                                data-toggle="collapse" data-target="#ketBangunan"
                                                                aria-expanded="true" aria-controls="collapseOne" style="background-color: #fcc12d;white-space: nowrap;">
                                                                <i class="bi bi-caret-down-fill icon"></i> Tidak ideal
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="ketBangunan" class="collapse" aria-labelledby="headingOne" data-parent="#accordionKetBangunan">
                                                        @foreach ($data['status_bangunan'] as $bangunan)
                                                            @if ($bangunan['kategori'] == 'lab')
                                                                <div class="text-white mt-1"
                                                                    style="background-color: #fcc12d; border-radius:5px">
                                                                    {{ count($data['status_bangunan']) > 0 ? 'Tidak Ideal' : 'Ideal' }},
                                                                    kekurangan {{ $bangunan['kekurangan'] }} m² pada
                                                                    {{ $bangunan['jenis'] }}</div>
                                                            @elseif($bangunan['kategori'] == 'praktik')
                                                                <div class="text-white mt-1"
                                                                    style="background-color: #fcc12d; border-radius:5px">
                                                                    {{ count($data['status_bangunan']) > 0 ? 'Tidak Ideal' : 'Ideal' }},
                                                                    kekurangan {{ $bangunan['kekurangan'] }} pada
                                                                    Ruang Praktik {{ $bangunan['jenis'] }}</div>
                                                            @elseif($bangunan['kategori'] == 'pimpinan')
                                                                <div class="text-white mt-1"
                                                                    style="background-color: #fcc12d; border-radius:5px">
                                                                    {{ count($data['status_bangunan']) > 0 ? 'Tidak Ideal' : 'Ideal' }}, kekurangan {{ $bangunan['kekurangan'] }} m² pada 
                                                                    Ruang {{ $bangunan['jenis'] }} </div>
                                                            @else
                                                                @if ($bangunan['jenis'] == 'ruang_kelas' || $bangunan['jenis'] == 'toilet')
                                                                    <div class="text-white mt-1"
                                                                        style="background-color: #fcc12d; border-radius:5px;text-transform: capitalize">
                                                                        {{ count($data['status_bangunan']) > 0 ? 'Tidak Ideal' : 'Ideal' }},
                                                                        kekurangan {{ $bangunan['kekurangan'] }} bangunan pada
                                                                        {{ str_replace('_', ' ', $bangunan['jenis']) }}</div>
                                                                @else
                                                                    <div class="text-white mt-1"
                                                                        style="background-color: #fcc12d; border-radius:5px;text-transform: capitalize">
                                                                        {{ count($data['status_bangunan']) > 0 ? 'Tidak Ideal' : 'Ideal' }},
                                                                        kekurangan {{ $bangunan['kekurangan'] }} m² pada
                                                                        {{ str_replace('_', ' ', $bangunan['jenis']) }}</div>
                                                                @endif
                                                            @endif
                                                         @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-white mt-1"
                                                style="background-color: #fcc12d; border-radius:5px">bangunan sudah ideal
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container d-flex justify-content-end">
                    {{ $profils->links() }}
                </div>
            @else
                <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                    <div class="alert" role="alert">
                        Data Tidak Ditemukan
                    </div>
                </div>
            @endif
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
