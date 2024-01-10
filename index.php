
<?php 
require 'funcation.php';

$siswa = mysqli_query($conn, "SELECT * FROM `siswa wikrama` ");
if(isset($_POST["cari"])){
  
  $siswa = cari($_POST["keyword"]);
}


?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Tabel</title>
    <style>

body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }


        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }


        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }


        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            text-align: center;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        .button.update-btn {
            background-color: #ffc107;
        }

        .button.delete-btn {
            background-color: #dc3545;
        }
    </style>




    </style>
    
</head>
<body>

    <h2>Data Orang berkunjung ke perpustakan</h2>
    <a class="button" href="index1.php">TAMBAHAN SISWA</a>

    <form action="" method="post"  enctype="multipart/from-data">
        <label for="keyword">Search:</label>
        <input type="text" id="keyword" name="keyword" autocomplete="off" placeholder="Search by Name, NIS, Jurusan, Rayon" autofocus>
        <button type="cari" name="cari">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Actions</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jurusan</th>
                <th>Rayon</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            <?php foreach($siswa as $row):?>
            <tr>
                <th><?= $i ?></th>
                <th>
                    <a class="button" href="ubah.php?id=<?= $row["id"];?>">UPDATE</a>
                    <a class="button" href="hapus.php?id=<?= $row["id"];?>">DELETE</a>
                </th>
                <th><?= $row["nama"];?></th>
                <th><?= $row["nis"];?></th>
                <th><?= $row["jurusan"];?></th>
                <th><?= $row["rayon"];?></th>
                <th><img src="img/<?= $row["gambar"];?>" alt=""></th>
            </tr>
            <?php $i++ ;?>
            <?php endforeach ;?>
        </tbody>
    </table>

</body>
</html>
