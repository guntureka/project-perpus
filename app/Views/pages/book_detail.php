<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-primary-1 flex justify-center">
    <div class="w-80 bg-secondary-1 mt-5 p-8 rounded-8">
        <h1 class="text-3xl font-bold text-primary-1"><i class="fa-solid fa-arrow-left"></i> Book Detail</h1>

        <div class="flex w-full gap-8 justify-between mt-4">
            <div>
                <div class="" style="width: 250px; height: 400px;">
                    <img src="/img/books/<?= $book['book_img']; ?>" alt="<?= $book['book_img']; ?>" class="w-full h-full rounded-8 object-cover">
                </div>
                <p class="text-center text-lg text-primary-1 mt-4">
                    <?php if ($book['quantity_available'] == 0) : ?>
                        <span class="text-red">Out of stock</span>
                    <?php else : ?>
                        <span class="text-green">Quantity: <?= $book['quantity_available']; ?></span>
                    <?php endif ?>
                </p>
            </div>

            <div class="w-full flex flex-column justify-between">
                <div class="flex flex-column gap-4">
                    <h1 class="text-2xl font-bold text-primary-1"><?= $book['title']; ?> (<?= $book['published_year']; ?>)</h1>
                    <p class="text-lg text-primary-1 ">Author: <?= $book['author']; ?></p>
                    <p class="text-lg text-primary-1 ">Publisher: <?= $book['publisher']; ?></p>
                    <p class="text-lg text-primary-1 ">Genre: <?= $book['genre']; ?></p>
                    <p class="text-lg text-primary-1 ">Synopsis: <?= $book['synopsis']; ?></p>
                    <a href="/<?= $book['slug']; ?>/loan" class="bg-primary-1 text-secondary-1 px-4 py-2 rounded-8 w-full text-center">Loan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/348e129488.js" crossorigin="anonymous"></script>
</div>

<?php if ($book) : ?>
    <div>
        <h3><?= $book['title'] ?></h3>
        <p><?= $book['synopsis'] ?></p>
        <p><?= $book['author'] ?></p>
        <p><?= $book['publisher'] ?></p>
        <p><?= $book['price'] ?></p>
        <p><?= $book['quantity_available'] ?></p>
        <p>
            <img src="/img/books/<?= $book['book_img']; ?>" alt="<?= $book['book_img']; ?>" width="150px">
        </p>
    </div>
    <?php
    $book_id = $book['book_id'];
    $book_title = $book['title'];
    $book_author = $book['author'];
    $book_publisher = $book['publisher'];
    $book_price = $book['price'];
    $book_quantity_available = $book['quantity_available'];
    $book_img = '/img/books/' . $book['book_img'];
    $user_id = session()->get('user_id');
    $user = session()->get('name');
    $email = session()->get('email');
    $loan_date = date('Y-m-d');
    $loan_return = date('Y-m-d', strtotime('+7 days'));
    $fine = $book_price * 0.2;
    ?>

    <div>
        <!-- <div>
            <h3>judul : <?= $book['title'] ?></h3>
            <p>author : <?= $book['author']; ?></p>
            <p>user : <?= $user; ?></p>
            <p>email : <?= $email; ?></p>
            <p>tanggal pengembalian : <?= $loan_date; ?></p>
            <p>tanggal pengembalian : <?= $loan_return; ?></p>
            <p>harga : <?= $book_price; ?></p>
            <p>denda telat : <?= $fine; ?></p>
        </div> -->

        <form action="/<?= $book['slug']; ?>/loan" method="post" style="width: 150px;">
            <label for="book_id">
                Book id
                <input type="text" name="book_id" id="book_id" value="<?= $book_id; ?>" disabled>
            </label>
            <label for="book_title">
                Book title
                <input type="text" name="book_title" id="book_title" value="<?= $book_title; ?>" disabled>
            </label>
            <label for="book_author">
                Book author
                <input type="text" name="book_author" id="book_author" value="<?= $book_author; ?>" disabled>
            </label>
            <label for="user_id">
                User id
                <input type="text" name="user_id" id="user_id" value="<?= $user_id; ?>" disabled>
            </label>
            <label for="user">
                User
                <input type="text" name="user" id="user" value="<?= $user; ?>" disabled>
            </label>
            <label for="email">
                Email
                <input type="text" name="email" id="email" value="<?= $email; ?>" disabled>
            </label>
            <label for="loan_date">
                Loan date
                <input type="text" name="loan_date" id="loan_date" value="<?= $loan_date; ?>" disabled>
            </label>
            <label for="return_date">
                Loan return
                <input type="text" name="return_date" id="return_date" value="<?= $loan_return; ?>" disabled>
            </label>
            <label for="book_price">
                Book price
                <input type="text" name="book_price" id="book_price" value="<?= $book_price; ?>" disabled>
            </label>
            <input type="hidden" name='slug' id="slug" value="<?= $book['slug']; ?>">
            <button type="submit" <?php if ($book_quantity_available == 0) : ?> disabled <?php endif ?>>Submit</button>
        </form>
    </div>

<?php endif ?>

<?= $this->endSection(); ?>