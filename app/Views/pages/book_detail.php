<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->get('name')): ?>
    
        <div class="alert alert-success"><?= session()->get('name') ?></div>

<?php endif; ?>

<div>book detail</div>

    <?php if($book): ?>
    <div>
        <h3><?= $book['title'] ?></h3>
        <p><?= $book['synopsis'] ?></p>
        <p><?= $book['author'] ?></p>
        <p><?= $book['publisher'] ?></p>
        <p><?= $book['price'] ?></p>
        <p>
            <img src="img/books/<?= $book['book_img']; ?>" alt="<?= $book['book_img']; ?>" width="150px">
        </p>
    </div>

    <?php endif ?>

<?= $this->endSection(); ?>