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
                <th>Payment Date</th>
                <th>Return Date</th>
            </thead>
<div>
    <table>
        <thead>
            <th>No</th>
            <th>User</th>
            <th>Book</th>
            <th>Payment Date</th>
            <th>Total Payment</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if($payments): ?>
                <?php $i = 0 ?>
                <?php foreach($payments as $payment): ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $payment['name']; ?></td>
                        <td><?= $payment['title']; ?></td>
                        <td><?= $payment['created_at']; ?></td>
                        <!-- <td>Rp <?= $payment['total_payment']; ?></td>
                        <td>
                            <?php if($payment['is_payment']): ?>
                                <span class="badge badge-success">payment</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Return</span>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="/payment/return/<?= $payment['payment_id']; ?>">
                                <button>accept</button>
                            </a>
                        </td> -->
                    </tr>
                <?php $i++;endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No Data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>