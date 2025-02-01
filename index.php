<?php
session_start();
include 'config.php';
include 'cart.php';

$cart = new Cart();

// Fetch products from the database
$result = $conn->query("SELECT * FROM products");

// Handle Add to Cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = 1; // Default quantity
    $cart->addProduct($productId, $quantity);
    header("Location: cart-view.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All To All Mobile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header bg-dark text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php"><h1 class="h3">All To All Mobile</h1></a>
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
                        <li class="nav-item"><a class="nav-link" href="cart-view.php">Cart</a></li>
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

    <!-- Carousel Section -->
<section id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/1.jpg" class="d-block w-100" >
            <div class="carousel-caption d-none d-md-block">
              <p>Welcome to our All To All Mobile!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/2.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
              <p>Discover the best products at unbeatable prices.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/3.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                 <p>Enjoy a seamless shopping experience.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

   
    <!-- Products Section -->
           
    <section id="products" class="products-section">
          <div class="container">
          <h2 class="section-title">Our Products</h2>
          <div class="products-container">           
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                            <div class="product-content">
                                <h5 class="product-title"><?php echo $row['name']; ?></h5>
                                <p class="product-description"><?php echo $row['description']; ?></p>
                                <p class="product-price"><strong>$<?php echo $row['price']; ?></strong></p>
                                <a href="#" class="btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>



    <!-- Cart Section -->
    <section id="cart" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Cart</h2>
            <div class="cart-list">
                <!-- Cart items will be dynamically added here -->
            </div>
            <div class="cart-total text-end">
                <h5>Total: $<span id="cart-total">0</span></h5>
            </div>
            <div class="text-center">
                <a href="checkout.php" class="btn btn-success">Checkout</a>
            </div>
        </div>
    </section>

    <!-- review section  -->
    <section class="customer-review-section">
    <h2 class="review-heading">What Our Customers Say</h2>
    <div class="review-carousel">
        <div class="review-card">
            <img src="images/man3.jpg" alt="Customer 1" class="customer-photo">
            <p class="review-text">"The product quality is outstanding! I’m very happy with my purchase."</p>
            <h4 class="customer-name">- sambhav</h4>
        </div>
        <div class="review-card">
            <img src="images/man6.jpg" alt="Customer 2" class="customer-photo">
            <p class="review-text">"Excellent service and fast delivery. Highly recommend this store!"</p>
            <h4 class="customer-name">- rahul </h4>
        </div>
        <div class="review-card">
            <img src="images/man4.jpg" alt="Customer 3" class="customer-photo">
            <p class="review-text">"Loved the variety of options and the helpful customer support team."</p>
            <h4 class="customer-name">- abhishek</h4>
        </div>
    </div>
</section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
        <p class="social-description">Stay connected with us on social media:</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100091625616068" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/premguptaa_?utm_source=qr" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>&copy; 2025 Shopping Website. All Rights Reserved.</p>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
