<html>
    
<body>
<?php
//include database connection
include 'config/database.php';
$uname = $_GET['user'];
$bookid = $_GET['bookid'];
    
try {
    // prepare query
    $query = "SELECT pdf FROM books WHERE bookid = ? LIMIT 0,1";
    $query2 = "UPDATE books SET numreaders = numreaders + 1 WHERE bookid = ?";
    $query3 = "INSERT INTO mybooks(user, bookid) VALUES (:uname, :bookid)";

    $stmt = $con->prepare($query);
    $stmt2 = $con->prepare($query2);
    $stmt3 = $con->prepare($query3);
 
    // this is the first question mark
    $stmt->bindParam(1, $bookid);
    $stmt2->bindParam(1, $bookid);
    $stmt3->bindParam(':uname', $uname);
    $stmt3->bindParam(':bookid', $bookid);

    // execute our query
    $stmt->execute();
    $stmt2->execute();
    $stmt3->execute();
    
    
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $bookid = $row['bookid'];
    $pdf = $row['pdf'];
    
    $file = 'pdfs/'.$pdf; 
    $filename = 'pdfs/'.$pdf; 

    $fp = fopen($file, "r") ;
    // Header content type 
    header('Content-type: application/pdf'); 
  
    header('Content-Disposition: inline; filename="' . $filename . '"'); 
  
    header('Content-Transfer-Encoding: binary'); 
  
    header('Accept-Ranges: bytes'); 
    ob_clean();
    flush();
    
    while (!feof($fp)) {
        $buff = fread($fp, 1024);
        print $buff;
    }
    
    exit;
  
}

// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}

?>
    </body>
</html>