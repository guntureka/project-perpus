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
                <?php if($users): ?>
                <?php $i = 0 ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td class="p-8 flex align-center justify-center">
                            <img src="/img/profile/<?= $user['user_img']; ?>" alt="profile" width="150px">
                        </td>
                        <td class="text-green"><?= $user['is_admin']; ?></td>
                        <td>
                            <a href="/user/edit/<?= $user['user_id']; ?>">
                                <button class="py-2 px-4 bg-tertiary-1 text-center rounded-4 text-white">
                                    edit
                                </button>
                            </a>
                            <a href="/user/delete/<?= $user['user_id']; ?>">
                                <button class="mt-2 py-2 px-4 bg-red text-center rounded-4 text-white">
                                    delete
                                </button>
                            </a>
                        </td> 
                </tr>
             <?php $i++;endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No Data</td>
                </tr>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>