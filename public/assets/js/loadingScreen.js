const loadingScreen = document.querySelector('.loading-screen');
const loadingSimpan = document.querySelector('.loading-simpan');
const loadingSimpan2 = document.querySelector('.loading-simpan2');
const loadingTambah = document.querySelectorAll('.loading-tambah');
const loadingTambah2 = document.querySelectorAll('.loading-tambah2');

const loadingValidate = [];
const loadingValidate2 = [];

function validation(data) {
    return data != '';
}

if (loadingSimpan) {
    loadingSimpan.addEventListener('click', simpan);

    function simpan(){
        for (i = 0; i < loadingTambah.length; i++) {
            loadingValidate[i] = loadingTambah[i].value
            if (loadingTambah[i].type == 'file') {
                loadingValidate[i] = loadingTambah[i].files.length
            }
        };
        
        if (loadingValidate.every(validation) == true) {
            loadingScreen.style.display = 'flex';
            console.log(loadingValidate);
        }else{
            console.log(loadingValidate);
        }
    };
}

if (loadingSimpan2) {
    loadingSimpan2.addEventListener('click', simpan2);

    function simpan2(){
        for (i = 0; i < loadingTambah2.length; i++) {
            loadingValidate2[i] = loadingTambah2[i].value
            if (loadingTambah2[i].type == 'file') {
                loadingValidate2[i] = loadingTambah2[i].files.length
            }
        };
        
        if (loadingValidate2.every(validation) == true) {
            loadingScreen.style.display = 'flex';
            console.log(loadingValidate2);
        }else{
            console.log(loadingValidate2);
        }
    };
}