<?php include '../views/partials/header.php'; ?>

<form method="POST" action="/forum/controllers/AuthController.php?action=register">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<?php include '../views/partials/footer.php'; ?>
