<h2 class="form-title center-text">Add Review ✍️</h2>

<div class="form-card form-medium">
    <form action="" method="post">
        <label class="form-label">Your Review Content:</label>
        <textarea name="reviewtext" class="form-textarea"
                  placeholder="Tell us what you think..." required minlength="10"></textarea>

        <label class="form-label">Rating (0.5 - 5 stars):</label>
        <input type="number" name="rating" class="form-input" 
               min="0.5" max="5" step="0.5" value="5.0" required>

        <label class="form-label">Reviewer Name:</label>
        <select name="userid" class="form-select" required>
            <option value="">-- Select Reviewer --</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>

        <label class="form-label">Movie Title:</label>
        <select name="filmid" class="form-select" required>
            <option value="">-- Choose a Film --</option>
            <?php foreach ($films as $film): ?>
                <option value="<?= $film['id'] ?>"><?= htmlspecialchars($film['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Save Review" class="submit-btn">
    </form>
</div>