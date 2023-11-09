<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full justify-center p-8">
    <div class="w-50 p-4 bg-secondary-1 rounded-4">
        <h2 class="font-bold text-center text-primary-1 text-4xl mb-5">Input New Book</h2>
        <form action="/book/add" method="post" enctype="multipart/form-data" id="register-form" class="p-8">
            <div class="flex flex-column gap-3">
                <div class="flex flex-column gap-1">
                    <label for="title" class="text-primary-1 text-2xl">Title</label>
                    <input type="text" name="title" id="title" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan judul buku..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="synopsis" class="text-primary-1 text-2xl">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan sinopsis buku..." required></textarea>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="author" class="text-primary-1 text-2xl">Author</label>
                    <input type="text" name="author" id="author" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan nama pengarang..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="publisher" class="text-primary-1 text-2xl">Publisher</label>
                    <input type="text" name="publisher" id="publisher" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan nama penerbit..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="published_year" class="text-primary-1 text-2xl">Published Year</label>
                    <input type="number" name="published_year" id="published_year" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan tahun terbit..." required min="0">
                </div>
                <div class="flex flex-column gap-1">
                    <label for="genre" class="text-primary-1 text-2xl">Genre</label>
                    <input type="text" name="genre" id="genre" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan genre buku..." required>
                </div>
                <div class="flex flex-column gap-1 mb-1">
                    <label for="book_img" class="text-primary-1 text-2xl">Profile Picture</label>
                    <div class="flex flex-column gap-2">
                        <input type="file" name="book_img" id="book_img" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1 w-full h-fit" required>
                        <div class="book-img-container rounded-3 overflow-hidden" style="height: 192px; width: 108px;">
                            <img src="/img/dummy-profile-img.jpeg" alt="register" class="gambar w-full h-full object-cover" id="book-img-container">
                        </div>
                    </div>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="price" class="text-primary-1 text-2xl">Price</label>
                    <input type="number" name="price" id="price" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan harga buku..." required min="0">
                </div>
                <div class="flex flex-column gap-1">
                    <label for="quantity_available" class="text-primary-1 text-2xl">Quantity</label>
                    <input type="number" name="quantity_available" id="quantity_available" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan jumlah buku..." required min="0">
                </div>
                <button type="submit" id="register-button" class="mt-4 bg-tertiary-1 py-2 px-4 rounded-4 text-white text-2xl flex justify-center font-bold">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    const bookImg = document.querySelector('#book_img');
    const bookImgContainer = document.querySelector('.book-img-container');
    bookImg.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                bookImgContainer.querySelector('img').src = this.result;
            });
            reader.readAsDataURL(file);
        } else {
            bookImgContainer.querySelector('img').src = '/img/dummy-profile-img.jpeg';
        }
    });
</script>

<?= $this->endSection(); ?>