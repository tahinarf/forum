<?php
require_once '../../controllers/CommentController.php';
require_once '../../controllers/AuthController.php';

$commentController = new CommentController();
$authController = new AuthController();

if (!$authController->isLoggedIn()) {
    echo "You need to be logged in to edit a comment.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['id'];
    $content = $_POST['content'];
    $commentController->update($commentId, $content);
} else {
    $commentId = $_GET['id'];
    $comment = $commentController->show($commentId);
    if ($comment['user_id'] !== $authController->getUserId()) {
        echo "You do not have permission to edit this comment.";
        exit;
    }
}
?>

<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($comment['id']); ?>">
    <textarea name="content" required><?php echo htmlspecialchars($comment['content']); ?></textarea>
    <button type="submit">Update Comment</button>
</form>
