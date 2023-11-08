<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="mx-auto mt-5" style="width: 90%">
    <h1 class="text-3xl font-bold text-secondary-1">List Payments</h1>
    <div class="w-full rounded-4 overflow-hidden mt-2">
        <table id="table" class="w-full bg-secondary-1 text-primary-1">
            <thead class="text-left">
                <th class="text-center">No</th>
                <th>User</th>
                <th>Book</th>
                <th>Loan Date</th>
                <th>Payment Date</th>
                <th>Payment Amount</th>
            </thead>
            <tbody>
                <!-- <tr>
                    <td class="text-center">1</td>
                    <td>admin</td>
                    <td>Bumi Manusia</td>
                    <td>2021-08-01</td>
                    <td>2021-08-01</td>
                    <td>Rp 100.000</td>
                </tr>
                <tr>
                    <td colspan="9" class="text-center">No Data</td>
                </tr> -->
                <?php if($payments): ?>
                <?php $i = 0 ?>
                <?php foreach($payments as $payment): ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $payment['name']; ?></td>
                        <td><?= $payment['title']; ?></td>
                        <td><?= $payment['loan_date']; ?></td>
                        <td><?= $payment_date[$i]; ?></td>
                        <td>Rp <?= $payment['amount']; ?></td>
                    </tr>
                <?php $i++;endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No Data</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>