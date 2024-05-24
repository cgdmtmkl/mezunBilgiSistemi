<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Anasayfa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


</head>
<body>
    <div class="navbar">
        <nav class="navbar navbar-warning bg-warning w-100 navbar-expand-sm" style="margin-top: -8px;">
            <div class="container">
                <ul class="navbar-nav">
                    <div class="btn-group ms-1 d-flex align-items-center">
                    <?php 
                    if(!isset($_SESSION['username'])) { // Oturum yoksa
                    echo '
                    <li class="nav-item"><a href="index.php" ><img src="cghlogo.png" alt="cghlogo" class="logo"></a></li>
                    ';
                    } else { // Oturum varsa
                    echo '
                    <li class="nav-item"><a href="index.php" ><img src="cghlogo.png" alt="cghlogo" class="logo"></a></li>
                    <li class="nav-item"><a href="rapor.php" class="btn btn-outline-light btn ms-1">Rapor Alma Sayfası</a></li>
                    <li class="nav-item"><a href="kayitEkle.php" class="btn btn-outline-light btn ms-1">Kayıt Ekle</a></li>
                    ';
                    }
                    ?>
                    </div>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="input-group">
                            <input type="text" placeholder="Arama" class="form-control form-control-sm">
                            <a href="kelime.php" class="btn btn-outline-light btn-sm">Ara</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group ms-1">
                            <?php
                        if(empty($_SESSION)){
                             echo'
                            <a href="giris.php" class="btn btn-outline-light btn-sm ms-1">Giriş Yap</a>
                            ';
                            echo'
                            <a href="kayitOl.php" class="btn btn-outline-light btn-sm ms-1">Kayıt Ol</a>
                            ';
                        }
                           else{
                            echo'
                            <span>'.$_SESSION['username'].'</span>
                            <a href="cikis.php" class="btn btn-outline-light btn-sm ms-1">Çıkış Yap</a>
                            ';}
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>



</body>
</html>