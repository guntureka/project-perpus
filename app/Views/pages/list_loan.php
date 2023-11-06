<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="mx-auto mt-5" style="width: 80%">
    <h1 class="text-3xl font-bold text-secondary-1">List Buku yang Dipinjam</h1>
    <div class="w-full rounded-4 overflow-hidden mt-4">
        <table class="w-full bg-secondary-1 text-primary-1">
            <thead class="text-left">
                <th class="text-center">No</th>
                <th>Title</th>
                <th>Published Year</th>
                <th>Author</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Price</th>
                <th>Late Charge per Day</th>
            </thead>
            <tbody>
                <?php if ($loans) : ?>
                    <tr>
                        <?php $i = 0 ?>
                        <?php foreach ($loans as $loan) : ?>
                            <td class="text-center"><?= $i + 1; ?></td>
                            <td><?= $loan['title']; ?></td>
                            <td><?= $loan['published_year']; ?></td>
                            <td><?= $loan['author']; ?></td>
                            <td><?= date('d-m-Y', strtotime($loan['loan_date'])); ?></td>
                            <td><?= date('d-m-Y', strtotime($loan['return_date'])); ?></td>
                            <td>Rp <?= $loan['price']; ?></td>
                            <td>Rp <?= $loan['price'] * 0.05 ?></td>
                    </tr>
                <?php $i++;
                        endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">No data</td>
                </tr>
            <?php endif ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>