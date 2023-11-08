<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-primary-1">
    <div class="flex w-full justify-center my-5 gap-8">
        <div class="profile-container w-45">
            <form action="/user/edit/<?= $user['user_id']; ?>" method="post" enctype="multipart/form-data" class="bg-secondary-1 p-8 rounded-8">
                <h2 class="font-bold text-center text-primary-1 text-4xl mb-5">Edit Profile</h2>
                <div class="flex flex-column gap-3">
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="user_img" class="text-primary-1 text-2xl">Profile Picture</label>
                        <div class="flex flex-column gap-2">
                            <input type="file" name="user_img" id="user_img" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1 w-full h-fit" value="<?= $user['user_img']; ?>" required>
                            <div class="profile-img-container w-40 rounded-4 overflow-hidden">
                                <img src="/img/profile/<?= $user['user_img']; ?>" alt="register" class="gambar" id="profile-img-container">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="name" class="text-primary-1 text-2xl">Name</label>
                        <input type="text" name="name" id="name" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan nama anda.." value="<?= $user['name']; ?>" required>
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="email" class="text-primary-1 text-2xl">Email</label>
                        <input type="email" name="email" id="email" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan email anda.." value="<?= $user['email']; ?>" required>
                    </div>
                    <div class="flex flex-column gap-1">
                    <label for="is_admin" class="text-primary-1 text-2xl">Role</label>
                    <select name="is_admin" id="is_admin" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                        <option value="1" <?php if ($user['is_admin'] == 1) echo 'selected'; ?>>Admin</option>
                        <option value="0" <?php if ($user['is_admin'] == 0) echo 'selected'; ?>>User</option>
                    </select>
                </div>
                    <button type="submit" id="register-button" class="bg-tertiary-1 py-3 px-5 mt-4 rounded-4 text-white text-2xl flex justify-center font-bold">Save</button>
                </div>
            </form>
        </div>
        <div class="profile-container w-45">
            <form action="/user/edit/password/<?= $user['user_id']; ?>" method="post" class="bg-secondary-1 p-8 rounded-8">
                <h2 class="font-bold text-center text-primary-1 text-4xl mb-5">Change Password</h2>
                <div class="flex flex-column gap-3">
                    <div class="flex flex-column gap-1">
                        <label for="new_password" class="text-primary-1 text-2xl">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" required>
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="password_confirm" class="text-primary-1 text-2xl">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" required>
                    </div>
                    <button type="submit" id="register-button" class="bg-tertiary-1 py-3 px-5 mt-4 rounded-4 text-white text-2xl flex justify-center font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const profileImg = document.querySelector('#user_img');
    const profileImgContainer = document.querySelector('.profile-img-container');
    profileImg.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                profileImgContainer.querySelector('img').src = this.result;
            });
            reader.readAsDataURL(file);
        } else {
            profileImgContainer.querySelector('img').src = '/img/dummy-profile-img.jpeg';
        }
    });
</script>
<?= $this->endSection(); ?>