<!-- Link file CSS -->
<link rel="stylesheet" href="admin_tables.css">

<h2 class="admin-title">Manage Films 🎬</h2>

<div class="action-header">
    <a href="addfilm.php" class="btn-add">
        + Add New Film
    </a>
</div>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Film Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
            <tr>
                <td><?= htmlspecialchars($film['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="text-center">
                    <a href="editfilm.php?id=<?= (int)$film['id'] ?>" class="link-edit">Edit</a>
                    
                    <form action="deletefilm.php" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this film?')">
                        <input type="hidden" name="id" value="<?= (int)$film['id'] ?>">
                        <button type="submit" class="btn-delete-link">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>