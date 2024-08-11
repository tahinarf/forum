<?php
require_once '../../controllers/PostController.php';
require_once '../../controllers/AuthController.php';

$postController = new PostController();
$authController = new AuthController();

if (!$authController->isLoggedIn()) {
    echo "You need to be logged in to edit a post.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $postController->update($postId, $title, $content);
} else {
    $postId = $_GET['id'];
    $post = $postController->show($postId);
    if ($post['user_id'] !== $authController->getUserId()) {
        echo "You do not have permission to edit this post.";
        exit;
    }
}
?>

<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
    <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
    <button type="submit">Update Post</button>
</form>
