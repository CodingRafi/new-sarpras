@extends('mylayouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">

        <div class="card">
            <div class="card-header" style="background-color: #00a65b">
              <h3 class="text-white">Upload Gambar</h3> 
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end position-absolute" style="right: 0;">
                            <a href="/profil/{{ $koleksi->profil_depo_id }}" class="btn text-white" style="background-color: #263238">Kembali</a>
                          </div>
                        <form action="/foto" method="POST" enctype="multipart/form-data" onsubmit="myLoading()">
                            @csrf
                            <input type="hidden" name="koleksi_id" value="{{ $koleksi_id }}">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input class="form-control filename loading-tambah" type="file" id="formFileMultiple" {{ ($jeniskoleksi->id != 5) ? '' : 'multiple' }} accept="image/*" name="nama[]" style="padding: 6px;height: 40px;" onchange="previewImage()" required>
                                  </div>
                            </div>
                            <div class="container-preview"></div>
                            <button type="submit" class="btn text-white loading-simpan ml-2" style="background-color: #00a65b">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('tambahjs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

<script>

function previewImage(){

        let countFiles = $('.filename')[0].files.length;
        
        for (let x = 0; x < countFiles; x++) {
            let imgPath = $('.filename')[0].files[x]['name'];
            let extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            let image_holder = $('.container-preview');
            
            if (extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {

                    var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "imagePreview",
                                "style": 'width: 210px;margin:10px;backgound-color:grey;'
                            }).appendTo(image_holder);
                        }
        
                        image_holder.show();
                        reader.readAsDataURL($('.filename')[0].files[x]);
    
                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }   
        }
    }

</script>
@endsection
