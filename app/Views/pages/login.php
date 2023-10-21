<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/login" method="post">
    <label for="email">
        <input type="text" name="email" id="email" placeholder="Email">
    </label>
    <label for="password">
        <input type="password" name="password" id="password" placeholder="Password">
    </label>
    <button type="submit">Submit</button>
</form>

<?= $this->endSection(); ?>