<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap');
  </style>
</head>

<body style="font-family: 'Inter', sans-serif;">
  <?php
  if ((url_is('/login') || url_is('/register'))) {
  } else {
    if (session()->get('is_admin') == '1') {
      echo ($this->include('layout/navbar_admin'));
    } else {
      echo ($this->include('layout/navbar'));
    }
  } ?>
  <?= $this->renderSection('content'); ?>

  <div id="toast" class="toast display-none text-center text-white">
  </div>
</body>

<!-- Toast script -->
<script>
  const toast = document.querySelector('#toast');
  const flashData = {
    success: '<?= session()->getFlashdata('success') ?>',
    errors: '<?= session()->getFlashdata('errors') ?>',
    error: '<?= session()->getFlashdata('error') ?>',
    message: '<?= session()->getFlashdata('message') ?>'
  };

  const showToast = (message, className) => {
    toast.classList.add('display-block', className);
    toast.innerHTML = message;
    setTimeout(() => {
      toast.classList.remove('display-block', className);
      toast.innerHTML = '';
    }, 5000);
  };

  if (flashData.success) {
    showToast(flashData.success, 'bg-green');
  } else if (flashData.errors) {
    showToast(flashData.errors, 'bg-red');
  } else if (flashData.error) {
    showToast(flashData.error, 'bg-red');
  } else if (flashData.message) {
    showToast(flashData.message, 'bg-yellow');
  }
</script>



</html>