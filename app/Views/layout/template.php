<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    
    <!-- My Css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <?= $this->include("layout/navbar"); ?>
    <?= $this->renderSection("content"); ?>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/script.js"></script>
</body>
</html>