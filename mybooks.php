<!DOCTYPE html>
<?php
    include 'config/database.php';
    $uname = $_GET['user'];
?>

<html>
    
    <head>
        <title>My Books</title>
        <link rel="stylesheet" href="css/home.css"/>
        <link rel="stylesheet" href="css/footer.css"/>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <style>
            
            .m-r-1em{ margin-right:1em; }
            .m-b-1em{ margin-bottom:1em; }
            .m-l-1em{ margin-left:1em; }
            .mt0{ margin-top:0; }
            
            .mybooks-container {
                text-align: center;
            }
            table {
                background-color: #fff;
                margin: 0 auto;
            }
            .mybooks-img {
                background-image: url(img/mybooksbg.jpg);
                background-size: 100% 99vh;
                height: 100vh;
                margin-top: 55px;
            }
            .btn-custom {
                background-color: #6C757D;
                color: #fff;
                padding: 10px;
                font-size: 1.05em;
                border-radius: 10px;
                text-transform: uppercase;
                box-shadow: 2px 2px 1px 1px #ddd;
            }
            .btn-custom:hover {
                background-color: #fff;
                color: #6C757D;
                transition: all 0.8s ease-out;
                box-shadow: 2px 2px 1px 1px #6C757D;
            }
            
            @media screen and (max-width: 1045px) and (min-width: 835px) {
                .priority-2 {
                    display: none;
		        }
                .ColWidth {
                    width: 100vw;
                }   
		          
	       }
            
            @media screen and (max-width: 834px) {
                .priority-1 {
                    display: none;
		        }
		        .priority-2 {
			        display: none;
		        }
                .ColWidth {
                    width: 100vw;
                }   
            }
            
        </style>
               
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
        
        
        <div class="mybooks-container">
            <div class="mybooks-img">
                
            <?php
                
                $query = "SELECT * FROM mybooks, books WHERE mybooks.bookid=books.bookid AND mybooks.user=:uname";

                $stmt = $con->prepare($query);
                $stmt->bindParam(":uname", $uname);
                $stmt->execute();

                // this is how to get number of rows returned
                $num = $stmt->rowCount();

                //check if more than 0 record found
                if($num > 0){

                    echo "<br><br><table class='table table-hover table-responsive table-bordered' style='font-size: 16px; margin:0 auto; width: 72%; margin-bottom: 20px; height:75vh;'>"; //start table

                    //creating our table heading
                    echo "<tr>";
                        echo "<th class='text-center ColWidth'>Image</th>";
                        echo "<th class='priority-1 ColWidth'>Book Title</th>";
                        echo "<th class='priority-2'>Genre</th>";
                        echo "<th class='priority-2'>Author Name</th>";
                        echo "<th class='priority-2'>No. of user views</th>";
                        echo "<th class='ColWidth'>Action</th>";
                    echo "</tr>";

                // retrieve our table contents
                // fetch() is faster than fetchAll()
                // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    // extract row
                    // this will make $row['firstname'] to
                    // just $firstname only
                    extract($row);

                    // creating new table row per record

                    echo "<tr>";
                        echo "<td align='center'><img style='width: 140px; height:180px'src='imgs/$image'/></td>";
                        echo "<td class='priority-1'>{$title}</td>";
                        echo "<td class='priority-2'>{$genre}</td>";
                        echo "<td class='priority-2'>{$author}</td>";
                        echo "<td class='priority-2'>{$numreaders}</td>";
                        echo "<td>";
                            // read one record 
                            echo "<a href='display.php?bookid={$bookid}&user=$uname' class='btn btn-info m-r-1em'>Read Again</a>";
                        echo "</td>";

                    echo "</tr>";

                }

                // end table
                echo "</table>";
                echo "<a href='home.php?user=$uname' class='btn-custom m-r-1em'>Home</a>";   

                }

                // if no records found
                else{
                    echo "<div class='alert alert-danger'>No books found.</div>";
                }
            ?>

        </div>
    </div>        
        
        
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
                    <p style="font-family: 'Copperplate'; font-size: 28px;">Quick Links</p>
                    <ul>
                        <a href="home.php?user=<?php echo $uname ?>"><li>Home</li></a>
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