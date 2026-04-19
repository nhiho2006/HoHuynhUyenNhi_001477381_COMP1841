<link rel="stylesheet" href="../style.css">

<h2 class="admin-messages-title">Customer Messages</h2>

<?php foreach ($contacts as $contact): ?>
    <div class="form-card">
        <strong>From: <?= htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8') ?></strong> 
        (<?= htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8') ?>)<br>
        
        <small>Date: <?= htmlspecialchars($contact['date'], ENT_QUOTES, 'UTF-8') ?></small>
        
        <div class="message-image" style="margin-top: 10px;">
            <?php if (!empty($contact['film_image']) && $contact['film_image'] !== 'default.png'): ?>
                <img src="../images/<?= htmlspecialchars($contact['film_image'], ENT_QUOTES, 'UTF-8') ?>" 
                     alt="Film Image" style="max-width: 200px; border-radius: 8px; border: 1px solid #ddd;">
            <?php endif; ?>
        </div>
        
        <p class="message-content">
            <?= nl2br(htmlspecialchars($contact['content'], ENT_QUOTES, 'UTF-8')) ?>
        </p>
    </div>
<?php endforeach; ?>
