let danhSachPhim = [
    {
        id: 1,
        tenPhim: "Mưa đỏ",
        namPhatHanh: 2025,
        tuoi: 16,
        thoiLuong: 2,
        quocGia: "Việt Nam",
        poster: "url('./img/mua-do2-1122.jpeg')"
    },

    {
        id: 2,
        tenPhim: "Conan",
        namPhatHanh: 2024,
        tuoi: 13,
        thoiLuong: 1.5,
        quocGia: "Nhật Bản",
        poster: "url('./img/poster/conan_27.jpg')"

    }
]

let phimHienTai = danhSachPhim[0];

let banner = document.getElementsByClassName('banner')[0];

function chonPhim(idPhim){
    for (let i = 0; i < danhSachPhim.length; i++){
        if(danhSachPhim[i].id == idPhim){
            
            banner.style.backgroundImage = danhSachPhim[i].poster;
            
            document.getElementById('tenPhim').innerHTML = danhSachPhim[i].tenPhim;
            document.getElementById('namPhatHanh').innerHTML = danhSachPhim[i].namPhatHanh;
            document.getElementById('thoiLuong').innerHTML = danhSachPhim[i].thoiLuong;
            document.getElementById('tuoi').innerHTML = danhSachPhim[i].tuoi;
            document.getElementById('quocGia').innerHTML = danhSachPhim[i].quocGia;
        }
    }
}