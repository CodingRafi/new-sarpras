@extends('mylayouts.main')

@section('container')
{{-- @dd($profils) --}}
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4">Profil Sekolah</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <form action="/profil/admin" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search NPSN, sekolah id, nama sekolah"
                    name="search">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
            </div>
        </form> --}}
        <div class="card" style="overflow-x: auto">
            <table class="table" style="text-align: center;" >
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
                        <td>{{ $profil->npsn }}</td>
                        <td>{{ $profil->sekolah_id }}</td>
                        <td>{{ $profil->nama }}</td>
                        <td>{{ $profil->status_sekolah }}</td>
                        <td>
                            <a href="/profil/{{ $profil->id }}" class="btn btn-primary">Show</a>
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
