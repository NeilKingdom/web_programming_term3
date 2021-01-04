<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html
   charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Book Template</title>

    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <!-- Google fonts used in this theme  -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme CSS -->
    <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->

    <?php
    /*Customer data*/
    $link = "BookRepCRM.php";
    $custArr = array();
    $customers = fopen("customers.txt", "r") or die("Could not locate the file specified");

    while (!feof($customers)) {
        $line = fgets($customers);
        $regexArr = preg_split("/[,]+/", $line); /*Split Strings by comma into array*/
        array_push($custArr, $regexArr);
    }
    fclose($customers);
    ?>
</head>

<body>

    <?php include 'book-header.inc.php'; ?>

    <div class="container">
        <div class="row">
            <!-- start main content row -->

            <div class="col-md-2">
                <!-- start left navigation rail column -->
                <?php include 'book-left-nav.inc.php'; ?>
            </div> <!-- end left navigation rail -->

            <div class="col-md-10">
                <!-- start main content column -->

                <!--Customer Table-->
                <div class="panel panel-danger spaceabove">
                    <div class="panel-heading">
                        <h4>My Customers</h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>University</th>
                            <th>City</th>
                        </tr>

                        <?php foreach ($custArr as $customer) : ?>
                            <tr>
                                <td><?php echo "<a href=" . $link . "?id=" . $customer[0] . ">" . $customer[1] . " " . $customer[2] . "</a>"; ?></td>
                                <td><?php echo $customer[3]; ?></td>
                                <td><?php echo $customer[4]; ?></td>
                                <td><?php echo $customer[6]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!--Info from id-->
                <?php if (isset($_GET['id'])) : ?>
                    <?php
                    /*All order data*/
                    $orderArr = array();
                    $custOrders = fopen("orders.txt", "r") or die("Could not locate the file specified");

                    while (!feof($custOrders)) {
                        $line = fgets($custOrders);
                        $regexArr = preg_split("/[,]+/", $line); /*Split Strings by comma into array*/
                        array_push($orderArr, $regexArr);
                    }
                    fclose($custOrders);

                    /*Customer order data*/
                    $id = $_GET['id'];
                    $custName;
                    $selectedOrders = array(); /*Array containing all orders for customer with matching id*/
                    foreach ($custArr as $customer) {
                        if ($customer[0] == $id) {
                            $custName = $customer[1] . " " . $customer[2];
                            foreach ($orderArr as $order) {
                                if ($order[1] == $id) { /*Matching ids means order belongs to customer*/
                                    array_push($selectedOrders, $order);
                                }
                            }
                            break;
                        }
                    }
                    ?>

                    <!--Order Table -->
                    <?php if (count($selectedOrders) > 0) : ?>
                        <div class="panel panel-danger spaceabove">
                            <div class="panel-heading">
                                <h4>Orders for <?php echo $custName; ?></h4>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                </tr>
                                <?php foreach ($selectedOrders as $order) : ?>
                                    <tr>
                                        <td><?php echo $order[2]; ?></td>
                                        <td><?php echo "<a href=''>" . $order[3] . "</a>"; ?></td>
                                        <td><?php echo end($order); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                    <?php if (count($selectedOrders) == 0) : ?>
                        <div class="panel panel-danger spaceabove" style='padding: 15px; border: solid rgba(0,0,0,0.1) 1px;'>
                            No orders for that customer
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div> <!-- end main content column -->
        </div> <!-- end main content row -->
    </div> <!-- end container -->

    <!-- Bootstrap core JavaScript
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
    <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>