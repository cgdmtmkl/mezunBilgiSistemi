<?php
include("baglanti.php");
include("navbar.php");

function show_password_reset_form($username, $user_type) {
    echo '
    <div class="container w-25 mx-auto">
        <form class="kayitolForm" method="POST" action="kayitOl.php">
            <div class="w-100 mb-3 bg-warning text-light rounded-2 p-2 text-center">
                <span>Şifrenizi Yenileyin.</span>
            </div>
            <div class="w-100 mb-3">
                <label class="form-label">Yeni Parola</label>
                <input type="password" name="new_password" class="form-control border border-info" placeholder="Yeni Parola Girin" required>
            </div>
            <input type="hidden" name="username" value="' . htmlspecialchars($username) . '">
            <input type="hidden" name="user_type" value="' . htmlspecialchars($user_type) . '">
            <div class="w-25 kayitol">
                <button class="btn btn-outline-warning text-light" name="reset_password">Şifreyi Yenile</button>
            </div>
        </form>
    </div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reset_password'])) {
        // Şifre yenileme formundan gelen POST
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];
        $user_type = $_POST['user_type'];

        // Şifreyi hashle
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Kullanıcının şifresini veritabanında güncelle
        $update_stmt = $baglanti->prepare("UPDATE users SET password = ? WHERE username = ? AND user_type = ?");
        if ($update_stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($baglanti->error));
        }

        $update_stmt->bind_param("sss", $hashed_password, $username, $user_type);

        if ($update_stmt->execute() === true) {
            echo "Şifreniz başarıyla güncellendi! Giriş yapabilirsiniz.";
        } else {
            echo "Şifre güncelleme sırasında bir hata oluştu: " . htmlspecialchars($update_stmt->error);
        }

        $update_stmt->close();
    } else {
        // Kayıt olma formundan gelen POST
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        // Kullanıcı adının zaten var olup olmadığını kontrol et
        $stmt = $baglanti->prepare("SELECT user_id FROM users WHERE username = ? AND user_type = ?");
        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($baglanti->error));
        }

        $stmt->bind_param("ss", $username, $user_type);

        if ($stmt->execute() === false) {
            die('execute() failed: ' . htmlspecialchars($stmt->error));
        }

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Kullanıcı adı zaten var, şifre belirleme formunu göster
            echo "Bu kullanıcı adı zaten alınmış. Lütfen yeni bir şifre belirleyin.";
            show_password_reset_form($username, $user_type);
        } else {
            // Şifreyi hashle
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Yeni kullanıcıyı veritabanına ekle
            $insert_stmt = $baglanti->prepare("INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)");
            if ($insert_stmt === false) {
                die('prepare() failed: ' . htmlspecialchars($baglanti->error));
            }

            $insert_stmt->bind_param("sss", $username, $hashed_password, $user_type);

            if ($insert_stmt->execute() === true) {
                echo "Kayıt başarılı! Giriş yapabilirsiniz.";
            } else {
                echo "Kayıt sırasında bir hata oluştu: " . htmlspecialchars($insert_stmt->error);
            }

            $insert_stmt->close();
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .kayitOlSection{
            background-image: url(arkaplan.jpg);
            width: 100%;
            height: 575px;
            background-size: cover;
            background-position: center center;
            margin-top: -8px;
        }
        .kayitolForm{
            position: relative;
            top: 135px;
        }
        .kayitol{
            margin: auto;
        }
    </style>
</head>
<body>
    <section class="kayitOlSection">
        <div class="container w-25 mx-auto">
            <form class="kayitolForm" method="POST" action="kayitOl.php">
                <div class="w-100 mb-3 bg-warning text-light rounded-2 p-2 text-center">
                    <span>Mezun Bilgi Sistemine Kayıt Olun.</span>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" name="username" class="form-control border border-info" placeholder="Kullanıcı Adı Girin" required>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label">Kullanıcı Parola</label>
                    <input type="password" name="password" class="form-control border border-info" placeholder="Parola Girin" required>
                </div>
                <div class="w-100 mb-3">
                    <label for="user_type">Kullanıcı Türü:</label>
                    <select id="user_type" name="user_type" class="form-control border border-info">
                        <option value="student">Öğrenci</option>
                        <option value="academic">Akademisyen</option>
                    </select>
                </div>
                <div class="w-25 kayitol">
                    <button class="btn btn-outline-warning text-light" name="kayitol">Kayıt Ol</button>
                </div>
            </form>
        </div>
    </section>
    <?php include "footer.php"; ?>
</body>
</html>
