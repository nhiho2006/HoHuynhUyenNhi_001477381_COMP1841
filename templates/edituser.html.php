<!-- Edit user form -->
<h2 class="form-title">Edit User</h2>

<div class="form-card">
    <form method="post">
        <!-- Hidden user ID -->
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label>Name</label>
        <input type="text" name="name" 
               value="<?= htmlspecialchars($user['name']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" 
               value="<?= htmlspecialchars($user['email']) ?>" required>

        <input type="submit" value="Save Changes" class="submit-btn"> 
<div class="form-actions">
    <a href="users.php" class="link-btn">Cancel</a> 
    </div>
            
    </form>
</div>