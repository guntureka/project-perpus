<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->get('name')): ?>
    
        <div class="alert alert-success"><?= session()->get('name') ?></div>

<?php endif; ?>

<div>book detail</div>

    <div>
        <h3><?= $books['title'] ?></h3>
        <p><?= $books['synopsis'] ?></p>
        <p><?= $books['author'] ?></p>
        <p><?= $books['publisher'] ?></p>
        <p><?= $books['price'] ?></p>
        <p><?= $books['created_at'] ?></p>
        <p>
            <img src="img/books/<?= $books['book_img']; ?>" alt="<?= $books['book_img']; ?>">
        </p>
    </div>

<?= $this->endSection(); ?>