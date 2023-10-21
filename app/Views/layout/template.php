<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap');
    </style>
</head>

<body style="font-family: 'Inter', sans-serif;">
    <?php if (url_is('/login') || url_is('/register') || url_is('/')) {
    } else {
        $this->include('layout/header');
    } ?>
    <?= $this->renderSection('content'); ?>
</body>

</html>