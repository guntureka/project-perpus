<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>Register</div>
<?php $validation = \Config\Services::validation(); ?>
<form action="/register" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password_confirm">Password Confirm</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>
    <div>
        <label for="user_img">Photo</label>
        <input type="file" name="user_img" id="user_img">
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>

<?= $this->endSection(); ?>