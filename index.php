<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
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

    <!-- Carousel Section -->
    <section id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="path/to/your/image1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide 1</h5>
                    <p>Welcome to our shopping website!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="path/to/your/image2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide 2</h5>
                    <p>Discover the best products at unbeatable prices.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="path/to/your/image3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide 3</h5>
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

    <!-- Featured Products Section -->
    <section id="featured-products" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Products</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="path/to/your/product1.jpg" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product 1</h5>
                            <p class="card-text">$100.00</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="path/to/your/product2.jpg" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <p class="card-text">$150.00</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="path/to/your/product3.jpg" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product 3</h5>
                            <p class="card-text">$200.00</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Products</h2>
            <input type="text" id="search" class="form-control mb-4" placeholder="Search for products...">
            <div class="product-list row">
                <!-- Products will be dynamically loaded here -->
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

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Testimonials</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Great shopping experience! The products are amazing and the service is top-notch."</p>
                            <h5 class="card-title">- John Doe</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Fast delivery and excellent customer support. Highly recommend this store!"</p>
                            <h5 class="card-title">- Jane Smith</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Quality products at great prices. Will definitely shop here again."</p>
                            <h5 class="card-title">- Sarah Lee</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
        <div class="footer-icons">
    <a href="#"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
</div>

            <p>&copy; 2025 Shopping Website. All Rights Reserved.</p>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>