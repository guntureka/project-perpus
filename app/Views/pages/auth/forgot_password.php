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
            <form action="/login" method="post" id=" login-form" class="bg-white p-8 rounded-8">
                <h2 class="font-bold text-secondary-2 text-3xl mb-5"><i id="back" class="fa-solid fa-arrow-left cursor-pointer" onClick="window.history.back()"></i>
                Change Password</h2>
                <div class="flex flex-column gap-3">
                    <div class="flex flex-column gap-1">
                        <label for="email" class="text-secondary-2 text-2xl">Email</label>
                        <input type="email" name="email" id="email" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan email anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="password" class="text-secondary-2 text-2xl">Password</label>
                        <input type="password" name="password" id="password" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan password anda..">
                    </div>
                    <div class="flex flex-column gap-1 mb-1">
                        <label for="password_confirm" class="text-secondary-2 text-2xl">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="bg-secondary-1 py-3 px-5 rounded-4 text-xl font-regular text-primary-1" placeholder="Masukan ulang password anda..">
                    </div>
                    <button type="submit" id="login-button" class="bg-tertiary-1 mt-2 py-3 px-5 rounded-4 text-white text-2xl flex justify-center font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>