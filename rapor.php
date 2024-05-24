<?php
    
    include("baglanti.php");
    session_start();
    include("navbar.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor Alma Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="sectionRapor">
        <div>
            <h3>Eğitim Bilgileri Raporlar</h3><br>
            <ul class="nav-item">
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Doktora Yapan Öğrencileri Listele</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Türkiye'de Doktora Yapan Öğrencileri Listele</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Yurtdışında Doktora Yapan Öğrencileri Listele</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Yüksek Lisans Yapan Öğrencileri Listele</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Türkiye'de Yüksek Lisans Yapan Öğrencileri Listele</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-1">Yurtdışında Yüksek Lisans Yapan Öğrencileri Listele</a><br>
                </li>
            </ul><br>
        </div>
        <div>
            <h3>İş Bilgileri Raporlar</h3><br>
            <ul class="nav-item">
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-2">Mezuniyetinin Ardından 3-5 Yıl Arası İşe Girenler</a><br>
                </li>
                <li class="raporLi">
                    <a href="#" class="btn btn-outline-warning text-emphasis btn ms-2">Mezuniyetinin Ardından 10 Yıl İçinde Yönetici Konumuna Gelenler</a><br>
                </li>
            </ul>
        </div>
    </section>



<?php include "footer.php";?>

</body>
</html>