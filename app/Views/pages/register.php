<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-secondary-1">
    <div id="register" class="flex justify-center align-center">
        <div class="img-container">
            <!-- Image -->
            <img src="/img/landing-reading-man.svg" alt="register" class="gambar">
        </div>
        <div class="register-container">
            <h1 class="font-bold text-center text-white mb-5 text-5xl">Digital Library</h1>
            <form id="register-form" class="bg-white p-8 rounded-8">
                <h2 class="font-bold text-center text-secondary-2 text-4xl mb-5">Register</h2>
                <div class="flex flex-column gap-3">
                    <div id="message" class="bg-red py-3 px-5 rounded-4">
                        <p class="text-white text-center text-xl font-regular">*Password tidak cocok!</p>
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="name" class="text-secondary-2 text-2xl">Name</label>
                        <input type="text" name="name" id="name" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan nama anda..">
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="email" class="text-secondary-2 text-2xl">Email</label>
                        <input type="email" name="email" id="email" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan email anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="password" class="text-secondary-2 text-2xl">Password</label>
                        <input type="password" name="password" id="password" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan password anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="password" class="text-secondary-2 text-2xl">Confirm Password</label>
                        <input type="password" name="password" id="password" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan password anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="profile-img" class="text-secondary-2 text-2xl">Profile Picture</label>
                        <div class="flex gap-2">
                            <input type="file" name="profile-img" id="profile-img" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1 w-40 h-fit">
                            <div class="profile-img-container w-40 rounded-4 overflow-hidden">
                                <img src="/img/dummy-profile-img.jpeg" alt="register" class="gambar" id="profile-img-container">
                            </div>
                        </div>

                    </div>
                    <p class="text-base mb-3 font-medium">Sudah punya akun? <span class="text-tertiary-1">Login disini</span></p>
                    <button type="submit" id="register-button" class="bg-tertiary-1 py-3 px-5 rounded-4 text-white text-2xl flex justify-center font-bold">Login</button>

                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const profileImg = document.querySelector('#profile-img');
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