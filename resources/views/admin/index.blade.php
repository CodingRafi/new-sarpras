@extends('mylayouts.main')

@section('container')

{{-- @dd($profils) --}}
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">Sekolah id</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Status Sekolah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profils as $profil)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $profil->depo_npsn }}</td>
                                <td>{{ $profil->depo_sekolah_id }}</td>
                                <td>{{ $profil->depo_nama }}</td>
                                <td>{{ $profil->depo_status_sekolah }}</td>
                                <td>
                                    <a href="/profildepo/{{ $profil->id }}" class="btn btn-primary">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $profils->links() }}
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
