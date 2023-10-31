<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <table>
        <thead>
            <th>No</th>
            <th>Id</th>
            <th>User</th>
            <th>Payment Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if($payments): ?>
                <?php $i = 0 ?>
                <?php foreach($payments as $payment): ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $payment['title']; ?></td>
                        <td><?= $payment['name']; ?></td>
                        <td><?= $payment['created_at']; ?></td>
                        <td><?= $payment['return_date']; ?></td>
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
                        </td>
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