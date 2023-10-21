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

    <div id="toast" class="toast display-none text-center text-white">
    </div>
</body>

<!-- Toast script -->
<script>
    const toast = document.querySelector('#toast');
    // Check if success data exists and assign it to a JavaScript variable
    const successData = '<?= session()->getFlashdata('success') ?>';
    const errorsData = '<?= session()->getFlashdata('errors') ?>';

    if (successData) {
        toast.classList.add('display-block');
        toast.classList.add('bg-green');
        toast.innerHTML = successData;
        setTimeout(() => {
            toast.classList.remove('display-block');
            toast.classList.remove('bg-green');
            toast.innerHTML = '';
        }, 5000);
    } else if (errorsData) {
        toast.classList.add('display-block');
        toast.classList.add('bg-red');
        toast.innerHTML = errorsData;
        setTimeout(() => {
            toast.classList.remove('display-block');
            toast.classList.remove('bg-red');
            toast.innerHTML = '';
        }, 5000);
    }
</script>


</html>