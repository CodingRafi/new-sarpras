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
                <div class="card-header text-white" style="height:100px; background-color: #00a65b">
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan lahan --}}

        {{-- usulan bangunan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="height:100px; background-color: #25b5e9">
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan bangunan --}}

        {{-- usulan peralatan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="height:100px; background-color: #fcc12d">
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end usulan peralatan --}}

        {{-- total usulan --}}
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="height:100px; background-color: #263238">
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        {{-- end total usulan --}}
    </div>
    {{-- end card atas --}}

    {{-- konten --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Status Sarana Pra sarana Sekolah </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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
