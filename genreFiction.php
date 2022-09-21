<!DOCTYPE html>
<html>
<?php
    include 'config/database.php';
    $uname=$_GET['user'];    
?>
    <head>
        <meta charset="utf-8">
        <title>Fiction</title>
        <link rel="stylesheet" href="css/home.css"/>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="css/footer.css"/>
        <link rel="stylesheet" href="css/swiper.min.css"/>
        <script src="js/swiper.min.js"></script>
        <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <script src="js/swiper-bundle.min.js"></script> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body>    
        
        <div>      
            <nav class="navbar navbar-expand-md navbar-custom fixed-top">
              <a class="navbar-brand" href="home.php?user=<?php echo $uname; ?>"> BOOK<span style="color:#76CC20">WORM</span></a>
              <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="mybooks.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">My Books</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Genres</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="genreActionAdventure.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">Action/Adventure</a>
                            <a class="dropdown-item" href="genreFiction.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">Fiction</a>
                            <a class="dropdown-item" href="genreHorror.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">Horror</a>
                            <a class="dropdown-item" href="genreMystery.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">Mystery</a>
                        </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>">About</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>  
            </nav>
        </div>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                
                <div class="swiper-slide">
                    <div class="card">
                        <div class="sliderText">
                            <h3>The 3 mistakes of my life</h3>
                        </div>
                        <div class="content">
                            <?php 
                                $query = "SELECT image FROM books WHERE bookid=4";
                            
                                $stmt = $con->prepare($query);
                                $stmt->execute();
                            
                            
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                extract($row);
                                
                                echo "<img style='width:180px; height:225px;' src='imgs/$image'/>";
                                echo "<a href='Freadbook.php?bookid=4&user=$uname'>Read More...</a>";
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="swiper-slide">
                    <div class="card">
                        <div class="sliderText">
                            <h3>The monk who sold his Ferrari</h3>
                        </div>
                        <div class="content">
                            <?php 
                                $query = "SELECT image FROM books WHERE bookid=5";
                            
                                $stmt = $con->prepare($query);
                                $stmt->execute();
                            
                            
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                extract($row);
                                
                                echo "<img style='width:180px; height:225px;' src='imgs/$image'/>";
                                echo "<a href='readbook.php?bookid=5&user=$uname'>Read More...</a>";
                            ?>
                        </div>
                    </div>
                </div>
                
            </div></div>
        <br><br><br><br><br><br>

        
        <!-- footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <p style="font-family: 'Copperplate'; font-size: 28px">BookWorm</p>
                    <p style="font-family: 'Times New Roman', Times, Serif; font-size: 20px">BookWorm is a depiction of an online library website which allows users to read books of their choice.<br>
                    The website has various genres to pick from and the user can also view the books he/she has previously read.</p>
                
                    <div class="contact">
                        <span><i class="icon-phone">&nbsp; 987-654-3210 &nbsp;</i></span>
                        <span><i class="icon-envelope">&nbsp; contact.us@bookworm.com</i></span>
                    </div>
                    
                </div>
                
                
                <div class="footer-section links">
                    <p style="font-family: 'Copperplate'; font-size: 28px; ">Quick Links</p>
                    <ul>
                        <a href="mybooks.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>My Books</li></a>
                        <a href="genreActionAdventure.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>Action/Adventure books</li></a>
                        <a href="genreFiction.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>Fiction books</li></a>
                        <a href="genreHorror.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>Horror books</li></a>
                        <a href="genreMystery.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>Mystery books</li></a>
                    </ul>
                </div>

            </div>
            <div class="footer-bottom">
                &copy; bookworm.com | Designed by Vibha S Navale and V. Harshitha
            </div>
        </div>
        
        
        
        
        
        
        
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            initialSlide: 0,
            coverflowEffect: {
                rotate: 30,
                stretch: 0,
                depth: 500,
                modifier: 1,
                slideShadows: true,

            },
            pagination: {
                el: '.swiper-pagination',
            },
            }); 
        </script>
        
    </body>
</html>