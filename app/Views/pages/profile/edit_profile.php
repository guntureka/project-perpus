<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Update Profile</h1>
    <form action="/profile/edit/<?= $user['user_id']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $user['name']; ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $user['email']; ?>">
        </div>
        <img src="/img/profile/<?= $user['user_img']; ?>" alt="<?= $user['user_img']; ?>" width="150px">
        <div>
            <label for="user_img">Photo</label>
            <input type="file" name="user_img" id="user_img">
        </div>
        <div>
            <button type="submit">Edit</button>
        </div>
    </form>
</div>

<div>
    <h1>Update Password</h1>
    <form action="/profile/edit/password/<?= $user['user_id']; ?>" method="post">
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="new_password">Password Confirm</label>
            <input type="password" name="new_password" id="new_password">
        </div>
        <div>
            <label for="password_confirm">Password Confirm</label>
            <input type="password" name="password_confirm" id="password_confirm">
        </div>
        <div>
            <button type="submit">Edit</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>