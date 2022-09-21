<html>
<?php
    include 'config/database.php';
    $uname=$_GET['user'];    
?>
    <head>
        <title>About</title>        
        <link rel="stylesheet" href="css/about.css"/>
    </head>
    
    <body>
        <div class="page-wrapper">
            <div class="container">
                <img src="img/aboutBackground.jpg">  
                <div class="centered">
                    <span>A</span>
                    <span>B</span>
                    <span>O</span>
                    <span>U</span>
                    <span>T</span>
                    <br>
                    <span>U</span>
                    <span>S</span>
                </div>
            </div>
            <div class="wrapper">
                <img id="aboutimg" src="img/about.jpg"/>
                <p id="heading">We are the <code style="color: 3A8FF0; font-size: 30px">&lt;DEVELOPERS/&gt;</code> of BookWorm website</p>
                <p>This website was designed by: <br><i> Vibha S Navale</i> and <i>V. Harshitha</i></p>

                <p><b><i><u>BookWorm</u></i></b> is an online library website. This WTA Mini Project was designed using <code>&lt;HTML&gt;</code>, <code>CSS</code> and <code>Bootstrap</code>. It also uses <code>PHP</code>.</p> 

            </div> 
            <hr><hr>
            <p style="float: none">You can reach out to us by sending us an email to: <br>
                <i>vibha.navale11@gmail.com </i> <b>or</b> <i> harshithav99@gmail.com </i></p>

        </div>
        
        
        <!-- footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <p style="font-family: 'Copperplate'; font-size: 30px">BookWorm</p>
                    <p style="font-family: 'Times New Roman', Times, Serif; font-size: 18px">BookWorm is a depiction of an online library website which allows users to read books of their choice.<br>
                    The website has various genres to pick from and the user can also view the books he/she has previously read.</p>
                
                    <div class="contact">
                        <span><i class="icon-phone">&nbsp; 987-654-3210 &nbsp;</i></span>
                        <span><i class="icon-envelope">&nbsp; contact.us@bookworm.com</i></span>
                    </div>
                </div>
                
            
                <div class="footer-section links">
                    <p style="font-family: 'Copperplate'; font-size: 30px;">Quick Links</p>
                    <ul>
                        <a href="home.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES);  ?>"><li>Home</li></a>
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
        
        
        
        
    </body>
    

</html>