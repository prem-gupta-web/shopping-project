<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Save feedback to the database or send it via email
    // For simplicity, we'll just display a thank you message
    echo "Thank you for your feedback, $name!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header bg-dark text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php"><h1 class="h3">Shopping Website</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="location.php">Our Location</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cart">Cart</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <h2>We Value Your Feedback</h2>
            <form method="POST" action="">
                <label>Name:</label>
                <input type="text" name="name" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Message:</label>
                <textarea name="message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
</body>
</html>