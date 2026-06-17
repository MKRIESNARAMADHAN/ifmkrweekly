<?php
    if(isset($_POST("kirim")))
    {

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>tambah data mahasiswa</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nama">nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" requered/></td>
            </tr>
             <tr>
                <td><label for="nim">nim</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim"/></td>
            </tr>
        </table>
        <button type="submit" name="kirim">tambah data</button>
    </form>
</body>
</html>