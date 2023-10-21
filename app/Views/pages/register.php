<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>Register</div>
<?php $validation = \Config\Services::validation(); ?>
<form action="/register" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <?php if($validation->getError('name')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('name'); ?>
            </div>
        <?php }?>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <?php if($validation->getError('email')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('email'); ?>
            </div>
        <?php }?>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php if($validation->getError('password')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('password'); ?>
            </div>
        <?php }?>
    </div>
    <div>
        <label for="password_confirm">Password Confirm</label>
        <input type="password" name="password_confirm" id="password_confirm">
        <?php if($validation->getError('password_confirm')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('password_confirm'); ?>
            </div>
        <?php }?>
    </div>
    <div>
        <label for="user_img">Photo</label>
        <input type="file" name="user_img" id="user_img">
        <?php if($validation->getError('user_img')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('user_img'); ?>
            </div>
        <?php }?>
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>

<?= $this->endSection(); ?>