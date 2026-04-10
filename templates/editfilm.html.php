<h2 class="form-title">Edit Film</h2>

<div class="form-card">
    <form method="post">
        <input type="hidden" name="id" value="<?= $film['id'] ?>">

        <!-- Film name -->
        <label class="form-label">Film Name</label>
        <input type="text" name="name" 
               value="<?= htmlspecialchars($film['name']) ?>" 
               class="form-input" required>

        <!-- Alt text -->
        <label class="form-label">Alt Text</label>
        <input type="text" name="alt_text" 
               value="<?= htmlspecialchars($film['alt_text']) ?>" 
               class="form-input" required>

        <input type="submit" value="Save Changes" class="submit-btn">
        <a href="films.php" class="link-btn">Cancel</a>
    </form>
</div>