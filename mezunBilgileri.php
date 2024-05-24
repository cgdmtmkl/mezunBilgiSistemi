<?php
include 'navbar.php';
// Veritabanı bağlantısını yapalım
include 'baglanti.php';
session_start();

// Veritabanından verileri sorgulayalım
$sql = "SELECT * FROM kayit_ekle";
$result = mysqli_query($baglanti, $sql);

// Eğer sorgu başarılıysa ve en az bir sonuç varsa tabloyu oluşturalım
if ($result && mysqli_num_rows($result) > 0) {
    echo '<!DOCTYPE html>';
    echo '<html lang="tr">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Kullanıcılar Tablosu</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
    echo '<style>
        body{
            background-image: url(arkaplan.jpg);
        }
        h3{
            color: #86E5FF;
            text-align: center;
        }
        .tab {
            margin-top: 10px;
            margin-bottom: 10px;
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #ffc107;
        }

        .tab button {
            color: white;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-image: url(arkaplan.jpg);
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #8DCBE6;
        }
    </style>';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
    echo '<h2>Mezun Tablosu</h2>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Öğrenci No</th>';
    echo '<th>Ad</th>';
    echo '<th>Soyad</th>';
    echo '<th>Mezuniyet Tarihi</th>';
    echo '<th>Cep Telefonu</th>';
    echo '<th>E-posta</th>';
    echo '<th>Ev Telefonu</th>';
    echo '<th>Ev Ülke</th>';
    echo '<th>Ev Şehir</th>';
    echo '<th>Ev Adres</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Her bir satırı döngüyle alıp tabloya ekleyelim
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['ogrenciNo'] . '</td>';
        echo '<td>' . $row['ad'] . '</td>';
        echo '<td>' . $row['soyad'] . '</td>';
        echo '<td>' . $row['mezuniyetTarihi'] . '</td>';
        echo '<td>' . $row['cepTel'] . '</td>';
        echo '<td>' . $row['eposta'] . '</td>';
        echo '<td>' . $row['evTel'] . '</td>';
        echo '<td>' . $row['evUlke'] . '</td>';
        echo '<td>' . $row['evSehir'] . '</td>';
        echo '<td>' . $row['evAdres'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
} else {
    // Sonuç yoksa hata mesajı gösterelim
    echo "Kayıt bulunamadı.";
}

// Veritabanı bağlantısını kapatalım
mysqli_close($baglanti);

include 'footer.php';
?>
