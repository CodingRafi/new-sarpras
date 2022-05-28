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
                  @foreach ($komlis as $komli)
                      <tr>
                        <th class="text-center" scope="row">{{ ($komlis->currentpage() - 1) * $komlis->perpage() + $loop->index + 1 }}</th>
                        <td class="text-center komli-bidang">{{ $komli->bidang }}</td>
                        <td class="text-center komli-program">{{ $komli->program }}</td>
                        <td class="text-center komli-kompetensi">{{ $komli->kompetensi }}</td>
                        <td class="text-center">
                          <div>
                            <button type="button" class="btn text-white btn-warning tombol-edit-komli" data-toggle="modal" data-target="#edit" data-id="{{ $komli->id }}">Edit
                            </button>
                            <form action="/komli/{{ $komli->id }}" method="post" class="d-inline-block">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan menghapus jurusan ini? semua sekolah yang menggunakan jurusan ini akan terhapus')">Hapus</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $komlis->links() }}
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
              <form class="form-horizontal" action="/komli" method="post">
                  @csrf
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="bidang" name="bidang" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="program" class="col-sm-2 col-form-label">Program</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="program" name="program" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="kompetensi" name="kompetensi" required>
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
              <form class="form-horizontal form-edit" action="/komli" method="post">
                  @csrf
                  @method('patch')
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control input-bidang" id="bidang" name="bidang" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="program" class="col-sm-2 col-form-label">Program</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control input-program" id="program" name="program" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control input-kompetensi" id="kompetensi" name="kompetensi" required>
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

@section('tambahjs')
    <script>
      const komliBidang = document.querySelectorAll('.komli-bidang');
      const komliProgram = document.querySelectorAll('.komli-program');
      const komliKompetensi = document.querySelectorAll('.komli-kompetensi');
      const tombolEditKomli = document.querySelectorAll('.tombol-edit-komli');
      const inputBidang = document.querySelector('.input-bidang');
      const inputProgram = document.querySelector('.input-program');
      const inputKompetensi = document.querySelector('.input-kompetensi');
      const formEdit = document.querySelector('.form-edit');

      tombolEditKomli.forEach((e,i) => {
        e.addEventListener('click', function(){
          inputBidang.value = '';
          inputBidang.value = komliBidang[i].innerHTML;
          inputProgram.value = '';
          inputProgram.value = komliProgram[i].innerHTML;
          inputKompetensi.value = '';
          inputKompetensi.value = komliKompetensi[i].innerHTML;
          formEdit.removeAttribute('action');
          formEdit.setAttribute('action', '/komli/' + e.getAttribute('data-id'));
        })
      });

    </script>
@endsection
