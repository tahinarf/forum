<?php include '../views/partials/header.php'; ?>

<form method="POST" action="/forum/controllers/PostController.php?action=create">
    <h2>Create Post</h2>
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Create</button>
</form>

<?php include '../views/partials/footer.php'; ?>
