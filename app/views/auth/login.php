<?php

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prass Stodudu</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

    <!-- Short Icon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/image/favicon.ico">
</head>

<body>
    <section class="login-section">
        <div class="login-card">
            <div class="login-logo">
                <div class="logos">
                    <!-- <img src="<?= BASE_URL ?>assets/image/Prass Stodudu/Prass Stodudu Logo.png" alt="Prass Stodudu Logo"> -->
                    <h2> Prass Stodudu </h2>
                </div>
                <div class="text">
                    Your Stock and Inventory Database
                </div>
            </div>
            <form class="login-content" method="POST" action="auth.php">
                <div class="head-login"> Masukkan Akun</div>
                <div class="input-login justify-content-between align-item-center">
                    <ion-icon name="storefront"></ion-icon>
                    <input type="text" name="store" id="store" placeholder="Kode Toko">
                </div>
                <div class="input-login justify-content-between align-item-center">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" name="username" id="username" placeholder="Nama Pengguna">
                </div>
                <div class="input-login justify-content-between align-item-center">
                    <ion-icon name="lock-closed"></ion-icon>
                    <input type="password" name="password" id="password" placeholder="Kata Sandi">
                </div>
                <div class="input-btn justify-content-between align-item-center">
                    <button type="submit" class="btn-login"> Masuk </button>
                    <div class="forget-pass"> Lupa Kata Sandi? </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Ion Icons Module -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>