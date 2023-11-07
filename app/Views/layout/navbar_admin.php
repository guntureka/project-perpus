<nav class="flex justify-between">
  <div>
    <a href="<?= base_url('/book'); ?>">
      <h1 class="text-3xl font-bold">Digital Library<span class="font-thin"> Admin</span></h1>
    </a>
  </div>
  <div>
    <ul class="flex gap-8">
      <li>
        <a href="<?= base_url('/book'); ?>">Books</a>
      </li>
      <li>
        <a href="<?= base_url('/loan'); ?>">Loans</a>
      </li>
      <li>
        <a href="<?= base_url('/transaction'); ?>">Transactions</a>
      </li>
      <li>
        <a id="logout-btn" href="<?= base_url('/logout'); ?>" class="py-3 px-4 bg-white text-secondary-2 rounded-8 font-bold">Logout</a>
      </li>
    </ul>
</nav>