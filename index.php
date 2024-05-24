<?php
include("baglanti.php");

session_start();

include("navbar.php");
?>

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
    

    <section class="sectionIndex">
        <div class="container">
            <div class="w-100">
                <span class="d-block text-center text-warning font-monospace fs-1">Mezun Bilgi Sistemi</span>
                <span class="d-block text-center text-light font-monospace mb-3">ÇGH Üniversitesi Bilgisayar Programcılığı Bölümü Mezun Bilgi Sistemine Hoşgeldiniz.</span>
            </div>
            <div class="w-100">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="../BitirmeProjesi/111.jpg" class="web img-thumbnail">
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="../BitirmeProjesi/kitap.jpg" class="web img-thumbnail">
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <img src="../BitirmeProjesi/kitap2.jpg" class="web img-thumbnail">
                    </div>
                </div>
            </div><br>
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-2">
                        <img src="../BitirmeProjesi/1.jpg" class="img-thumbnail">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="font-monospace"></h5>
                            <p>ÇGH Üniversitesi mezun bilgi sistemine hoşgeldiniz. Öğrencilerimiz için yaptığımız gibi mezunlarımız için de elimizden gelen her şeyi yapmaya gayret ediyoruz.
                                Sizlerin de yardımıyla gelişeceğimiz ve geliştireceğimiz yarınlara...
                            </p>
                                
                            
                        </div>
                    </div>
                    
                   
                </div>
            </div>
           
           
        </div>
    </section>
    

<?php include("footer.php");?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>



</body>
</html>