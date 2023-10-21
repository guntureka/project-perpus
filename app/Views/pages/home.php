<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('success')): ?>
    
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>

<?php endif; ?>

<div>Home</div>

<?= $this->endSection(); ?>