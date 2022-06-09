@extends('mylayouts.main')

@section('container')
<div class="card mt-2">
    <div class="card-header" style="background-color: #25b5e9; margin-right: -1px; margin-top: -1px;">
        <h3 class="card-title text-white">Detail Laboratorium</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center" style="background-color: #eeeeee">Jenis Lab</th>
                    <th scope="col" class="text-center" style="background-color: #eeeeee">Peruntukan Jurusan</th>
                    <th scope="col" class="text-center" style="background-color: #eeeeee">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                        *nama lab*
                    </td>
                    <td class="text-left">
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                        <div> <input class="mr-3" type="checkbox" id="">*Nama Jurusan*</div>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn text-white mb-2" data-toggle="modal" data-target="#modal-edit" style="background-color: #263238;">
                            Hapus
                        </a>

                        <div class="div">
                            <a href="#" class="btn text-white" data-toggle="modal" data-target="#modal-edit" style="background-color: #00a65b;">
                                Tambah
                            </a>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
@endsection