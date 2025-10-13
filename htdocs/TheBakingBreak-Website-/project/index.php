<?php
include 'connect_user.php';

// Fetch products for each section
$bakeware = $conn->query("SELECT * FROM products WHERE category='bakeware'");
$featured = $conn->query("SELECT * FROM products WHERE category='featured'");
$bestsellers = $conn->query("SELECT * FROM products WHERE category='bestseller'");
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Baking Break Private Limited</title>
    <link rel="shortcut icon" href="image/tbbchahiye_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="cart.html">
    <style>
        section {
            margin: auto;
            background-image: url("image/Cake-Wallpaper.jpg");
            background-size: cover;
            justify-content: center;
            width: 90vw;
            height: 500px;
        }

        header {
            background-image: url("image/Screenshot\ \(2\).png");
            width: 100vw;
            height: 550px;
            background-size: cover;
        }

        .icon-cart {
            position: relative;
            display: inline-block;
        }

        .icon-cart svg {
            width: 30px;
            height: 30px;
        }

        .icon-cart svg path {
            stroke: white;
            /* make cart lines white */
        }

        .icon-cart span {
            position: absolute;
            background-color: red;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color: #fff;
            font-size: 12px;
            top: -5px;
            right: -10px;
        }



        .recipe {
            background-image: url("image/recipebg.jpg");
            background-repeat: no-repeat;
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="progressbar"> </div>
    <div class="wearenowavailable1">
        <p class="wearenowavailable2">We are now delivering in Mumbai, Bangalore, Pune, Delhi-NCR and Chennai | Contact Customer Care: 751-777-00-46 | For bulk orders Whatsapp: +91-860-588-6969 </p>
    </div>
    <header>
        <nav>
            <div style="display: flex;">
                <div class="logo"> <a href="https://www.google.com/search?q=the+baking+break&oq=&aqs=chrome.0.35i39i362l8.360970j0j7&sourceid=chrome&ie=UTF-8"> <img src="image/2D-PNG.png" alt="The Baking Break" width="150px" height="120px"> </a>
                </div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="bakecraft.html">Bakecraft</a></li>
                    <li><a href="#bakeware">Bakeware</a></li> <!-- href #bakeware refers to card , same id is given to class name "card"-->
                    <li><a href="ingredients.html">Ingredients</a></li>
                </ul>
            </div>
            <div style="display: flex;">

                <!-- Search Section -->
                <div class="search">
                    <a href="search.html">
                        <input type="text" id="find" placeholder="Search here..." onkeyup="searchProducts()">
                    </a>
                    <button class="btn" onclick="window.location.href='search.html'">Search</button>
                </div>

                <!-- Navigation Icons -->
                <div class="nav-icons">

                    <!-- Login Icon -->
                    <div class="login" style="margin-right: 10px;">
                        <a href="login-form.php" aria-label="Login" class="login-link">
                            <span class="material-symbols-outlined" style="color: white;">account_circle</span>
                        </a>
                        <a href="login-form.php" class="login-btn" id="signupBtn">Sign Up</a>
                    </div>

                    <!-- Shopping Cart Icon -->
                    <div>
                        <a href="cart.html" aria-label="Shopping Cart" class="icon-cart">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                            </svg>
                            <span>0</span>
                        </a>
                    </div>

                    <div class="dropdown">
                        <span class="material-symbols-outlined menu-toggle" id="menuToggle" style="cursor:pointer;">menu</span>
                        <div class="dropdown-content" id="dropdownMenu">
                            <div class="user-info">
                                <p><strong>The Baking Break</strong></p>
                            </div>
                            <hr>
                            <a href="profile.php">Profile</a>
                            <a href="privacy.html">Privacy Policy</a>
                            <a href="services.html">Terms of Service</a>
                            <a href="#foot">Contact</a>
                            <a href="logout.php">Log Out</a>
                        </div>
                    </div>
                </div>

        </nav>
        <p id="header-written1">Every cake has a story to tell</p>
        <p id="header-written2"> Get everything you need for perfect desserts and cakes.</p>
    </header>
    <main>

        <div class="slider">
            <img src="http://source.unsplash.com/random/1200x500/?baking" alt="">
        </div>
        <div class="videos">
            <video controls autoplay loop poster="image/The Baking Break_NAME_PIC.png" src="video/tbbvid.mp4" width="50%" height="auto">
            </video>
        </div>
        <!-- Bakeware Section -->
        <div id="bakeware" class="card">
            <h2 class="my-2">Lets Get Bake Together!</h2>
            <div class="listProduct" style="position: relative;">
                <!-- Left button -->
                <button class="slide-btn left" onclick="slideLeft('bakeware')">&#10094;</button>
                <!-- Right button -->
                <button class="slide-btn right" onclick="slideRight('bakeware')">&#10095;</button>

                <div class="cards" id="bakeware-cards">
                    <?php while ($row = $bakeware->fetch_assoc()): ?>
                        <div class="card-items">
                            <div class="item">
                                <img id="when-card-img-hov" src="image/<?php echo $row['image']; ?>" alt="" width="200px" height="180px">
                                <div class="lines">
                                    <p class="text-center my-1" id="description-style"><?php echo $row['name']; ?></p>
                                    <p class="text-center my-1 price" id="discount">Rs. <?php echo $row['price']; ?></p>
                                    <p class="text-center my-1">Grab Now!</p>
                                    <button class="addCart"
                                        data-id="<?php echo $row['id']; ?>"
                                        data-name="<?php echo $row['name']; ?>"
                                        data-price="<?php echo $row['price']; ?>"
                                        data-image="image/<?php echo $row['image']; ?>">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <!-- Featured Products Section -->
        <div id="featured" class="card">
            <h2 class="my-2">Featured Products</h2>
            <div class="listProduct" style="position: relative;">
                <button class="slide-btn left" onclick="slideLeft('featured')">&#10094;</button>
                <button class="slide-btn right" onclick="slideRight('featured')">&#10095;</button>

                <div class="cards" id="featured-cards">
                    <?php while ($row = $featured->fetch_assoc()): ?>
                        <div class="card-items">
                            <div class="item">
                                <img src="image/<?php echo $row['image']; ?>" alt="" width="200px" height="180px">
                                <div class="lines">
                                    <p class="text-center my-1" id="description-style"><?php echo $row['name']; ?></p>
                                    <p class="text-center my-1 price" id="discount">Rs. <?php echo $row['price']; ?></p>
                                    <p class="text-center my-1">Grab Now!</p>
                                    <button class="addCart"
                                        data-id="<?php echo $row['id']; ?>"
                                        data-name="<?php echo $row['name']; ?>"
                                        data-price="<?php echo $row['price']; ?>"
                                        data-image="image/<?php echo $row['image']; ?>">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="recipe" id="recipes">
            <div class="re">
                <div class="recipes-written">
                    <p>Make amazing cakes</p>
                </div>
                <div class="recipes-written2">
                    <p>More than 70+ recipes available</p>
                </div>
            </div>
            <a href="https://sallysbakingaddiction.com/" style="text-decoration: none;">
                <button class="recipe-button">Our Recipes &rarr; </button>
            </a>
        </div>

        <!-- Best Sellers -->

        <!-- Best Sellers Section -->
        <div id="bestsellers" class="card">
            <h2 class="my-2">Best Sellers</h2>
            <div class="listProduct" style="position: relative;">
                <button class="slide-btn left" onclick="slideLeft('bestsellers')">&#10094;</button>
                <button class="slide-btn right" onclick="slideRight('bestsellers')">&#10095;</button>

                <div class="cards" id="bestsellers-cards">
                    <?php while ($row = $bestsellers->fetch_assoc()): ?>
                        <div class="card-items">
                            <div class="item">
                                <img src="image/<?php echo $row['image']; ?>" alt="" width="200px" height="180px">
                                <div class="lines">
                                    <p class="text-center my-1" id="description-style"><?php echo $row['name']; ?></p>
                                    <p class="text-center my-1 price" id="discount">Rs. <?php echo $row['price']; ?></p>
                                    <p class="text-center my-1">Grab Now!</p>
                                    <button class="addCart"
                                        data-id="<?php echo $row['id']; ?>"
                                        data-name="<?php echo $row['name']; ?>"
                                        data-price="<?php echo $row['price']; ?>"
                                        data-image="image/<?php echo $row['image']; ?>">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>



        <div class="bakersblog">
            <h2 id="bkblog">Bakers Blog</h2>
            <div class="blog">
                <div class="first-row-image">
                    <div class="image1"> <a href="https://sallysbakingaddiction.com/homemade-whipped-cream/">
                            <img src="image/source.unsplash_mixter.jpg" alt="" style="width: 110%; height:90%;"></a>
                        <p>
                        <h2 id="bk-f-row-img-h21">How To Make Whipped Cream For Cake At Home?</h2>
                        </p>
                        <p id="img1">on Sept 11, 2025</p>
                    </div>
                    <div class="image2">
                        <a href="https://en.wikipedia.org/wiki/Whipped_cream" style="text-decoration: none;">
                            <img src="image/heather-ford-Fq54FqucgCE-unsplash.jpg" width="90%" height="250px" alt="">
                            <p>
                                <h2 id="bk-f-row-img-h22">What is Whipping Cream?</h2>
                            </p>
                            <p id="img2">on Sept 09, 2025</p>
                        </a>
                    </div>
                </div>

                <div class="second-row-image">
                    <div class="image3">
                        <img src="image/deva-williamson-pZZJwwNPy2k-unsplash.jpg" width="400px" height="600px" alt="">
                        <p>
                        <h2 id="bk-f-row-img-h23"> Getting into the Festival Season with The Baking Break - Now Everybody can bake</h2>
                        </p>
                        <p id="img3">on Oct 11, 2025</p>
                    </div>
                    <div class="image4">
                        <a href="https://www.thekitchn.com/5-tasty-ways-to-use-leftover-whipped-cream-tips-from-the-kitchn-204828" style="text-decoration: none;">

                            <img src="image/annie-spratt-6SHd7Q-l1UQ-unsplash.jpg" width="600px" height="500px" alt="">
                            <p>
                                <h2 id="bk-f-row-img-h24">5 Creative Ways For How to use whipping cream powder</h2>
                            </p>
                            <p id="img4">on Sept 23, 2025</p>
                        </a>
                    </div>
                    <div class="image5">
                        <img src="image/meritt-thomas-zURPcpLoKA4-unsplash.jpg" width="400px" height="400px" alt="">
                        <p>
                        <h2 id="bk-f-row-img-h25">How to Use The Baking Break Premium Whipping Cream 1 kg & 500 g</h2>
                        </p>
                        <p id="img5">on Oct 12, 2025</p>
                    </div>
                </div>

            </div>
        </div>


        <section>
            <div class="subscribe">
                <div class="sub-written">
                    <h2>We've got a treat for you </h2>
                    <p> Sign up for exclusive offers, recipes, and how-tos by entering your email address</p>
                </div>
                <div class="enter-email-id"> <input type="text" name="searchh" id="search" placeholder="Enter Your Email Address Here">
                    <div class="send">
                        <button class="send-button"> <img src="image/send.png" width="50" height="50" alt="Send Icon"> </button>
                    </div>
                </div>

            </div>
        </section>

        <div class="review">
            <h2>Our Happy Customers</h2>
            <div class="reviews">
                <div class="quotes"><img src="image/quotes.png" width="200px" height="200px" alt=""></div>
                <div class="borderlookalike"><img src="image/borderlookalike.png" width="1000px" height="370px" alt="">
                    <p>The Baking break Fondants are superb, Very light to taste and works wonderfully for creating miniature figurines without cracking. And the Butterscotch aroma flavor has my clients wanting more.</p>
                </div>
                <div class="star"><img src="image/5.png" width="150px" height="80px" alt="">
                    <p>
                    <h5>- Ms. Kavisha Dipakbhai Patel</h5>
                    </p>
                </div>
            </div>
        </div>
        <div class="banner"><img src="image/banner-4.progressive.webp" width="1700px" alt=""></div>
        <div class="line"><img src="image/line-40944.png" width="1600px" height="20px" alt=""></div>
        <div class="information">
            <div class="info">
                <div class="tbbinfo"> <img src="image/The Baking Break_NAME_PIC.png" width="400px" alt="">
                    <div class="tbbexplain">
                        <p>The Baking Break is a one stop solution for all your baking needs. We are all about providing Premium Quality Products at an Affordable Price. We have wide range of baking Utensils, Baking Ingredients, Baking Accessories, Raw materials & Party Decorative Items.</p>
                    </div>
                </div>
                <ul>
                    <h3>Shop</h3>
                    <li>All products</li>
                    <li>Baking ingredients</li>
                    <li>Flavours & colors</li>
                    <li>Premixes</li>
                    <li>Chocolates</li>
                </ul>
                <ul>
                    <h3>Quick Links</h3>
                    <li>Shipping Policy</li>
                    <li>Terms Of Service</li>
                    <li>Refund Policy</li>
                </ul>
                <ul>
                    <h3>Get in touch</h3>
                    <li>+91-860-588-6969</li>
                    <li>www.thebakingbreak@gmail.com</li>
                </ul>
            </div>
            <div class="social">
                <a href="https://www.instagram.com/the_bakingbreak/?utm_medium=copy_link" target="_blank" rel="noopener noreferrer">
                    <img src="image/insta.png" width="30" height="30" alt="Instagram">
                </a>
                <a href="https://www.facebook.com/thebakingbreak/" target="_blank" rel="noopener noreferrer">
                    <img src="image/facebook.png" width="30" height="30" alt="Facebook">
                </a>
                <a href="https://api.whatsapp.com/message/E2O5DRLDU5WLE1?autoload=1&app_absent=0" target="_blank" rel="noopener noreferrer">
                    <img src="image/whatsapp.png" width="30" height="30" alt="WhatsApp">
                </a>
                <a href="mailto:thebakingbreak@gmail.com">
                    <img src="image/gmail.png" width="30" height="30" alt="Email">
                </a>
                <a href="https://mobile.twitter.com/thebakingbreak" target="_blank" rel="noopener noreferrer">
                    <img src="image/twit.png" width="30" height="30" alt="Twitter">
                </a>
                <a href="https://in.linkedin.com/in/thebakingbreak?trk=public_profile_browsemap" target="_blank" rel="noopener noreferrer">
                    <img src="image/linkedin.png" width="30" height="30" alt="LinkedIn">
                </a>
                <p>Made in India</p>
            </div>

            <!-- Horizontal Line -->
            <hr class="divider">

            <!-- Payment Section -->
            <div class="pay">
                <img src="https://cdn.shopify.com/s/files/1/0273/1157/1029/t/3/assets/payment-icons.png?v=68833234360641639431654539718"
                    width="250" alt="Payment Methods">
            </div> <!-- Chat with Us Section -->
            <div class="chat-with-us"> <a href="https://api.whatsapp.com/message/E2O5DRLDU5WLE1?autoload=1&app_absent=0" target="_blank" rel="noopener noreferrer" class="chat-btn">
                    <div class="chat-content">
                        <p>Chat with us</p> <img src="image/chat1.png" title="Chatting option" alt="Chat with us">
                    </div>
                </a>
            </div>
        </div>

    </main>
    <footer class="flex-all-center" id="foot">
        <p> Copyright &copy; 2025 The Baking Break Inc. All rights reserved. </p>
    </footer>
    <script>
        function slideLeft(sectionId) {
            const container = document.getElementById(sectionId + '-cards');
            container.scrollBy({
                left: -250,
                behavior: 'smooth'
            });
        }

        function slideRight(sectionId) {
            const container = document.getElementById(sectionId + '-cards');
            container.scrollBy({
                left: 250,
                behavior: 'smooth'
            });
        }
    </script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const dropdown = document.querySelector('.dropdown');

        menuToggle.addEventListener('click', () => {
            dropdown.classList.toggle('show');
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target) && e.target !== menuToggle) {
                dropdown.classList.remove('show');
            }
        });
    </script>
    <script src="js/user.js"></script>
    <script>
    // Ensure we use the global cart array instead of redefining it
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Add event listeners for all Add to Cart buttons
    document.querySelectorAll(".addCart").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);
            const image = this.dataset.image;

            const index = cart.findIndex(item => String(item.product_id) === String(id));
            if (index >= 0) {
                cart[index].quantity += 1;
            } else {
                cart.push({
                    product_id: id,
                    quantity: 1,
                    name,
                    price,
                    image
                });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartIcon();
            console.log(name + " added to cart!");
        });
    });

    const updateCartIcon = () => {
        // Ensure we are always using the global cart array
        let totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.querySelector(".icon-cart span").innerText = totalQuantity;
    };

    // Call it on page load to sync the icon with stored cart
    document.addEventListener("DOMContentLoaded", () => {
        cart = JSON.parse(localStorage.getItem("cart")) || [];
        updateCartIcon();
    });
</script>

    <script src="js/slider.js"></script>

</body>

</html>