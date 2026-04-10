<h2 class="page-title">Add New User 👤</h2>

<div class="form-card">
    <?php if (isset($error) && $error): ?>
        <div class="error-alert">
            ⚠️ <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        
        <label class="form-label">Full Name:</label>
        <input type="text" name="name" class="form-input" 
               placeholder="Enter full name" required>

        <label class="form-label">Email Address:</label>
        <input type="email" name="email" class="form-input" 
               placeholder="example@gmail.com" required>

        <div class="form-actions">
            <input type="submit" value="Create User" class="submit-btn">
            <a href="users.php" class="link-btn">Cancel</a>
        </div>
    </form>
</div>