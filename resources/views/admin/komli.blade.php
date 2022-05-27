@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }

        .input-group-prepend button i {
            position: absolute;
            margin-top: -25px;
        }

    </style>
@endsection

@section("container")

<div class="card mt-2">
    <div class="card-header" style="background-color: #25b5e9">
        <h3 class="text-white card-title">Data Kompetensi Keahlian</h3>
        <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal" data-target="#tambah-kompetensi"><i class="bi bi-plus"></i> Tambah Kompetensi Keahlian
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center" scope="col" style="background-color: #eeeeee">No</th>
                    <th class="text-center" scope="col" style="background-color: #eeeeee">Bidang</th>
                    <th class="text-center" scope="col" style="background-color: #eeeeee">Program</th>
                    <th class="text-center" scope="col" style="background-color: #eeeeee">Kompetensi</th>
                    <th class="text-center" scope="col" style="background-color: #eeeeee">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="text-center" scope="row">1</th>
                    <td class="text-center">Teknologi dan Rekayasa</td>
                    <td class="text-center">Teknik Konstruksi dan Properti</td>
                    <td class="text-center">Konstruksi Gedung, Sanitasi, dan Perawatan</td>
                    <td class="text-center">
                      <div>
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#edit">Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">2</th>
                    <td class="text-center">Teknologi dan Rekayasa</td>
                    <td class="text-center">Teknik Konstruksi dan Properti</td>
                    <td class="text-center">Konstruksi Jalan, Irigasi, dan Jembatan</td>
                    <td class="text-center">
                      <div>
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#edit">Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">3</th>
                    <td class="text-center">Teknologi dan Rekayasa</td>
                    <td class="text-center">Teknik Konstruksi dan Properti</td>
                    <td class="text-center">Bisnis Konstruksi dan Properti</td>
                    <td class="text-center">
                      <div>
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#edit">Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">4</th>
                    <td class="text-center">Teknologi dan Rekayasa</td>
                    <td class="text-center">Teknik Konstruksi dan Properti</td>
                    <td class="text-center">Desain Pemodelan dan Informasi Bangunan</td>
                    <td class="text-center">
                      <div>
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#edit">Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">5</th>
                    <td class="text-center">Teknologi dan Rekayasa</td>
                    <td class="text-center">Teknik Geomatika dan Geospasial</td>
                    <td class="text-center">Teknik Geomatika</td>
                    <td class="text-center">
                      <div>
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#edit">Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
{{-- modal input kompetensi keahlian --}}
<div class="modal fade" id="tambah-kompetensi">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Tambah Kompetensi Keahlian</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="/jenis-pimpinan" method="post">
                  @csrf
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="bidang" name="nama" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="program" class="col-sm-2 col-form-label">Program</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="program" name="nama" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="kompetensi" name="nama" required>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn text-white float-right" style="background-color: #00a65b">Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
{{-- end modal input kompetensi keahlian --}}

{{-- modal edit --}}
<div class="modal fade" id="edit">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Edit Kompetensi Keahlian</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="/jenis-pimpinan" method="post">
                  @csrf
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="bidang" name="nama" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="program" class="col-sm-2 col-form-label">Program</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="program" name="nama" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="kompetensi" name="nama" required>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn text-white float-right" style="background-color: #00a65b">Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
{{-- end modal edit --}}
</div>





@endsection
