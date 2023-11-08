<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="mx-auto mt-5" style="width: 90%">
    <h1 class="text-3xl font-bold text-secondary-1">List User</h1>
    <a href="/user/add">
        <button class="mt-4 py-2 px-4 bg-green text-center rounded-4 text-white">
            Add New User
        </button>
    </a>
    <div class="w-full rounded-4 overflow-hidden mt-2">
        <table id="table" class="w-full bg-secondary-1 text-primary-1">
            <thead class="text-left">
                <th class="text-center">No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Profile Picture</th>
                <th>Is Admin</th>
                <th>Action</th>
            </thead>
            <tbody>
              <tr>
                  <td>1</td>
                  <td>admin</td>
                  <td>admin@admin.com</td>
                  <td class="p-8 flex align-center justify-center">
                    <img src="/img/dummy-profile-img.jpeg" alt="profile">
                  </td>
                  <td class="text-green">TRUE</td>
                  <td>
                    <a href="/user/edit/">
                        <button class="py-2 px-4 bg-tertiary-1 text-center rounded-4 text-white">
                            edit
                        </button>
                    </a>
                    <a href="/user/delete/">
                        <button class="mt-2 py-2 px-4 bg-red text-center rounded-4 text-white">
                            delete
                        </button>
                    </a>
                </td> 
              </tr>
                <tr>
                    <td colspan="9" class="text-center">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>