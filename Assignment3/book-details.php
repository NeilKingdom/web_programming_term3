<?php
$host = "localhost";
$username = "ujpqq52kmqujz";
$password = "#ru+57d#@c_B";
$database = "db7myppy8sfadw";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-10">  <!-- start main content column -->

          <?php
          /**** Define Useful Variables ****/
          $bookid = $_GET['id'];
          $filter = $_GET['search'];
          $url = "book-details.php";

          /**** Database Management ****/

          //Main query
          $sqlquery = "SELECT * FROM Books WHERE ID = " . $bookid;
          $result = $pdo->query($sqlquery);
          $rownum = $result->rowCount();
          $book = $result->fetch();

          //Special queries
          $qauthors = "SELECT FirstName, LastName FROM Authors JOIN BookAuthors ON Authors.ID=BookAuthors.AuthorId JOIN Books ON BookAuthors.BookId=Books.ID WHERE Books.ID = " . $bookid;
          $result = $pdo->query($qauthors);
          $rownum = $result->rowCount();
          $authors = array();

          for($i = 0; $i < $rownum; $i++) {
            $author = $result->fetch();
            array_push($authors, $author);
          }
          
          $qcategories = "SELECT SubcategoryName FROM Subcategories JOIN Books ON Subcategories.ID=Books.SubcategoryID  WHERE Books.ID = " . $bookid;
          $result = $pdo->query($qcategories);
          $category = $result->fetch();

          $qimprints = "SELECT Imprint FROM Imprints JOIN Books ON Imprints.ID=Books.ImprintID WHERE Books.ID = " . $bookid;
          $result = $pdo->query($qimprints);
          $imprint = $result->fetch();

          $qbindingtype = "SELECT BindingType FROM BindingTypes JOIN Books ON BindingTypes.ID=Books.BindingTypeID WHERE Books.ID = " . $bookid;
          $result = $pdo->query($qbindingtype);
          $binding = $result->fetch();

          $qprodstat = "SELECT ProductionStatus FROM ProductionStatuses JOIN Books ON ProductionStatuses.ID=Books.ProductionStatusID WHERE Books.ID = " . $bookid;
          $result = $pdo->query($qprodstat);
          $productstat = $result->fetch();

          $qtimestamp = "SELECT DATE(LatestInstockDate) FROM Books WHERE ID = " . $bookid;
          $result = $pdo->query($qtimestamp);
          $date = $result->fetch();
          ?>
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>Book Details</h4></div>
           
           <table class="table">
             <tr>
               <th>Cover</th>
               <td><img src="<?php echo 'images/tinysquare/' . $book['ISBN10'] . '.jpg';?>"></td>
             </tr>            
             <tr>
               <th>Title</th>
               <td><em><?php echo $book['Title'];?></em></td>
             </tr>    
             <tr>
               <th>Authors</th>
               <td><?php foreach($authors as $author) echo $author['FirstName'] . " " . $author['LastName'] . "<br>";?></td>
             </tr>   
             <tr>
               <th>ISBN-10</th>
               <td><?php echo $book['ISBN10'];?></td>
             </tr>
             <tr>
               <th>ISBN-13</th>
               <td><?php echo $book['ISBN13'];?></td>
             </tr>
             <tr>
               <th>Copyright Year</th>
               <td><?php echo $book['CopyrightYear'];?></td>
             </tr>   
             <tr>
               <th>Instock Date</th>
               <td><?php echo $date['DATE(LatestInstockDate)'];?></td>
             </tr>              
             <tr>
               <th>Trim Size</th>
               <td><?php echo $book['TrimSize'];?></td>
             </tr> 
             <tr>
               <th>Page Count</th>
               <td><?php echo $book['PageCountsEditorialEst'];?></td>
             </tr> 
             <tr>
               <th>Description</th>
               <td><?php echo $book['Description'];?></td>
             </tr> 
             <tr>
               <th>Sub Category</th>
               <td><?php echo $category['SubcategoryName'];?></td>
             </tr>
             <tr>
               <th>Imprint</th>
               <td><?php echo $imprint['Imprint'];?></td>
             </tr>   
             <tr>
               <th>Binding Type</th>
               <td><?php echo $binding['BindingType'];?></td>
             </tr> 
             <tr>
               <th>Production Status</th>
               <td><?php echo $productstat['ProductionStatus'];?></td>
             </tr>              
           </table>

         </div>           
      </div>



      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>