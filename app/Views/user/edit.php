<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Edit User</h3>

<form action="/user/update/<?= $user['id'] ?>" method="post">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Password (Kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
            <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>