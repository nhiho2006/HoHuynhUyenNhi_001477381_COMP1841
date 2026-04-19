<link rel="stylesheet" href="../style.css">

<h2 class="admin-title">Manage Users 👤</h2>

<div class="action-header">
    <a href="adduser.php" class="btn-add">
        + Add New User
    </a>
</div>

<div class="table-container">
    <table class="user-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="text-center">
                    <a href="edituser.php?id=<?= (int)$user['id'] ?>" class="link-edit">Edit</a>
                    
                    <form action="deleteuser.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= (int)$user['id'] ?>">
                        <button type="submit" class="btn-delete-link" onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
