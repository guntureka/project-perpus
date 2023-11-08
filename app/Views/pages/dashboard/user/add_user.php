<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full justify-center p-8">
    <div class="w-50 p-4 bg-secondary-1 rounded-4">
        <h2 class="font-bold text-center text-primary-1 text-4xl mb-5">Input New User</h2>
        <form action="/user/add" method="post" enctype="multipart/form-data" id="register-form" class="p-8">
            <div class="flex flex-column gap-3">
                <div class="flex flex-column gap-1">
                    <label for="name" class="text-primary-1 text-2xl">Name</label>
                    <input type="text" name="name" id="name" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan nama user..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="email" class="text-primary-1 text-2xl">Email</label>
                    <input type="email" name="email" id="email" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan email user..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="password" class="text-primary-1 text-2xl">Password</label>
                    <input type="password" name="password" id="password" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan password user..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="password_confirm" class="text-primary-1 text-2xl">Confirm Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" placeholder="Masukan ulang password user..." required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="is_admin" class="text-primary-1 text-2xl">Role</label>
                    <select name="is_admin" id="is_admin" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                        <option value="1">Admin</option>
                        <option value="0" selected>User</option>
                    </select>
                </div>
                
                <div class="flex flex-column gap-1 mb-1">
                    <label for="user_img" class="text-primary-1 text-2xl">Profile Picture</label>
                    <div class="flex flex-column gap-2">
                        <input type="file" name="user_img" id="user_img" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1 w-full h-fit" required>
                        <div class="user-img-container rounded-3 overflow-hidden" style="height: 150px; width: 150px;">
                            <img src="/img/dummy-profile-img.jpeg" alt="register" class="gambar w-full h-full object-cover" id="user-img-container">
                        </div>
                    </div>
                </div>
                <button type="submit" id="register-button" class="mt-4 bg-tertiary-1 py-2 px-4 rounded-4 text-white text-2xl flex justify-center font-bold">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    const userImg = document.querySelector('#user_img');
    const userImgContainer = document.querySelector('.user-img-container');
    userImg.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                userImgContainer.querySelector('img').src = this.result;
            });
            reader.readAsDataURL(file);
        } else {
            userImgContainer.querySelector('img').src = '/img/dummy-profile-img.jpeg';
        }
    });
</script>

<?= $this->endSection(); ?>