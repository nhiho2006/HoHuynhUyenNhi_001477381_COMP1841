<link rel="stylesheet" href="style.css">

<div class="review-card">
    <div class="review-header">
        <?php if (!empty($review['filmimage'])): ?>
            <img src="images/<?= htmlspecialchars($review['filmimage'], ENT_QUOTES, 'UTF-8') ?>" class="film-poster" alt="Film Poster">
        <?php endif; ?>

        <div class="film-details">
            <h1 class="film-title"><?= htmlspecialchars($review['filmname'], ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="category-tag">Movie Review</p>
            
            <div class="rating-box">
                <span class="rating-text">🌸 <strong>Rating:</strong> <?= number_format((float)$review['rating'], 1) ?> ★</span>
            </div>

            <hr class="separator">

            <div class="meta-info">
                <p class="meta-text">
                    <strong>✍️ Author:</strong>
                    <span class="author-name"><?= htmlspecialchars($review['username'], ENT_QUOTES, 'UTF-8') ?></span>
                </p>
                <p class="post-date">
                    <strong>📅 Posted on:</strong> <?= date('d M, Y', strtotime($review['reviewdate'])) ?>
                </p>
            </div>

            <div class="reaction-stats">
                <span class="likes">🌸 <?= (int)($review['likes'] ?? 0) ?> Likes</span>
                <span class="dislikes">☁️ <?= (int)($review['dislikes'] ?? 0) ?> Dislikes</span>
            </div>
        </div>
    </div>

    <div class="review-content-box">
        <span class="quote-mark quote-left">“</span>
        <div class="review-text">
            <?= nl2br(htmlspecialchars($review['reviewtext'], ENT_QUOTES, 'UTF-8')) ?>
        </div>
        <span class="quote-mark quote-right">”</span>
    </div>

    <div class="footer-actions">
        <a href="reviews_user.php" class="btn-back"> ← Back to Review List </a>
    </div>
</div>