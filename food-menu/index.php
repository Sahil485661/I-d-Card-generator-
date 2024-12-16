<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Menu App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-image: url('https://images.unsplash.com/photo-1495195129352-aeb325a55b65?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        #navbar-header {
            position: fixed;
            top: 0;
            width: 100%;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .home-container {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 1100px;
            color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 40px;
            text-shadow: 2px 2px rgb(100, 100, 100);
            background-color: rgba(0, 0, 0, 0.4);
            margin-top: 50px;
        }

        .home-container > img {
            width: 150px;
        }

        .home-container > h1 {
            font-size: 90px;
            font-weight: bold;
        }

        .home-container > p {
            font-size: 25px;
        }

        .contact-us-container {
            width: 1100px;
            color: rgb(255, 255, 255);
            text-shadow: 2px 2px rgb(100, 100, 100);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            margin-top: 64px;
        }

        .contact-container > div {
            padding: 30px;
        }

        .details-container {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 50px;
        }

        .details-container > p {
            margin: 10px;
        }

        .details-container > h6 {
            margin: 25px;
        }

        .social {
            margin: 10px 35px;
        }
        
        .social > i {
            font-size: 25px;
            margin-right: 15px;
        }

        .form-container {
            padding: 50px;
        }

        .food-menu-container {
            display: flex;
            flex-direction: column;
            width: 1200px;
            height: 720px;
            margin-top: 50px;
            color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .menus {
            display: flex;
            flex-wrap: wrap;
            overflow: auto;
        }

        .card {
            margin: 19px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar-header">
        <a class="navbar-brand ml-3" href="#">Online Food Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#foodMenu">Food Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactUs">Contact Us</a>
                </li>
            </ul>
            
            <a class="nav-link ml-auto" href="./admin.php" style="color: rgb(255, 255, 255);">Admin Area</a>
        </div>
    </nav>      
    
    <div class="main">

        <div data-spy="scroll" data-target="#navbar-header" data-offset="0">

            <section id="home">
            <div class="home-container row">
                <img src="https://cdn-icons-png.flaticon.com/128/3575/3575860.png" alt="">
                <h1>Welcome to Online Food Menu</h1>
                <p>Explore a world of culinary delights with our Food Menu app. Whether you're a food enthusiast or a restaurant owner, our platform is designed to enhance your dining experience. Discover a diverse range of dishes, from savory classics to innovative creations, curated to satisfy every palate. Join us on a gastronomic journey where flavor meets convenience, and let Food Menu redefine the way you experience food.</p>
            </div>
            </section>

            <section id="foodMenu">
                <div class="food-menu-container">
                    <h1 class="text-center">Our Food Menu</h1>

                    <div class="menus">

                        <?php 
                            
                            include('conn/conn.php');

                            $stmt = $conn->prepare("SELECT * FROM `tbl_menu`");
                            $stmt->execute();

                            $result = $stmt->fetchAll();

                            foreach($result as $row) {
                                $image = $row['image'];
                                $menuName = $row['menu_name'];
                                $price = $row['price'];
                                $description = $row['description'];
                                ?>


                            <div class="card" style="width: 15rem; background-color:rgba(0,0,0,0.5);" >
                                <img src="images/<?= $image ?>" class="card-img-top" alt="..." style="height:150px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $menuName ?></h5>
                                    <p class="card-text">Description: <?= $description ?></p>
                                </div>
                                <div class="card-footer">
                                    Price: <?= $price ?>
                                </div>
                            </div>

                                <?php
                            }
                        ?>

                    </div>
                </div>
            </section>

            <section id="contactUs">
                <div class="contact-us-container row">

                <div class="details-container col-6">
                    <h1>Contact Us</h1>
                    <p>Have questions, feedback, or just want to say hello? We'd love to hear from you! Reach out to us through the following channels:</p>

                    <h6><span><i class="fa-solid fa-envelope"></i></span> Email: info@foodmenuapp.com</h6>

                    <h6><span><i class="fa-solid fa-phone"></i></span> Phone: +1 (555) 123-4567</h6>

                    <h6><span><i class="fa-solid fa-location-dot"></i></span> Address: 123 Main Street, Cityville, State, 12345m</h6>

                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-square-instagram"></i>
                    </div>
                </div>

                <div class="form-container col-6">
                    <form action="./send-message.php" method="POST">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark form-control">Send Message -></button>
                    </form>
                </div>


            </section>


    </div>

    <!-- Bootstrap JS -->
    <!-- Replace the slim version with the full version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            // Add active class to navbar links on click
            $(".navbar-nav a").on("click", function(){
                $(".navbar-nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });
        });
    </script>
</body>
</html>
