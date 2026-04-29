<?php
function hitungNA($uts, $uas) {
    return ($uts * 0.4) + ($uas * 0.6);
}

function getGrade($na) {
    if ($na >= 85) return "A";
    elseif ($na >= 70) return "B";
    elseif ($na >= 60) return "C";
    elseif ($na >= 50) return "D";
    else return "E";
}

$mahasiswa = [
    ["nama"=>"Elsa","nim"=>"001","uts"=>80,"uas"=>90],
    ["nama"=>"Iky","nim"=>"002","uts"=>60,"uas"=>70],
    ["nama"=>"Alya","nim"=>"003","uts"=>50,"uas"=>55],
    ["nama"=>"Veby","nim"=>"004","uts"=>95,"uas"=>90],
    ["nama"=>"Iput","nim"=>"005","uts"=>40,"uas"=>50],
];

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nilai Mahasiswa</title>
    <link rel="stylesheet" href="nilai.css">
</head>
<body>

<div class="container">
    <h1>📊 Dashboard Nilai Mahasiswa</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>

        <?php foreach ($mahasiswa as $m): 
            $na = hitungNA($m['uts'], $m['uas']);
            $grade = getGrade($na);
            $total += $na;
            $class = ($na < 60) ? "low" : "";
        ?>
        <tr class="<?= $class ?>">
            <td><?= $m['nama'] ?></td>
            <td><?= $m['nim'] ?></td>
            <td><?= $m['uts'] ?></td>
            <td><?= $m['uas'] ?></td>
            <td><?= number_format($na,2) ?></td>
            <td class="grade"><?= $grade ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="footer">
        Rata-rata kelas: 
        <span><?= number_format($total / count($mahasiswa),2) ?></span>
    </div>
</div>

</body>
</html>