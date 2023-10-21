<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <a href="/dashboard">
        <button>
            <h3>Back</h3>
        </button>
    </a>
</div>

<div>
    <h1>edit Book</h1>
    <form action="/book/edit/<?= $book['book_id']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $book['title']; ?>">
           
        </div>
        <div>
            <label for="synopsis">Synopsis</label>
            <input type="text" name="synopsis" id="synopsis"  value="<?= $book['synopsis']; ?>">
            
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?= $book['author']; ?>">
           
        </div>
        <div>
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" id="publisher" value="<?= $book['publisher']; ?>">
            
        </div>
        <div>
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" id="published_year" value="<?= $book['published_year']; ?>">
            
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= $book['genre']; ?>">
            
        </div>
        <div>
            <label for="book_img">Photo</label>
            <input type="file" name="book_img" id="book_img" value="<?= $book['book_img']; ?>">
            
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="<?= $book['price']; ?>">
           
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<?= $this->endSection(); ?>