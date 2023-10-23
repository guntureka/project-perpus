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
    <button>
        <a href="/profile/edit/<?= $user['user_id']; ?>">Edit Profile</a>
    </button>
</div>

<?= $this->endSection(); ?>