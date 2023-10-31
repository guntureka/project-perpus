<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <table>
        <thead>
            <th>No</th>
            <th>Book</th>
            <th>User</th>
            <th>Loan Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if($loans): ?>
                <?php $i = 0 ?>
                <?php foreach($loans as $loan): ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $loan['title']; ?></td>
                        <td><?= $loan['name']; ?></td>
                        <td><?= $loan['loan_date']; ?></td>
                        <td><?= $loan['return_date']; ?></td>
                        <td>
                            <?php if($loan['is_loan']): ?>
                                <span class="badge badge-success">Loan</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Return</span>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="/loan/return/<?= $loan['loan_id']; ?>">
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