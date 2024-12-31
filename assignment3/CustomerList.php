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

<?php
/**** Define Useful Variables ****/
$filter = $_GET['search'];
if(isset($_GET['sort']))
  $sort = $_GET['sort']; //Always use the last selected sort

$url = "customer-list.php";
$sorticon = "glyphicon glyphicon-arrow-down";

/**** Database Management ****/

//Main query
$qmain = "SELECT * FROM Customers";

//filter 
if(!empty($filter))
  $qfilter = "WHERE lastName LIKE " . '"' . $filter . '"';

//sortby
switch($sort) {
  case "name":
    $qsort = "ORDER BY LastName";
    break;
  case "city":
    $qsort = "ORDER BY city";
    break;
  case "country":
    $qsort = "ORDER BY country";
    break;
  default:
    $qsort = "ORDER BY LastName"; 
    break;
}

$sqlquery = $qmain . " " . $qfilter . " " . $qsort;
$result = $pdo->query($sqlquery);
$rownum = $result->rowCount();
$customers = array();
        
for($i = 0; $i < $rownum; $i++) {
  $customer = $result->fetch();
  array_push($customers, $customer);
}
?>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading">
            <h4>My Customers <?php if(!empty($filter)) echo "[Last Name = $filter]";?>
              <?php if(!empty($sort)):?>
              <a href="<?php echo $url . '?sort=&search=' . $filter;?>" class="badge badge-danger" style="background-color: brown !important; border-radius: 0 !important;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove Filter</a>
              <?php endif;?>
            </h4>
          </div>
           <table class="table">
             <tr>
                <th><a href="<?php echo $url . '?sort=name&search=' . $filter;?>">Name</a><?php if($sort == "name") echo '<span class="' . $sorticon . '"></span>';?></th>
                <th>Email</th>
                <th>Address</th>
                <th><a href="<?php echo $url . '?sort=city&search=' . $filter;?>">City</a><?php if($sort == "city") echo '<span class="' . $sorticon . '"></span>';?></th>
                <th><a href="<?php echo $url . '?sort=country&search=' . $filter;?>">Country</a><?php if($sort == "country") echo '<span class="' . $sorticon . '"></span>';?></th>
              </tr>
              <?php foreach($customers as $customer): ?>
              <tr>
                <td><?php echo $customer['firstName'] . " " . $customer['lastName'];?></td>
                <td><?php echo $customer['email'];?></td>
                <td><?php echo $customer['address'];?></td>
                <td><?php echo $customer['city'];?></td>
                <td><?php echo $customer['country'];?></td>
              </tr>
              <?php endforeach;?>
           </table>
         </div>           
      </div>
      
      <!--div class="col-md-2">  <!-- start left navigation rail column -->
         <!--div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">

               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">

            </ul>
         </div>         
      <!--/div>  <!-- end left navigation rail --> 


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