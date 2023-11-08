<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1 class="text-3xl font-bold text-secondary-1">Add User</h1>
    <div class="w-full rounded-4 overflow-hidden mt-2">
        <form action="/user/save" method="post" enctype="multipart/form-data" class="p-8">
            <div class="flex flex-column gap-3">
                <div class="flex flex-column gap-1">
                    <label for="name" class="text-primary-1 text-2xl">Name</label>
                    <input type="text" name="name" id="name" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="email" class="text-primary-1 text-2xl">Email</label>
                    <input type="email" name="email" id="email" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="password" class="text-primary-1 text-2xl">Password</label>
                    <input type="password" name="password" id="password" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                </div>
                <div class="flex flex-column gap-1 mb-1">
                    <label for="user_img" class="text-primary-1 text-2xl">Profile Picture</label>
                    <div class="flex flex-column gap-2">
                        <input type="file" name="user_img" id="user_img" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-primary-1 w-full h-fit" required>
                        <div class="user-img-container rounded-3 overflow-hidden" style="height: 192px; width: 108px;">
                            <img alt="register" class="gambar w-full h-full object-cover" id="user-img-container">
                        </div>
                    </div>
                </div>
                <div class="flex flex-column gap-1">
                    <label for="is_admin" class="text-primary-1 text-2xl">Role</label>
                    <select name="is_admin" id="is_admin" class="bg-secondary-2 py-3 px-5 rounded-4 text-xl font-regular text-white" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" id="register-button" class="mt-4 bg-tertiary-1 py-2 px-4 rounded-4 text-white text-2xl flex justify-center font-bold">Submit</button>
        </form>
</div>


<?= $this->endSection(); ?>