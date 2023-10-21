<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('error')): ?>

    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>

<?php endif; ?>

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