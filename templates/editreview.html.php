<h2 class="form-title center-text">Edit Review ✍️</h2>

<div class="form-card form-medium">
    <form method="post">
        <input type="hidden" name="id" value="<?= $review['id'] ?>">

        <label class="form-label">Current Film Poster</label>
        <div class="poster-container">
    <img src="../images/<?= htmlspecialchars($review['filmimage'] ?: 'default.png') ?>" class="poster-img">
    <p class="poster-caption">(Image is synced from the selected film)</p>
</div>
        <label class="form-label">Review Text</label>
        <textarea name="reviewtext" class="form-textarea" rows="5" 
                  required minlength="10"><?= htmlspecialchars($review['reviewtext']) ?></textarea>

        <label class="form-label">Select Film:</label>
        <select name="filmid" class="form-select" required>
            <?php foreach ($films as $film): ?>
                <option value="<?= $film['id'] ?>" <?= $film['id'] == $review['filmid'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($film['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label class="form-label">Reviewer:</label>
        <select name="userid" class="form-select" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>" <?= $user['id'] == $review['userid'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($user['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="form-actions"></div>
            <input type="submit" value="Save Changes" class="submit-btn">
            <a href="reviews.php" class="link-btn">Cancel</a>
        </div>
    </form>
</div>