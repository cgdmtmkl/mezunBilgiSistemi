<?php
include("baglanti.php");

session_start();

$ad = ""; // Varsayılan değer veya boş bir değer
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
    // Form verilerini al
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $mTarih = $_POST["mTarih"];
    $cepTel = $_POST["cepTel"];
    $eposta = $_POST["email"];
    $evTel = $_POST["evTel"];
    $evUlke = $_POST["evUlke"];
    $evSehir = $_POST["evSehir"];
    $evAdres = $_POST["evAdres"];
    $not = $_POST["not"];

    // Veritabanına ekle
    $sql = "INSERT INTO kayit (ad, soyad, mezuniyetTarihi, cepTel, eposta, evTel, evUlke, evSehir, evAdres, not)
            VALUES ('$ad', '$soyad', '$mTarih', '$cepTel', '$eposta', '$evTel', '$evUlke', '$evSehir', '$evAdres', '$not')";
    
    if (mysqli_query($baglanti, $sql)) {
        echo "Kayıt başarıyla eklendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($baglanti);
    }
}

include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ekle</title>
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
    <form>
        <label for="name">Ad:</label>
        <input type="text" id="name" name="name" value="<?php echo $ad;?>"><br><br>
        <label for="surname">Soyad:</label>
        <input type="text" id="surname" name="surname" value="<?php echo $soyad;?>"><br><br>
        <label for="mezuniyetTarihi">Mezuniyet Tarihi:</label>
        <input type="date" id="mezuniyetTarihi" name="mTarih" value="<?php echo $mTarih;?>"><br><br>
        <label for="cepTel">Cep Telefonu:</label>
        <input type="text" id="cepTel" name="cepTel" value="<?php echo $cepTel;?>"><br><br>
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" value="<?php echo $e_posta;?>"><br><br>
        <label for="evTel">Ev Telefonu:</label>
        <input type="text" id="evTel" name="evTel" value="<?php echo $evTel;?>"><br><br>
        <label for="evUlke">Ev Ülke:</label>
        <input type="text" id="evUlke" name="evUlke" value="<?php echo $evUlke;?>"><br><br>
        <label for="evSehir">Ev Şehir:</label>
        <input type="text" id="evSehir" name="evSehir" value="<?php echo $evSehir;?>"><br><br>
        <label for="evAdres">Ev Adres:</label>
        <input type="textarea" id="evAdres" name="evAdres" value="<?php echo $evAdres;?>"><br><br>
        <label for="not">Not:</label>
        <input type="textarea" id="not" name="not" value="<?php echo $not;?>"><br><br>
    </form>
</div>

<div id="Tab2" class="tabcontent">
    <h3>Eğitim Bilgileri</h3>
    <?php
    $sql = "SELECT * FROM egitim_bilgileri";
    $result = mysqli_query($baglanti, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Akademik Eğitim</th><th>Başlangıç</th><th>Bitiş</th><th>Ülke</th><th>Şehir</th><th>Üniversite</th></tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["ad"]."</td>";
            echo "<td>".$row["soyad"]."</td>";
            echo "<td>".$row["akademikEgitim"]."</td>";
            echo "<td>".$row["baslangic"]."</td>";
            echo "<td>".$row["bitis"]."</td>";
            echo "<td>".$row["ulke"]."</td>";
            echo "<td>".$row["sehir"]."</td>";
            echo "<td>".$row["universite"]."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Eğitim bilgisi bulunamadı.";
    }
    ?>
</div>

<div id="Tab3" class="tabcontent">
    <h3>İş Bilgileri</h3>
    <?php
    $sql = "SELECT * FROM is_bilgileri";
    $result = mysqli_query($baglanti, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>İşe Giriş Tarihi</th><th>İşten Ayrılış Tarihi</th><th>Kamu/Özel</th><th>Pozisyon</th><th>Sektör</th><th>Unvan</th></tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["iseGirisTarihi"]."</td>";
            echo "<td>".$row["istenAyrilisTarihi"]."</td>";
            echo "<td>".$row["kamu/ozel"]."</td>"; 
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
<?php include("footer.php");?>


</body>
</html>
