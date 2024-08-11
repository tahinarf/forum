<?php
require_once '../models/Comment.php';

class CommentController {
    private $comment;
    private $authController;

    public function __construct() {
        $this->comment = new Comment();
        $this->authController = new AuthController();
    }

    public function create($postId, $content) {
        if ($this->authController->isLoggedIn()) {
            $this->comment->create($postId, $this->authController->getUserId(), $content);
            header('Location: /forum/public/index.php');
        } else {
            echo "You need to be logged in to comment.";
        }
    }

    public function show($postId) {
        return $this->comment->findByPostId($postId);
    }

    public function update($id, $content) {
        if ($this->authController->isLoggedIn()) {
            $comment = $this->comment->findById($id);
            if ($comment && $comment['user_id'] == $this->authController->getUserId()) {
                $this->comment->update($id, $content);
                header('Location: /forum/public/index.php');
            } else {
                echo "You do not have permission to edit this comment.";
            }
        }
    }

    public function delete($id) {
        if ($this->authController->isLoggedIn()) {
            $comment = $this->comment->findById($id);
            if ($comment && $comment['user_id'] == $this->authController->getUserId()) {
                $this->comment->delete($id);
                header('Location: /forum/public/index.php');
            } else {
                echo "You do not have permission to delete this comment.";
            }
        }
    }
}
?>
