<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
</head>
<body>
    Selamat Datang <?= $this->session->userdata('name') ?><br>
    <a href="<?= base_url('Login/logout') ?>"><button>Logout</button></a>
</body>
</html>