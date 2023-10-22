<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->get('name')): ?>
    
        <div class="alert alert-success"><?= session()->get('name') ?></div>

<?php endif; ?>

<div>Home</div>

<?php foreach($books as $row): ?>
    <div>
        <h3><?= $row['title'] ?></h3>
        <p><?= $row['synopsis'] ?></p>
        <p><?= $row['author'] ?></p>
        <p><?= $row['publisher'] ?></p>
        <p><?= $row['price'] ?></p>
        <p><?= $row['created_at'] ?></p>
        <p>
            <a href="/<?= $row['slug']; ?>">
                <img src="img/books/<?= $row['book_img']; ?>" alt="<?= $row['book_img']; ?>" width="150px">
            </a>
        </p>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>