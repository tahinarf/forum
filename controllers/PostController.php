<?php
require_once '../models/Post.php';

class PostController {
    private $post;
    private $authController;

    public function __construct() {
        $this->post = new Post();
        $this->authController = new AuthController();
    }

    public function create($title, $content) {
        if ($this->authController->isLoggedIn()) {
            $this->post->create($this->authController->getUserId(), $title, $content);
            header('Location: /forum/public/index.php');
        } else {
            echo "You need to be logged in to create a post.";
        }
    }

    public function show($id) {
        return $this->post->findById($id);
    }

    public function index($limit, $offset) {
        return $this->post->findAll($limit, $offset);
    }

    public function update($id, $title, $content) {
        if ($this->authController->isLoggedIn()) {
            $post = $this->post->findById($id);
            if ($post && $post['user_id'] == $this->authController->getUserId()) {
                $this->post->update($id, $title, $content);
                header('Location: /forum/public/index.php');
            } else {
                echo "You do not have permission to edit this post.";
            }
        }
    }

    public function delete($id) {
        if ($this->authController->isLoggedIn()) {
            $post = $this->post->findById($id);
            if ($post && $post['user_id'] == $this->authController->getUserId()) {
                $this->post->delete($id);
                header('Location: /forum/public/index.php');
            } else {
                echo "You do not have permission to delete this post.";
            }
        }
    }
}
?>
