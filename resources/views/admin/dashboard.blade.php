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
                        <img src="/assets/img/icons/flaticons/paper.png" class="mt-3" style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-5 mt-2">
                        <div class="text-atas text-center">
                            <h2>15</h2>
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
                        <img src="/assets/img/icons/flaticons/building.png" class="mt-3" style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-4 mt-2">
                        <div class="text-atas text-center">
                            <h2>38</h2>
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
                        <img src="/assets/img/icons/flaticons/tools.png" class="mt-3" style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-4 mt-2">
                        <div class="text-atas text-center">
                            <h2>25</h2>
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
                        <img src="/assets/img/icons/flaticons/email.png" class="mt-3" style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
                    </div>
                    <div class="text ml-5 mt-2">
                        <div class="text-atas text-center">
                            <h2>78</h2>
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
                    Filter by... <span class="caret"></span>
                </a>
                <div class="dropdown-menu" style="min-width: auto !important; width: 160px;">
                    <a class="dropdown-item text-truncate" tabindex="-1" href="#">Kota/ Kabupaten</a>
                    <a class="dropdown-item text-truncate" tabindex="-1" href="#">Kantor Cabang Dinas</a>
                </div>
                <input class="form-control ml-3" style="width: 910px" type="search" placeholder="Search NPSN, sekolah id, nama sekolah" aria-label="Search" style="height: 2.5rem;font-size: 15px;padding: 0 10px;" name="search">
            </div>
            <div class="card mt-3">
                <table class="table table-responsive table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center col-1" style="background-color: #eeeeee" scope="col">No</th>
                        <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Nama Sekolah</th>
                        <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Status Sekolah</th>
                        <th class="text-center col-1" style="background-color: #eeeeee" scope="col">Kabupaten/ Kota</th>
                        <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Kantor Cabang Dinas</th>
                        <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Status Sarpras</th>
                        <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Usulan</th>
                        <th class="text-center col-2" style="background-color: #eeeeee" scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- row 1 --}}
                      <tr>
                        <th class="text-center col-1" scope="row">1</th>
                        <td class="text-center col-1">SMK TARUNA BHAKTI</td>
                        <td class="text-center col-1">Swasta</td>
                        <td class="text-center col-1">Depok</td>
                        <td class="text-center col-2">Kantor Cabang Dinas Pendidikan Wilayah II (Wilayah KCD 2)</td>
                        <td class="text-center col-2">
                            <div class="text-white mt-1" style="background-color: #00a65b; border-radius:5px">Lahan ideal</div>
                            <div class="text-white mt-1" style="background-color: #25b5e9; border-radius:5px">Peralatan ideal</div>
                            <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Belum ideal, kurang ruang praktik TKJ</div>
                            <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Belum ideal, kurang ruang kelas</div>
                        </td>
                        <td class="text-center col-2">
                            <a class="btn text-white mt-1" style="background-color: #fcc12d" href="">Ruang praktik TKJ</a>
                            <a class="btn text-white mt-1" style="background-color: #fcc12d" href="">Ruang kelas baru</a>
                        </td>
                        <td class="text-center"><a class="text-center btn text-white" style="background-color: #263238" href="">Detail</a>
                        </td>
                      </tr>
                      {{-- end row 1 --}}

                      {{-- row 2 --}}
                      <tr>
                        <th class="text-center col-1" scope="row">2</th>
                        <td class="text-center col-1">SMKN 1 CILEUNGSI</td>
                        <td class="text-center col-1">Negeri</td>
                        <td class="text-center col-1">Bogor</td>
                        <td class="text-center col-2">Cabang Dinas Pendidikan Wilayah 1</td>
                        <td class="text-center col-2">
                            <div class="text-white mt-1" style="background-color: #00a65b; border-radius:5px">Belum ideal, kurang lahan</div>
                            <div class="text-white mt-1" style="background-color: #25b5e9; border-radius:5px">Belum ideal, kurang peralatan TKJ</div>
                            <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Bangunan ideal</div>
                        </td>
                        <td class="text-center col-2">
                            <a class="btn text-white mt-1" style="background-color: #00a65b" href="">Lahan</a>
                            <a class="btn text-white mt-1" style="background-color: #25b5e9" href="">Peralatan TKJ</a>
                        </td>
                        <td class="text-center"><a class="text-center btn text-white" style="background-color: #263238" href="">Detail</a>
                        </td>
                      </tr>
                      {{-- end row 2 --}}

                      {{-- row 3 --}}
                      <tr>
                        <th class="text-center col-1">3</th>
                        <td class="text-center col-1">SMKN 1 CIOMAS</td>
                        <td class="text-center col-1">Negeri</td>
                        <td class="text-center col-1">Bogor</td>
                        <td class="text-center col-2">Cabang Dinas Pendidikan Wilayah 1</td>
                        <td class="text-center col-2">
                            <div class="text-white mt-1" style="background-color: #00a65b; border-radius:5px">Lahan ideal</div>
                            <div class="text-white mt-1" style="background-color: #25b5e9; border-radius:5px">Peralatan ideal</div>
                            <div class="text-white mt-1" style="background-color: #fcc12d; border-radius:5px">Bangunan ideal</div>
                        </td>
                        <td class="text-center col-2">Tidak Ada Usulan</td>
                        <td class="text-center"><a class="text-center btn text-white" style="background-color: #263238" href="">Detail</a>
                        </td>
                      </tr>
                      {{-- end row 3 --}}
                    </tbody>
                  </table>
            </div>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>
    {{-- end konten --}}


@endsection


@section('tambahjs')
    <script>
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
    </script>
@endsection
