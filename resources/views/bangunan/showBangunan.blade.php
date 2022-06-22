@extends('mylayouts.main')

@section('tambahcss')
<link rel="stylesheet" href="/css/fstdropdown.css">
<style>
    .input-group-prepend button i {
        position: absolute;
        left: 35px;
    }

    /* .open .fstAll{
            display: none;
        } */

</style>
@endsection

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">
                    {{ str_replace('_', ' ', request('jenis')) }}</h1>
            </div>
        </div>
    </div>
</div>
{{-- End Header --}}

{{-- Table --}}
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex p-0" style="background-color: #25b5e9">
            <h3 class="card-title p-3 text-white font-weight-bold" style="text-transform: capitalize;">
                {{ str_replace('_', ' ', request('jenis')) }}</h3>
        </div>
        <div class="card-body">
            {{-- Table --}}
            <div class="table-responsive">

                {{-- ----------------------------------------------------------- SEARCH PARENT ----------------------------------------------------------- --}}
                @if (count($usulanBangunans) > 0)
                <div class="search align-items-center" style="display: flex; gap: 5px;">
                    
                    {{-- ----------------------------------------------------------- ORDER BY ----------------------------------------------------------- --}}
                    @if (!Auth::user()->hasRole('kcd'))
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown mb-3">
                            {{-- <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                Order by ... <span class="caret"></span>
                            </a> --}}
                            <div class="dropdown-menu" style="min-width: auto !important; width: 125px;">
                                <form action="/bangunan-all" method="get">
                                    @if (request('jenis'))
                                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                                    @endif
                                    @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    <input type="hidden" name="filter" value="kota">
                                    <button class="dropdown-item text-truncate kab" tabindex="-1"
                                        type="submit">Kota/Kabupaten</button>
                                </form>
                                <form action="/bangunan-all" method="get">
                                    @if (request('jenis'))
                                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                                    @endif
                                    @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    <input type="hidden" name="filter" value="kcd">
                                    <button class="dropdown-item text-truncate kab" tabindex="-1" type="submit">Cabang
                                        Dinas Pendidikan</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endif
                    
                    {{-- ----------------------------------------------------------- SEARCH BAR ----------------------------------------------------------- --}}
                    <div class="col p-0">
                        <form class="form-inline" action="/bangunan-all" method="GET" style="width: 100%;">
                            @if (request('jenis'))
                            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                            @endif
                            @if (request('filter'))
                            <input type="hidden" name="filter" value="{{ request('filter') }}">
                            @endif
                            {{-- <div class="input-group" style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                                <input class="form-control form-control-navbar" type="search"
                                    placeholder="Search Nama Sekolah" aria-label="Search"
                                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                    </div>

                </div>

                <div class="table-responsive">
                    @if (count($usulanBangunans) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mt-2">
                                <div class="search" style="display: flex; gap: 1rem;">
                                    @if (!Auth::user()->hasRole('kcd'))
                                        <ul class="nav nav-pills">
                                            <li class="nav-item dropdown">
                                                <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Order by ... <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu"
                                                    style="min-width: auto !important; width: 125px;">
                                                    <form action="/bangunan-all" method="get">
                                                        @if (request('jenis'))
                                                            <input type="hidden" name="jenis"
                                                                value="{{ request('jenis') }}">
                                                        @endif
                                                        @if (request('search'))
                                                            <input type="hidden" name="search"
                                                                value="{{ request('search') }}">
                                                        @endif
                                                        <input type="hidden" name="filter" value="kota">
                                                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                                                            type="submit">Kota/Kabupaten</button>
                                                    </form>
                                                    <form action="/bangunan-all" method="get">
                                                        @if (request('jenis'))
                                                            <input type="hidden" name="jenis"
                                                                value="{{ request('jenis') }}">
                                                        @endif
                                                        @if (request('search'))
                                                            <input type="hidden" name="search"
                                                                value="{{ request('search') }}">
                                                        @endif
                                                        <input type="hidden" name="filter" value="kcd">
                                                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                                                            type="submit">Cabang Dinas Pendidikan</button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                    <div class="col p-0">
                                        <form class="form-inline" action="/bangunan-all" method="GET"
                                            style="width: 100%;">
                                            @if (request('jenis'))
                                                <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                                            @endif
                                            @if (request('filter'))
                                                <input type="hidden" name="filter" value="{{ request('filter') }}">
                                            @endif
                                            <div class="input-group"
                                                style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                                                <input class="form-control form-control-navbar" type="search"
                                                    placeholder="Search Nama Sekolah" aria-label="Search"
                                                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;"
                                                    name="search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <thead>
                                    <tr class="text-center">
                                        <th style="background-color: #eeeeee">No</th>
                                        <th style="background-color: #eeeeee">Nama Sekolah</th>
                                        <th style="background-color: #eeeeee">Status Sekolah</th>
                                        <th style="background-color: #eeeeee">Kabupaten / Kota</th>
                                        <th style="background-color: #eeeeee">Kantor Cabang Dinas</th>
                                        <th style="background-color: #eeeeee">Proposal</th>
                                        <th style="background-color: #eeeeee">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usulanBangunans as $key => $usulan)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->nama }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->status_sekolah }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->kabupaten }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->instansi }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                                    <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                </a>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="/usulan-bangunan/{{ $usulan->id }}"
                                                    class="btn text-white d-inline"
                                                    style="background-color: #00a65b">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                    @endif
                </div>
                @else
                <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                    <div class="alert" role="alert">
                        Data Tidak Ditemukan
                    </div>
                </div>
                @endif

            </div>
            {{-- End --}}
            {{-- Pagination --}}
            {{-- <div class="float-right">
                    {{ $usulanBangunans->links() }}
        </div> --}}
        {{-- End --}}
    </div>
</div>
</div>
{{-- End --}}
@endsection

@section('tambahjs')
<script src="/js/fstdropdown.js"></script>
<script>
    setFstDropdown();

</script>

@if (request('jenis') == 'laboratorium' && Auth::user()->hasRole('dinas'))
<script>
    const namaLaboratorium = document.querySelectorAll('.nama-laboratorium');
    const buttonLaboratorium = document.querySelectorAll('.button-laboratorium');
    // console.log(buttonLaboratorium);
    const formLaboratorium = document.querySelector('.form-laboratorium');
    const inputNamaLaboratorium = document.querySelector('.input-nama-laboratorium');

    buttonLaboratorium.forEach((e, i) => {
        console.log(e)
        e.addEventListener('click', function () {
            inputNamaLaboratorium.value = '';
            inputNamaLaboratorium.value = namaLaboratorium[i].innerHTML.trim();
            console.log(namaLaboratorium[i].innerHTML.trim())
            formLaboratorium.removeAttribute('action');
            formLaboratorium.setAttribute('action', '/jenis-laboratorium/' + e.getAttribute('data-id'));
        })
    });

</script>
@elseif (request('jenis') == 'ruang_penunjang')
<script>
    const inputNamaJenisPimpinan = document.querySelector('.input-nama-jenis-pimpinan');
    const buttonJenisPimpinan = document.querySelectorAll('.button-jenis-pimpinan');
    const namaJenisPimpinan = document.querySelectorAll('.nama-jenis-pimpinan');
    const formJenisPimpinan = document.querySelector('.form-jenis-pimpinan');

    buttonJenisPimpinan.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputNamaJenisPimpinan.value = '';
            inputNamaJenisPimpinan.value = namaJenisPimpinan[i].innerHTML;
            formJenisPimpinan.removeAttribute('action');
            formJenisPimpinan.setAttribute('action', '/jenis-penunjang/' + namaJenisPimpinan[i]
                .getAttribute('data-id'))
        })
    });

</script>
@endif
@endsection
