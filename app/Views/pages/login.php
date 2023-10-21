<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/login" method="post">
    <label for="username">
        <input type="text" name="username" id="username" placeholder="Username">
    </label>
    <label for="password">
        <input type="password" name="password" id="password" placeholder="Password">
    </label>
    <button type="submit">Submit</button>
</form>

<?= $this->endSection(); ?>