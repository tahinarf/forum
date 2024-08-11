<?php include '../views/partials/header.php'; ?>

<form method="POST" action="/forum/controllers/AuthController.php?action=login">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php include '../views/partials/footer.php'; ?>
