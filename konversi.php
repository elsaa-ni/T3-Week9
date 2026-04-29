<?php
function cToF($c) {
    return ($c * 9/5) + 32;
}

function fToC($f) {
    return ($f - 32) * 5/9;
}

function cToK($c) {
    return $c + 273.15;
}

$hasil = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST["suhu"];
    $jenis = $_POST["jenis"];

    if (!is_numeric($suhu)) {
        $error = "⚠️ Input harus angka!";
    } else {
        switch ($jenis) {
            case "c_f":
                $hasil = number_format(cToF($suhu),2) . " °F";
                break;
            case "f_c":
                $hasil = number_format(fToC($suhu),2) . " °C";
                break;
            case "c_k":
                $hasil = number_format(cToK($suhu),2) . " K";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
    <link rel="stylesheet" href="konversi.css">
</head>
<body>

<div class="card">
    <h1>🌡️ Konversi Suhu</h1>
    <p class="subtitle">Ubah suhu dengan cepat & mudah</p>

    <form method="post">
        <input type="text" name="suhu" placeholder="Masukkan suhu..." required>

        <select name="jenis">
            <option value="c_f">Celsius → Fahrenheit</option>
            <option value="f_c">Fahrenheit → Celsius</option>
            <option value="c_k">Celsius → Kelvin</option>
        </select>

        <button type="submit">Konversi 🔥</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($hasil): ?>
        <div class="result">
            Hasil: <span><?= $hasil ?></span>
        </div>
    <?php endif; ?>
</div>

</body>
</html>