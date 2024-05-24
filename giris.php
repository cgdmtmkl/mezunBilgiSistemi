<?php
include("baglanti.php");
include("navbar.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Kullanıcıyı veritabanında ara
    $stmt = $baglanti->prepare("SELECT user_id, password FROM users WHERE username = ? AND user_type = ?");
    if ($stmt === false) {
        die('prepare() failed: ' . htmlspecialchars($baglanti->error));
    }

    $stmt->bind_param("ss", $username, $user_type);

    if ($stmt->execute() === false) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Şifreyi doğrula
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $user_type;

            // Kullanıcıyı doğruladıktan sonra kullanıcıyı yönlendir
            if ($user_type == 'student') {
                header("Location: student_dashboard.php");
            } else if ($user_type == 'academic') {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Yanlış şifre.";
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <section class="girisYapSection">
        <div class="container w-25 mx-auto">
            <form class="girisyapForm" method="POST" action="giris.php">
                <div class="w-100 mb-3 bg-warning text-light rounded-2 p-2 text-center">
                    <span>Mezun Bilgi Sistemine Hoşgeldiniz.</span>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label text-light">Kullanıcı Adı</label>
                    <input type="text" name="username" class="form-control border border-info" placeholder="Kullanıcı Adı Girin" required>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label text-light">Kullanıcı Parola</label>
                    <input type="password" name="password" class="form-control border border-info" placeholder="Parola Girin" required>
                </div>
                <div class="w-100 mb-3">
                    <label for="user_type">Kullanıcı Türü:</label>
                    <select id="user_type" name="user_type" class="form-control border border-info">
                        <option value="student">Öğrenci</option>
                        <option value="academic">Akademisyen</option>
                    </select>
                </div>
                <div class="w-25 girisyap">
                    <button class="btn btn-outline-warning text-light" name="giris">Giriş</button>
                </div>
            </form>
        </div>
    </section>
    <?php include "footer.php"; ?>
</body>
</html>