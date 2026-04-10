<h2 class="page-header">🌸 Review List</h2>
<p class="sub-header"><?= (int)$totalReviews ?> Reviews shared with the community</p>

<div class="toolbar">
    <div class="filter-group">
        <a href="reviews_user.php?sort=latest" class="btn-filter btn-latest">Latest</a>
        <a href="reviews_user.php?sort=most_liked" class="btn-filter btn-liked">Most Liked</a>
        <a href="reviews_user.php?sort=top_rated" class="btn-filter btn-top">Top Rated</a>
    </div>
    
    <form action="reviews_user.php" method="get" class="search-form">
        <input type="text" name="search" placeholder="Search films or reviews..." class="search-input">
        <button type="submit" class="btn-search">Search</button>
    </form>
</div>

<?php foreach ($reviews as $review): ?>
<div class="review-card">
    <h3 class="card-title">
        <?= htmlspecialchars($review['filmname'], ENT_QUOTES, 'UTF-8') ?>
        <?php if (!isset($review['avg_rating'])): ?>
            <a href="review-detail.php?id=<?= (int)$review['id'] ?>">🔗</a>
        <?php endif; ?>
    </h3>

    <div class="rating-display">
        Rating: 
        <?php 
            // Nếu có avg_rating (chế độ Top Rated) thì hiện nó, không thì hiện rating lẻ
            $displayRating = $review['avg_rating'] ?? $review['rating'] ?? 0;
            echo number_format((float)$displayRating, 1); 
        ?> 
        <span class="star-icon">★</span>

        <?php if (isset($review['review_count'])): ?>
            <span class="review-qty">(<?= (int)$review['review_count'] ?> reviews)</span>
        <?php endif; ?>
    </div>

    <?php if (!empty($review['filmimage'])): ?>
        <img src="images/<?= htmlspecialchars($review['filmimage'], ENT_QUOTES, 'UTF-8') ?>" 
             alt="<?= htmlspecialchars($review['alt_text'] ?? $review['filmname'], ENT_QUOTES, 'UTF-8') ?>"
             width="180" class="film-img">
    <?php endif; ?>

    <?php if (!isset($review['avg_rating'])): ?>
        <p class="review-excerpt">
            <span class="quote-decor">“</span>
            <?= htmlspecialchars(mb_strimwidth($review['reviewtext'], 0, 160, "..."), ENT_QUOTES, 'UTF-8') ?>
            <span class="quote-decor">”</span>
        </p>

        <div class="meta-box">
            <span class="meta-author">
                <strong>✍️ Author:</strong> 
                <span class="author-name"><?= htmlspecialchars($review['username'], ENT_QUOTES, 'UTF-8') ?></span>
            </span>
            <span class="meta-date">
                <strong>📅 Date:</strong> <?= date('d M, Y', strtotime($review['reviewdate'])) ?>
            </span>
        </div>

        <div class="card-footer">
            <a href="interact.php?id=<?= (int)$review['id'] ?>&type=like" class="btn-interact">
                🌸 <span class="count-like"><?= (int)($review['likes'] ?? 0) ?></span>
            </a>

            <a href="interact.php?id=<?= (int)$review['id'] ?>&type=dislike" class="btn-interact">
                ☁️ <span class="count-dislike"><?= (int)($review['dislikes'] ?? 0) ?></span>
            </a>
            
            <a href="review-detail.php?id=<?= (int)$review['id'] ?>" class="btn-details">
                Read Details →
            </a>
        </div>
    <?php else: ?>
        <div class="card-footer">
    <p class="top-rated-badge">Top Rated Movie! ✨</p>
</div>
    <?php endif; ?>
</div>
<?php endforeach; ?>