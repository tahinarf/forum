<?php
require_once '../../controllers/CommentController.php';
require_once '../../controllers/AuthController.php';

$commentController = new CommentController();
$authController = new AuthController();

if (!$authController->isLoggedIn()) {
    echo "You need to be logged in to comment.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'];
    $content = $_POST['content'];
    $commentController->create($postId, $content);
}
?>

<form method="POST" action="create.php">
    <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($_GET['post_id']); ?>">
    <textarea name="content" required></textarea>
    <button type="submit">Add Comment</button>
</form>
