<?php include '../views/partials/header.php'; ?>

<link rel="stylesheet" href="/forum/views/css/style.css">

<h1>Forum</h1>

<?php if ($authController->isLoggedIn()): ?>
    <a href="/forum/views/posts/create.php">Create Post</a>
<?php endif; ?>

<?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
        <p><?php echo htmlspecialchars($post['content']); ?></p>
        <p class="date">By <?php echo htmlspecialchars($post['username']); ?> on <?php echo htmlspecialchars($post['created_at']); ?></p>
        <a href="/forum/views/posts/show.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>
<?php endforeach; ?>

<!-- Pagination logic here -->

<?php include '../views/partials/footer.php'; ?>
