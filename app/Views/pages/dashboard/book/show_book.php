<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->get('name')): ?>
    
        <div class="alert alert-success"><?= session()->get('name') ?></div>

<?php endif; ?>

<div>Book</div>
<a href="/book/add">
    <button>
        <h3>Add Book</h3>
    </button>
</a>
<table>
    <thead>
            <th>No</th>
            <th>Title</th>
            <th>Synopsis</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Book Image</th>
            <th>Action</th>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($books as $row): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['synopsis'] ?></td>
                <td><?= $row['author'] ?></td>
                <td><?= $row['publisher'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['quantity_available'] ?></td>
                <td>
                    <img src="/img/books/<?= $row['book_img']; ?>" alt="<?= $row['book_img']; ?>" width="150px">
                </td>
                <td>
                    <a href="/book/edit/<?= $row['slug'] ?>">
                        <button>
                            edit
                        </button>
                    </a>
                    <a href="/book/delete/<?= $row['slug'] ?>">
                        <button>
                            delete
                        </button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>