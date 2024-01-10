<?php

$conn = mysqli_connect("localhost", "root", "", "jurusan");
 function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[]= $row;
    }
    return $rows;

 }
function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = $data["nis"];
    $jurusan = $data["jurusan"];
    $rayon = $data["rayon"];
    // upload gambar 
    // ini wajibb bro
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO `siswa wikrama` (nama, nis,jurusan,rayon,gambar) VALUES ('$nama','$nis', '$jurusan', '$rayon', '$gambar')";
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}
function upload(){
    // wajib 4 ini
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName =$_FILES["gambar"]["tmp_name"];
// pengecekan 
// wajib pengecekan

//1.cek apakah tidak ada gambar di yang di uploafd
// opsional
if($error === 4){
    echo "<script>alert('upload gambar dulu dong ');</script>";
    return false;

}
// 2.pengecekan yang di upload gambar atau bukan 
$ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
// ini pengecekan opsional jika di butukkan sok boleh pake kalau engga juga gapapa
if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>alert('yang anda upload bukan gambar ');</script>";
    return false;

}
// 3. cek jika ukuran 
// if($ukuranFile > 100000000){
//     echo "<script>alert('ukuran gambar terlalu besar');</script>";
//     return false;
// }
// lolos pengecekan 
// geneerate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .='.';
$namaFileBaru .= $ekstensiGambar;

// wajib

move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
return $namaFileBaru;


}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `siswa wikrama` WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $nis = $data["nis"];
    $jurusan = $data["jurusan"];
    $rayon = $data["rayon"];
   
    $gambarLama = $data["gambarLama"];
    // cek apakah user milih gambar baru atau tidak
    if($_FILES["gambar"]['error'] === 4){
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }



    $query = "UPDATE `siswa wikrama` SET 
                    nama = '$nama',
                    nis = '$nis',
                    jurusan = '$jurusan',
                    rayon = '$rayon',
                    gambar = '$gambar'
                    WHERE id = '$id'

                    ";
                    
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM `siswa wikrama`
                    WHERE
                    nama LIKE '%$keyword%' OR 
                    nis LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword% ';
                    ";
                  return query($query);
}
?>