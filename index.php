<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script defer src="styles\script.js"></script>
</head>

<body>
    <?php include("connection.php") ?>
    <header style="background-color:goldenrod; display: block">
        <h1 class="display-1" align="center" style="margin: 2px;">Toko Roti Oemar Bakery</h1>
        <p class="display-6" align="center" style="margin: 1px;">Nikmatnya mendoenia</p>
        <br>
    </header>
    <button type="button" style="text-align: right; margin: 5px" onclick="document.location='add.html'">Tambah Data</button>
    <div class="container-fluid" style="text-align: center; background-color:azure">
        <br>
        <table border="1" style="margin: auto" class="table table-striped" id="tabel">
            <thead>
                <tr>
                    <th style="text-align: center;">Gambar</th>
                    <th style="text-align: center;">Deskripsi</th>
                    <th style="text-align: center;">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $table = $conn->query("SELECT * FROM roti");
                while ($row = $table->fetch_assoc()) {
                    extract($row);
                ?>
                    <tr>
                        <td><img src="assets\images\<?= $foto ?>" width="100px" class="rounded mx-auto d-block"></td>
                        <td>
                            <ul style="list-style-type: none; padding-left: 2px; margin-left: 10px; margin-right: 15px">
                                <li><?= $nama_roti ?></li>
                                <li>Diameter: <?= $diameter ?> cm</li>
                                <li>Warna: <?= $warna ?></li>
                                <li><?= $harga ?></li>
                            </ul>
                        </td>
                        <td style="vertical-align: middle;">
                            <div style="text-align: center; ">
                                <input type="button" value="Update"> <input type="button" value="Delete">
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>