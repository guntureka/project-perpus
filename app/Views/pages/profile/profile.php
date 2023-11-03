<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-primary-1">
    <div class="flex justify-center">
        <div class="w-80 mx-auto bg-secondary-1 my-5 p-8 rounded-8">
            <h1 class="text-3xl font-bold text-primary-1 text-center">Profile</h1>
            <!-- Account Details -->
            <div class="flex mt-4 gap-8">
                <div class="" style="width: 250px; height: 250px;">
                    <img src="/img/profile/<?= $user['user_img']; ?>" alt="<?= $user['user_img']; ?>" class="w-full h-full rounded-4 object-cover">
                </div>
                <div class="text-primary-1 text-base flex flex-column justify-between py-6">
                    <div>
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>: <?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?= $user['email']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-full">
                        <a href="/profile/edit/<?= $user['user_id']; ?>" class="bg-primary-1 text-black rounded-8 text-base text-center" style="padding: 8px 50px 8px 50px;">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-primary-1 mb-5">Buku yang sudah dibaca</h2>
            </div>
            <!-- if loans empty -->
            <?php if ($loans == null) : ?>
                <div class="flex justify-center">
                    <div class="w-80 mx-auto bg-secondary-1 my-5 p-8 rounded-8">
                        <h1 class="text-3xl font-bold text-primary-1 text-center">Belum ada buku yang dibaca</h1>
                    </div>
                </div>
            <?php endif; ?>
            <div id="books" class="flex justify-center">
                <div id="book-container">
                    <!-- Books data -->
                    <?php foreach ($loans as $loan) : ?>
                        <div class="card flex flex-column">
                            <div class="book-img rounded-4 w-full overflow-hidden mb-4 position-relative" style="height: 300px;">
                                <div class="position-absolute flex w-full h-full align-center justify-center" id="img-link" style="display: none;">
                                    <a href="/book/<?= $loan['slug']; ?>" class="text-secondary-2 rounded-8 px-8 py-4 bg-primary-1 font-bold">Lihat Buku</a>
                                </div>
                                <img src="/img/books/<?= $loan['book_img']; ?>" alt="" class="w-full">
                            </div>
                            <div class="text-primary-1">
                                <h4 class="text-xl font-bold"><?= $loan['title']; ?> (<?= $loan['published_year']; ?>)</h4>
                                <h5 class="text-base font-medium"><?= $loan['author']; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const bookContainer = document.querySelector('#book-container');
    const books = document.querySelectorAll('.card');
    const imgLink = document.querySelectorAll('#img-link');

    books.forEach((book, index) => {
        book.addEventListener('mouseover', () => {
            imgLink[index].style.display = 'flex';
        });
        book.addEventListener('mouseout', () => {
            imgLink[index].style.display = 'none';
        });
    });
</script>


<?= $this->endSection(); ?>