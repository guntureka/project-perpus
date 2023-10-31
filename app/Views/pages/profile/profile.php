<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <?php if($user): ?>
        <h3><?= $user['name'] ?></h3>
        <p><?= $user['email'] ?></p>
        <p>
            <img src="/img/profile/<?= $user['user_img']; ?>" alt="<?= $user['user_img']; ?>" width="150px">
        </p>
    <?php endif ?>
    <a href="/profile/edit/<?= $user['user_id']; ?>">
        <button>
            Edit Profile
        </button>
    </a>
    <table>
        <thead>
            <th>No</th>
            <th>Book</th>
            <th>Loan Date</th>
            <th>Return Date</th>
            <th>Status</th>
        </thead>
        <tbody>
        <?php if($loans): ?>
            <tr>
            <?php $i = 0 ?>
            <?php foreach($loans as $loan): ?>
                <td><?= $i+1; ?></td>
                <td><?= $loan['title']; ?></td>
                <td><?= $loan['loan_date']; ?></td>
                <td><?= $loan['return_date']; ?></td>
                <td>
                    <?php if($loan['is_loan']): ?>
                        <span class="badge badge-success">Loan</span>
                    <?php else: ?>
                        <span class="badge badge-danger">Return</span>
                    <?php endif ?>
                </td>
            </tr>
            <?php $i++;endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No data</td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
    
</div>

<?= $this->endSection(); ?>