<?php include '../views/partials/header.php'; ?>

<h2><?php echo htmlspecialchars($post['title']); ?></h2>
<p><?php echo htmlspecialchars($post['content']); ?></p>
<p>By <?php echo htmlspecialchars($post['username']); ?> on <?php echo htmlspecialchars($post['created_at']); ?></p>

<h3>Comments</h3>
<?php foreach ($comments as $comment): ?>
    <div>
        <p><?php echo htmlspecialchars($comment['content']); ?></p>
        <p>By <?php echo htmlspecialchars($comment['username']); ?> on <?php echo htmlspecialchars($comment['created_at']); ?></p>
    </div>
<?php endforeach; ?>

<?php if ($authController->isLoggedIn()): ?>
    <form method="POST" action="/forum/controllers/CommentController.php?action=create">
        <textarea name="content" placeholder="Add a comment..." required></textarea>
        <button type="submit">Comment</button>
    </form>
<?php endif; ?>

<?php include '../views/partials/footer.php'; ?>
