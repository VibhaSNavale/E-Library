<!DOCTYPE HTML>
<html>
    <head>
        <title>Book Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/readbook.css"/>
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
                    <a class="nav-link" href="#">My Books</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Genres</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action/Adventure</a>
                            <a class="dropdown-item" href="#">Fiction</a>
                            <a class="dropdown-item" href="#">Horror</a>
                            <a class="dropdown-item" href="#">Mystery</a>
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
        
        <?php
            include 'config/database.php';
            // get passed parameter value, in this case, the record ID
            // isset() is a PHP function used to verify if a value is there or not
            $bookid=isset($_GET['bookid']) ? $_GET['bookid'] : die('ERROR: Record ID not found.');
            $uname = $_GET['user'];
        
            // read current record's data
            try {
                // prepare select query
                $query = "SELECT * FROM books WHERE bookid = ? LIMIT 0,1";

                $stmt = $con->prepare( $query );

                // this is the first question mark
                $stmt->bindParam(1, $bookid);

                // execute our query
                $stmt->execute();

                // store retrieved row to a variable
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // values to fill up our form
                $bookid = $row['bookid'];
                $title = $row['title'];
                $genre = $row['genre'];
                $author = $row['author'];
                $description = $row['description'];
                $numreaders = $row['numreaders'];
                $image = $row['image'];
                $pdf = $row['pdf'];
            }

                // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }

        ?>
        
        <br><br><br>
        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered' style="font-size: 16px; margin: 0 auto; width: 75%; margin-bottom: 10px;">
            <tr>
                <th style="vertical-align: middle; width: 25%">Image</th>
                <td>
                    <?php echo $image ? "<img src='imgs/{$image}' style='width:180px; height: 250px'/>" : "No image found.";  ?>
                </td>
            </tr>
            <tr>
                <th style="vertical-align: middle;">Book Title</th>
                <td><?php echo htmlspecialchars($title, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <th style="vertical-align: middle;">Author</th>
                <td><?php echo htmlspecialchars($author, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <th style="vertical-align: middle;">Genre</th>
                <td><?php echo htmlspecialchars($genre, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <th style="vertical-align: middle;">Description</th>
                <td><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <th style="vertical-align: middle;">Number of views</th>
                <td><?php echo htmlspecialchars($numreaders, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>  
                    <a href='display.php?bookid=<?php echo $bookid; ?>&user=<?php echo htmlspecialchars($uname, ENT_QUOTES); ?>' id='btn-custom'>Read Now</a>

                    <a href='genreMystery.php?user=<?php echo htmlspecialchars($uname, ENT_QUOTES); ?>' id='btn-danger-custom'>Back</a>
                </td>
            </tr>
        </table>
    
    </body>
</html>