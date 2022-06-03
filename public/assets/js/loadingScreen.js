const loadingScreen = document.querySelector('.loading-screen');
const loadingSimpan = document.querySelector('.loading-simpan');
const loadingTambah = document.querySelectorAll('.loading-tambah');

const loadingValidate = [];

function validation(data) {
    return data != '';
}

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
