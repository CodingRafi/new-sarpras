@extends('mylayouts.main')

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Koleksi (nama koleksi)</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title text-muted">Total: (totalimages)</h3>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- ---------------------------------------------------------------------------------------- ITEM IMAGE ---------------------------------------------------------------------------------------- --}}
                <div class="item col-lg-3 col-6 mb-3">
                    <div class="shadow-sm rounded border">
                        <button class="btn btn-danger shadow-sm" style="position: absolute; right: 8px;"><i class="bi bi-trash-fill"></i></button>
                        <a href="/assets/img/backgrounds/no-image.jpg" class="fancybox" data-fancybox="gallery1">
                            <img src="/assets/img/backgrounds/no-image.jpg" class="rounded" style="object-fit: cover; width: 100%; aspect-ratio: 1/1;">
                        </a>
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- ITEM IMAGE ---------------------------------------------------------------------------------------- --}}
                <div class="item col-lg-3 col-6 mb-3">
                    <div class="shadow-sm rounded border">
                        <button class="btn btn-danger shadow-sm" style="position: absolute; right: 8px;"><i class="bi bi-trash-fill"></i></button>
                        <a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1">
                            <img src="/assets/img/backgrounds/school.jpg" class="rounded" style="object-fit: cover; width: 100%; aspect-ratio: 1/1;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container-fluid -->
@endsection