<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles\style.css">
</head>

<body>
    <?php include("connection.php") ?>
    <header style="background-color:goldenrod; display: block">
        <h1 align="center" style="margin: 2px;">Toko Roti Oemar Bakery</h1>
        <p align="center" style="margin: 1px;">Nikmatnya mendunia</p>
        <br>
    </header>
    <div style="text-align: center; background-color:bisque">
    <br>
        <table border="1" style="margin: auto">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <?php
            $table = $conn->query("SELECT * FROM roti");
            while ($row = $table->fetch_assoc()) {
                extract($row);
            ?>
                <tr>
                    <td><img src="assets\images\<?=$foto?>" alt="roti-sesal" width="150px"></td>
                    <td>
                        <ul style="list-style-type: none; padding-left: 2px; margin-left: 10px; margin-right: 15px">
                            <li><?=$nama_roti?></li>
                            <li>Diameter: <?=$diameter?> cm</li>
                            <li>Warna: <?=$warna?></li>
                            <li><?=$harga?></li>
                        </ul>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>