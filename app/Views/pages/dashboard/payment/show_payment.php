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
                    </tr>
                <?php $i++;endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8">No Data</td>
                </tr>
                <?php endif ?>
            </tbody>


<?= $this->endSection(); ?>