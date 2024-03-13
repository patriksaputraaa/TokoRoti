<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("connection.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        extract($_POST);
        $sql = "UPDATE roti SET nama_roti='$nama_roti', diameter='$diameter', warna='$warna', harga='$harga' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $id = $_GET["id"];
        $result = $conn->query("SELECT * FROM roti WHERE id='$id'");
        $row = $result->fetch_assoc();
        extract($row);
    }
    ?>

    <form action="" method="post">
        <table border="1">
            <caption>Update Data Roti</caption>
            <tr>
                <td>Nama Roti</td>
                <td><input type="text" name="nama_roti" value="<?= $nama_roti ?>"></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <?php $dropDownDiameter = $diameter; ?>
                <td><select name="diameter">
                        <option value="10" <?php if ($dropDownDiameter == "10") echo 'selected="selected"'; ?>>10 cm</option>
                        <option value="15" <?php if ($dropDownDiameter == "15") echo 'selected="selected"'; ?>>15 cm</option>
                        <option value="20" <?php if ($dropDownDiameter == "20") echo 'selected="selected"'; ?>>20 cm</option>
                        <option value="25" <?php if ($dropDownDiameter == "25") echo 'selected="selected"'; ?>>25 cm</option>
                    </select></td>
            </tr>
            <tr>
                <td>Warna</td>
                <?php $dropDownWarna = $warna; ?>
                <td><select name="warna">
                        <option value="Putih" <?php if ($dropDownWarna == "Putih") echo 'selected="selected"'; ?>>Putih</option>
                        <option value="Kuning" <?php if ($dropDownWarna == "Kuning") echo 'selected="selected"'; ?>>Kuning</option>
                        <option value="Cream" <?php if ($dropDownWarna == "Cream") echo 'selected="selected"'; ?>>Cream</option>
                        <option value="Pink" <?php if ($dropDownWarna == "Pink") echo 'selected="selected"'; ?>>Pink</option>
                    </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?= $harga ?>"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </th>
            </tr>
        </table>
    </form>
</body>

</html>