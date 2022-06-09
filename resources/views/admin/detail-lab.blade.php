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
                        <div class="div">
                            <a href="#" class="btn text-white mt-2" data-toggle="modal" data-target="#modal-tambah" style="background-color: #00a65b;">
                                Tambah
                            </a>
                        </div>
                        <div class="div">
                            <a href="#" class="btn text-white mt-2" data-toggle="modal" data-target="#modal-edit" style="background-color: #263238;">
                                Hapus
                            </a>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
                <form class="form-horizontal" action="/bidang-kompetensi" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-3 col-form-label">Peruntukan Jurusan</label>
                            <div class="col-sm-9">
                                <select class="form-control col-15 fstdropdown-select" id="kompetensi-keahlian"
                                        name="kota_kabupaten_id">
                                            <option value="rekayasa perangkat lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="teknik elektronika industri">Teknik Elektronika Industri</option>
                                            <option value="multimedia">Multimedia</option>
                                </select>
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
{{-- modal tambah --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
@endsection