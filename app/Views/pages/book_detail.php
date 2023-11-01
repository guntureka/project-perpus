<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="bg-primary-1 flex flex-column justify-center">
    <div class="w-80 mx-auto bg-secondary-1 my-5 p-8 rounded-8">
        <h1 class="text-3xl font-bold text-primary-1"><i id="back" class="fa-solid fa-arrow-left cursor-pointer"></i> Book Detail</h1>

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
                <div class="flex flex-column gap-3">
                    <h1 class="text-2xl font-bold text-primary-1"><?= $book['title']; ?> (<?= $book['published_year']; ?>)</h1>
                    <p class="text-base text-primary-1 ">Author: <?= $book['author']; ?></p>
                    <p class="text-base text-primary-1 ">Publisher: <?= $book['publisher']; ?></p>
                    <p class="text-base text-primary-1 ">Genre: <?= $book['genre']; ?></p>
                    <p class="text-base text-primary-1 text-justify">Synopsis: <?= $book['synopsis']; ?></p>
                    <?php if ($book['quantity_available'] > 0) : ?>
                        <button id="pinjam" class="bg-tertiary-1 text-primary-1 text-lg font-bold px-4 py-2 rounded-8 w-full text-center hover-bg-tertiary-1">Pinjam Buku</button>
                    <?php else : ?>
                        <button class="bg-tertiary-1 text-primary-1 text-lg font-bold px-4 py-2 rounded-8 w-full text-center cursor-not-allowed" disabled>Out of Stock</button>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div id="detail-peminjaman" class="w-80 mx-auto bg-secondary-1 p-8 rounded-8 mb-5" style="display: none;">
        <h1 class="text-2xl text-center text-primary-1">Detail Peminjaman</h1>
        <div class="flex w-full justify-between p-6 gap-4">
            <div id="details">
                <table class="text-base text-left text-primary-1">
                    <tr>
                        <td>Judul</td>
                        <td>: <?= $book['title']; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>: <?= $book['author']; ?></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>: <?= $book['publisher']; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit </td>
                        <td>: <?= $book['published_year']; ?></td>
                    </tr>
                    <tr>
                        <td class="pt-3">User</td>
                        <td class="pt-3">: <?= session()->get('name'); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= session()->get('email'); ?></td>
                    </tr>
                </table>
            </div>
            <div id="time-details">
                <table class="text-base text-left text-primary-1">
                    <tr>
                        <td>Tanggal Peminjaman</td>
                        <td>: <?= date('d-m-Y'); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengembalian</td>
                        <td>: <?= date('d-m-Y', strtotime('+7 days')); ?></td>
                    </tr>
                    <tr>
                        <td class="pt-3">Harga</td>
                        <td class="pt-3">: Rp <?= $book['price']; ?></td>
                    </tr>
                    <tr>
                        <td>Denda Telat per Hari</td>
                        <td>: Rp <?= $book['price'] * 0.05; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <form action="/<?= $book['slug']; ?>/loan" method="post">
            <input type="hidden" name='slug' id="slug" value="<?= $book['slug']; ?>">
            <button type="submit" class="bg-tertiary-1 text-primary-1 text-lg font-bold px-4 py-2 rounded-8 w-full text-center hover-bg-tertiary-1">Pinjam Sekarang</button>
        </form>
    </div>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/348e129488.js" crossorigin="anonymous"></script>
</div>

<script>
    const pinjam = document.querySelector('#pinjam');
    const detailPeminjaman = document.querySelector('#detail-peminjaman');

    pinjam.addEventListener('click', function() {
        detailPeminjaman.style.display = 'block';
        pinjam.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });

    const back = document.querySelector('#back');
    back.addEventListener('click', function() {
        history.back();
    });
</script>
<?= $this->endSection(); ?>