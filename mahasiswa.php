<?php

    $koneksi = mysqli_connect("localhost", "root", "", "ifmkrweekly");

    if($koneksi)
    {
        echo "Berhasil Konek";
    }


    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query);

    //// ambil data (fetch) mahasiswa dari lemari (result)


    // ada 4 cara 
    //-----------------------

    //// mysqli_fetch_row
    //// mysqli_fetch_assoc
    //// mysqli_fetch_object
    //// mysqli_fetch_array

    $mhs = mysqli_fetch_row($result);

    var_dump ($mhs)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="3">
        <tr>
            <td>nama</td>
            <td>nim</td>
            <td><img src="aset/images/OIP.jpg"70px" /></td>
        </tr>
    </table>
    <table border="1">
        <tr>
            <td>1</td>
            <td>1</td>
        </tr>
    </table>


    
</body>
</html>