<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>Register</div>
<form action="/register" method="post">
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
        <button type="submit">Register</button>
    </div>
</form>

<?= $this->endSection(); ?>