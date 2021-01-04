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
         <div class="row">
            <div class="col-md-6">
               <div class="panel panel-danger spaceabove">           
                 <div class="panel-heading"><h4>Customers</h4></div>
                 <div class="panel-body">
                     <p>See list of active customers</p>
                     <a class="btn btn-default btn-lg" href="customer-list.php" role="button">
                     <span class="glyphicon glyphicon-user"></span> View Customer List</a>
                 </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="panel panel-danger spaceabove">           
                 <div class="panel-heading"><h4>Book Catalog</h4></div>
                 <div class="panel-body">
                     <p>See list of books in the catalog</p>
                     <a class="btn btn-default btn-lg" href="book-list.php" role="button">
                     <span class="glyphicon glyphicon-book"></span> View Book Catalog</a>
                 </div>
               </div>
            </div>            
         </div>
         <div class="well well-sm">
         This assignment was created by <em>Neil Kingdom</em>
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