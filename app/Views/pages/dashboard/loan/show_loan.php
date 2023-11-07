<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="mx-auto mt-5" style="width: 90%">
    <h1 class="text-3xl font-bold text-secondary-1">List Peminjam Buku</h1>
    <div class="w-full rounded-4 overflow-hidden mt-2">
        <table id="table" class="w-full bg-secondary-1 text-primary-1">
            <thead class="text-left">
                <th class="text-center">No</th>
                <th>Book</th>
                <th>User</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Loan Price</th>
                <th>Late Charge</th>
                <th>Total Payment</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if ($loans) : ?>
                    <?php $i = 0 ?>
                    <?php $late_charge = 0; ?>
                    <?php foreach ($loans as $loan) : ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= $loan['title']; ?></td>
                            <td><?= $loan['name']; ?></td>
                            <td><?= $loan['loan_date']; ?></td>
                            <td><?= $loan['return_date']; ?></td>
                            <td>Rp <?= $loan['price']; ?></td>
                            <td>
                                <?php
                                if (date('Y-m-d') > $loan['return_date']) {
                                    $late_charge = (strtotime(date('Y-m-d')) - strtotime($loan['return_date'])) / (60 * 60 * 24);
                                    $late_charge = $late_charge * $loan['price'] * 0.05;
                                    echo "Rp " . $late_charge;
                                } else {
                                    echo "Rp 0";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (date('Y-m-d') > $loan['return_date']) {
                                    $total_payment = $loan['price'] + $late_charge;
                                    echo "Rp " . $total_payment;
                                } else {
                                    echo "Rp " . $loan['price'];
                                }
                                ?>
                            <td>
                                <?php if ($loan['is_loan']) : ?>
                                    <span class="text-red">Loan</span>
                                <?php else : ?>
                                    <span class="text-green">Return</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="/loan/return/<?= $loan['loan_id']; ?>">
                                    <button class="py-2 px-2 bg-tertiary-1 text-white rounded-3">accept</button>
                                </a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No Data</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>