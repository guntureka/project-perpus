<nav class="flex justify-between">
  <div>
    <h1 class="text-3xl font-bold">Digital Library</h1>
  </div>
  <div>
    <ul class="flex gap-8">
      <li>
        <a href="<?= base_url('/profile'); ?>">Profile</a>
      </li>
      <li>
        <a href="<?= base_url('/list'); ?>">List Peminjaman</a>
      </li>
      <li>
        <a id="logout-btn" href="<?= base_url('/pages/contact'); ?>" class="py-3 px-4 bg-white text-secondary-2 rounded-8 font-bold">Logout</a>
      </li>
    </ul>
</nav>