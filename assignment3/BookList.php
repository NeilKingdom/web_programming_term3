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

      <div class="col-md-6">  <!-- start main content column -->

        <?php
        /**** Define Useful Variables ****/
        $cat = $_GET['cat'];
        $imp = $_GET['imp'];
        $stat = $_GET['stat'];
        $bind = $_GET['bind'];
        $main_url = "book-list.php";
        $details_url = "book-details.php";

        /**** Database Management ****/

        //Options for main
        if(!empty($cat)) 
          $qoption = "WHERE SubcategoryID = " . $cat;
        else if(!empty($imp))
          $qoption = "WHERE ImprintID = " . $imp;
        else if(!empty($stat))
          $qoption = "WHERE ProductionStatusID = " . $stat;
        else if(!empty($bind))
          $qoption = "WHERE BindingTypeID = " . $bind;
        
        //Main query
        $qmain = "SELECT * FROM Books " . $qoption . " ORDER BY Title";
        $result = $pdo->query($qmain);
        $rownum = $result->rowCount();
        $books = array();

        for($i = 0; $i < $rownum; $i++) {
            $book = $result->fetch();
            array_push($books, $book);
        }

        //Categories subpanel query
        $qcategories = "SELECT * FROM Subcategories ORDER BY SubcategoryName LIMIT 20";
        $result = $pdo->query($qcategories);
        $rownum = $result->rowCount();
        $categories = array();
        
        for($i = 0; $i < $rownum; $i++) {
            $category = $result->fetch();
            array_push($categories, $category);
        }

        //Imprints subpanel query
        $qimprints = "SELECT * FROM Imprints ORDER BY Imprint";
        $result = $pdo->query($qimprints);
        $rownum = $result->rowCount();
        $imprints = array();
        
        for($i = 0; $i < $rownum; $i++) {
            $imprint = $result->fetch();
            array_push($imprints, $imprint);
        }

        //Status subpanel query
        $qstatuses = "SELECT * FROM ProductionStatuses ORDER BY ProductionStatus";
        $result = $pdo->query($qstatuses);
        $rownum = $result->rowCount();
        $statuses = array();
        
        for($i = 0; $i < $rownum; $i++) {
            $status = $result->fetch();
            array_push($statuses, $status);
        }

        //Binding subpanel query
        $qbindings = "SELECT * FROM BindingTypes ORDER BY BindingType";
        $result = $pdo->query($qbindings);
        $rownum = $result->rowCount();
        $bindings = array();
       
        for($i = 0; $i < $rownum; $i++) {
            $binding = $result->fetch();
            array_push($bindings, $binding);
        }
        ?>
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading">
           <h4>Catalog 
            <?php 
              if(!empty($cat)) 
                echo " [Category = $cat]";
              else if(!empty($imp))
                echo " [Imprint = $imp]";
              else if(!empty($stat))
                echo " [Status = $stat]";
              else if(!empty($bind))
                echo " [Binding = $bind]";
            ?>
              <?php if(!empty($cat) || !empty($imp) || !empty($stat) || !empty($bind)):?>
              <a href="<?php echo $main_url;?>" class="badge badge-danger" style="background-color: brown !important; border-radius: 0 !important;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove Filter</a>
              <?php endif;?>
            </h4>
           </div>
           <table class="table">
             <tr>
               <th>Cover</th>
               <th>ISBN</th>
               <th>Title</th>
             </tr>
             <?php foreach($books as $book): ?>
              <tr>
                <td><img src="<?php echo 'images/tinysquare/' . $book['ISBN10'] . '.jpg';?>"></td>
                <td><?php echo $book['ISBN10'];?></td>
                <td><a href="<?php echo $details_url . '?id=' . $book['ID'];?>"><?php echo $book['Title'];?></a></td>
              </tr>
              <?php endforeach;?>
           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">
                <?php foreach($categories as $category): ?>
                  <li><a href="<?php echo $main_url . '?cat=' . $category['ID'];?>"><?php echo $category['SubcategoryName'];?></a></li>
                <?php endforeach;?>
             </ul> 
         </div>
                 
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
             <?php foreach($imprints as $imprint): ?>
                <li><a href="<?php echo $main_url . '?imp=' . $imprint['ID'];?>"><?php echo $imprint['Imprint'];?></a></li>
              <?php endforeach;?>
             </ul>
         </div>    

         <div class="panel panel-info">
            <div class="panel-heading"><h4>Status</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php foreach($statuses as $status): ?>
                 <li><a href="<?php echo $main_url . '?stat=' . $status['ID'];?>"><?php echo $status['ProductionStatus'];?></a></li>
               <?php endforeach;?>
             </ul>
         </div>  
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Binding</h4></div>
            <ul class="nav nav-pills nav-stacked">
              <?php foreach($bindings as $binding): ?>
                 <li><a href="<?php echo $main_url . '?bind=' . $binding['ID'];?>"><?php echo $binding['BindingType'];?></a></li>
              <?php endforeach;?>
             </ul>
         </div>           
      </div>  <!-- end left navigation rail -->       


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