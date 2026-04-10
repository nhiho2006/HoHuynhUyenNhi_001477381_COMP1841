<link rel="stylesheet" href="list_style.css">

<h2 class="list-title">Review List</h2>
<p class="review-count"><?= (int)$totalReviews ?> Reviews</p>

<?php foreach ($reviews as $review): ?>
    <div class="review-item">
        <h3><?= htmlspecialchars($review['filmname'], ENT_QUOTES, 'UTF-8') ?></h3>

        <?php if (!empty($review['filmimage'])): ?>
            <img src="../images/<?= htmlspecialchars($review['filmimage'], ENT_QUOTES, 'UTF-8') ?>" 
                 width="160" 
                 alt="<?= htmlspecialchars($review['alt_text'] ?? $review['filmname'], ENT_QUOTES, 'UTF-8') ?>"
                 class="review-thumb">
        <?php endif; ?>

        <p class="review-snippet">
            <?= nl2br(htmlspecialchars($review['reviewtext'], ENT_QUOTES, 'UTF-8')) ?>
        </p>

        <p class="review-meta">
            <strong>Author:</strong> <?= htmlspecialchars($review['username'], ENT_QUOTES, 'UTF-8') ?> | 
            <strong>Date:</strong> <?= date('d M, Y', strtotime($review['reviewdate'])) ?>
        </p>

        <div class="actions">
            <form action="deletereview.php" method="post" style="display:inline;" 
                  onsubmit="return confirm('Are you sure you want to delete this review?');">
                <input type="hidden" name="id" value="<?= (int)$review['id'] ?>">
                <button type="submit" class="btn btn-delete">Delete</button>
            </form>
            <a href="editreview.php?id=<?= (int)$review['id'] ?>" class="btn btn-edit">Edit</a>
        </div>
    </div>
<?php endforeach; ?>