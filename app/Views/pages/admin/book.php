<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Input Book</h1>
    <form action="/admin/book" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
           
        </div>
        <div>
            <label for="synopsis">Synopsis</label>
            <input type="text" name="synopsis" id="synopsis">
            
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author">
           
        </div>
        <div>
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" id="publisher">
            
        </div>
        <div>
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" id="published_year">
            
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre">
            
        </div>
        <div>
            <label for="book_img">Photo</label>
            <input type="file" name="book_img" id="book_img">
            
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price">
           
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<?php foreach($books as $row): ?>
    <div>
        <h3><?= $row['title'] ?></h3>
        <p><?= $row['synopsis'] ?></p>
        <p><?= $row['author'] ?></p>
        <p><?= $row['publisher'] ?></p>
        <p><?= $row['price'] ?></p>
        <p><?= $row['created_at'] ?></p>
        <p>
            <img src="/img/books/$row['book_img']; ?>" alt="<?= $row['book_img']; ?>">
        </p>
        <p>
            <button onclick="">
                Delete
            </button>
        </p>
    </div>
<?php endforeach; ?>


<?= $this->endSection(); ?>