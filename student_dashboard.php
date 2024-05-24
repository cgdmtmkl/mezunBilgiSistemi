<?php
include("baglanti.php");
session_start();
include("navbar.php");

// Kullanıcının giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'student') {
    header("Location: giris.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$ad = "";
$soyad = "";
$mTarih = "";
$cepTel = "";
$e_posta = "";
$evTel = "";
$evUlke = "";
$evSehir = "";
$evAdres = "";
$not = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = isset($_POST["ad"]) ? $_POST["ad"] : "";
    $soyad = isset($_POST["soyad"]) ? $_POST["soyad"] : "";
    $mTarih = isset($_POST["mTarih"]) ? $_POST["mTarih"] : "";
    $cepTel = isset($_POST["cepTel"]) ? $_POST["cepTel"] : "";
    $e_posta = isset($_POST["email"]) ? $_POST["email"] : "";
    $evTel = isset($_POST["evTel"]) ? $_POST["evTel"] : "";
    $evUlke = isset($_POST["evUlke"]) ? $_POST["evUlke"] : "";
    $evSehir = isset($_POST["evSehir"]) ? $_POST["evSehir"] : "";
    $evAdres = isset($_POST["evAdres"]) ? $_POST["evAdres"] : "";
    $not = isset($_POST["not"]) ? $_POST["not"] : "";

    $sql = "INSERT INTO kayit_ekle (user_id, ad, soyad, mezuniyetTarihi, cepTel, eposta, evTel, evUlke, evSehir, evAdres, not)
            VALUES ('$user_id', '$ad', '$soyad', '$mTarih', '$cepTel', '$e_posta', '$evTel', '$evUlke', '$evSehir', '$evAdres', '$not')";
    
    if (mysqli_query($baglanti, $sql)) {
        echo "Kayıt başarıyla eklendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($baglanti);
    }
}

// Öğrencinin mevcut bilgilerini getirme
$sql = "SELECT * FROM kayit_ekle WHERE user_id = '$user_id'";
$result = mysqli_query($baglanti, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ad = isset($row["ad"]) ? $row["ad"] : "";
        $soyad = isset($row["soyad"]) ? $row["soyad"] : "";
        $mTarih = isset($row["mezuniyetTarihi"]) ? $row["mezuniyetTarihi"] : "";
        $cepTel = isset($row["cepTel"]) ? $row["cepTel"] : "";
        $e_posta = isset($row["eposta"]) ? $row["eposta"] : "";
        $evTel = isset($row["evTel"]) ? $row["evTel"] : "";
        $evUlke = isset($row["evUlke"]) ? $row["evUlke"] : "";
        $evSehir = isset($row["evSehir"]) ? $row["evSehir"] : "";
        $evAdres = isset($row["evAdres"]) ? $row["evAdres"] : "";
        $not = isset($row["not"]) ? $row["not"] : "";
    } else {
        echo "Kayıt bulunamadı.";
    }
} else {
    echo "Hata: " . mysqli_error($baglanti);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Sayfası</title>
    <style>
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
    </style>
</head>
<body>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Tab1')" id="defaultOpen">Genel Bilgiler</button>
        <button class="tablinks" onclick="openTab(event, 'Tab2')">Eğitim Bilgileri</button>
        <button class="tablinks" onclick="openTab(event, 'Tab3')">İş Bilgileri</button>
    </div>

    <div id="Tab1" class="tabcontent">
        <h3>Genel Bilgiler</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="ad">Ad:</label>
            <input type="text" id="ad" name="ad" value="<?php echo htmlspecialchars($ad); ?>"><br><br>
            <label for="soyad">Soyad:</label>
            <input type="text" id="soyad" name="soyad" value="<?php echo htmlspecialchars($soyad); ?>"><br><br>
            <label for="mezuniyetTarihi">Mezuniyet Tarihi:</label>
            <input type="date" id="mezuniyetTarihi" name="mTarih" value="<?php echo htmlspecialchars($mTarih); ?>"><br><br>
            <label for="cepTel">Cep Telefonu:</label>
            <input type="text" id="cepTel" name="cepTel" value="<?php echo htmlspecialchars($cepTel); ?>"><br><br>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($e_posta); ?>"><br><br>
            <label for="evTel">Ev Telefonu:</label>
            <input type="text" id="evTel" name="evTel" value="<?php echo htmlspecialchars($evTel); ?>"><br><br>
            <label for="evUlke">Ev Ülke:</label>
            <input type="text" id="evUlke" name="evUlke" value="<?php echo htmlspecialchars($evUlke); ?>"><br><br>
            <label for="evSehir">Ev Şehir:</label>
            <input type="text" id="evSehir" name="evSehir" value="<?php echo htmlspecialchars($evSehir); ?>"><br><br>
            <label for="evAdres">Ev Adres:</label>
            <input type="textarea" id="evAdres" name="evAdres" value="<?php echo htmlspecialchars($evAdres); ?>"><br><br>
            <label for="not">Not:</label>
            <input type="textarea" id="not" name="not" value="<?php echo htmlspecialchars($not); ?>"><br><br>
            <input type="submit" value="Güncelle">
        </form>
    </div>

    <div id="Tab2" class="tabcontent">
        <h3>Eğitim Bilgileri</h3>
        <?php
        $sql = "SELECT * FROM egitim_bilgileri WHERE user_id = '$user_id'";
        $result = mysqli_query($baglanti, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Akademik Eğitim</th><th>Başlangıç</th><th>Bitiş</th><th>Ülke</th><th>Şehir</th><th>Üniversite</th></tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["AkademikEgitim"]."</td>";
                echo "<td>".$row["Baslangic"]."</td>";
                echo "<td>".$row["Bitis"]."</td>";
                echo "<td>".$row["Ulke"]."</td>";
                echo "<td>".$row["Sehir"]."</td>";
                echo "<td>".$row["Universite"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Eğitim bilgileri bulunamadı.";
        }
        ?>
    </div>

    <div id="Tab3" class="tabcontent">
        <h3>İş Bilgileri</h3>
        <?php
        $sql = "SELECT * FROM is_bilgileri WHERE user_id = '$user_id'";
        $result = mysqli_query($baglanti, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>İşe Giriş Tarihi</th><th>İşten Ayrılış Tarihi</th><th>Kamu/Özel</th><th>Pozisyon</th><th>Sektör</th><th>Unvan</th></tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["iseGirisTarihi"]."</td>";
                echo "<td>".$row["istenAyrilisTarihi"]."</td>";
                echo "<td>".$row["kamu_ozel"]."</td>"; 
                echo "<td>".$row["pozisyon"]."</td>";
                echo "<td>".$row["sektor"]."</td>";
                echo "<td>".$row["unvan"]."</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "İş bilgisi bulunamadı.";
        }
        ?>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

<?php include "footer.php"; ?>

</body>
</html>
