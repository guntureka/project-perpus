<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="mx-auto mt-5" style="width: 80%">
    <h1 class="text-3xl font-bold text-secondary-1">List Buku</h1>
    <a href="/book/add">
        <button class="mt-4 py-2 px-4 bg-green text-center rounded-4 text-white">
            Add New Book
        </button>
    </a>
    <div class="w-full rounded-4 overflow-hidden mt-2">
        <table id="table" class="w-full bg-secondary-1 text-primary-1">
            <thead class="text-left">
                <th class="text-center">No</th>
                <th>Title</th>
                <th>Published Year</th>
                <th>Author</th>
                <th style="max-width: 200px;">Synopsis</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if ($books) : ?>
                    <tr>
                        <?php $i = 0 ?>
                        <?php foreach ($books as $book) : ?>
                            <td class="text-center"><?= $i + 1; ?></td>
                            <td><?= $book['title']; ?></td>
                            <td><?= $book['published_year']; ?></td>
                            <td><?= $book['author']; ?></td>
                            <td style="max-width: 200px;"><?= $book['synopsis']; ?></td>
                            <td><?= $book['quantity_available']; ?></td>
                            <td>
                                <img src="/img/books/<?= $book['book_img']; ?>" alt="<?= $book['book_img']; ?>" width="150px" height="200px" class="object-cover">
                            </td>
                            <td>Rp <?= $book['price']; ?></td>
                            <td>
                                <a href="/book/edit/<?= $book['slug'] ?>">
                                    <button class="py-2 px-4 bg-tertiary-1 text-center rounded-4 text-white">
                                        edit
                                    </button>
                                </a>
                                <a href="/book/delete/<?= $book['slug'] ?>">
                                    <button class="mt-2 py-2 px-4 bg-red text-center rounded-4 text-white">
                                        delete
                                    </button>
                                </a>
                            </td>
                    </tr>
                <?php $i++;
                        endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">No data</td>
                </tr>
            <?php endif ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>