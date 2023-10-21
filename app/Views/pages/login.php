<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-secondary-1">
    <div id="login" class="flex justify-center h-screen align-center">
        <div class="img-container">
            <!-- Image -->
            <img src="/img/landing-reading-man.svg" alt="login" class="gambar">
        </div>
        <div class="login-container">
            <h1 class="font-bold text-center text-white mb-5 text-5xl">Digital Library</h1>
            <form id="login-form" class="bg-white p-8 rounded-8">
                <h2 class="font-bold text-center text-secondary-2 text-4xl mb-5">LOGIN</h2>
                <div class="flex flex-column gap-3">
                    <div id="message" class="bg-red py-3 px-5 rounded-4">
                        <p class="text-white text-center text-xl font-regular">*Email atau Password salah!</p>
                    </div>
                    <div class="flex flex-column gap-1">
                        <label for="email" class="text-secondary-2 text-2xl">Email</label>
                        <input type="email" name="email" id="email" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan email anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="password" class="text-secondary-2 text-2xl">Password</label>
                        <input type="password" name="password" id="password" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan password anda..">
                    </div>
                    <p class="text-base mb-3 font-medium">Belum punya akun? <span class="text-tertiary-1">Daftar sekarang</span></p>
                    <button type="submit" id="login-button" class="bg-tertiary-1 py-3 px-5 rounded-4 text-white text-2xl flex justify-center font-bold">Login</button>

                </div>
            </form>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>