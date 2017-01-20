<?php
    require_once('../includes/connect.php');     // Connection Script
    require_once('../includes/settings.php');       // Setting Script

    $participants_query = mysqli_query($connect_site,"SELECT * FROM participants WHERE deleted=0 ORDER BY lastName") 
    or die("Can not query the TABLE! " . mysqli_error($connect_site)); // global of all participants in the database
    $waitlist_query = mysqli_query($connect_site,"SELECT * FROM waitlist WHERE deleted=0 AND accepted=0") 
    or die("Can not query the TABLE! " . mysqli_error($connect_site)); // global of all waitlisted participants in the database
    $volunteers_query = mysqli_query($connect_site,"SELECT * FROM volunteers WHERE deleted=0 ORDER BY lastName") 
    or die("Can not query the TABLE! " . mysqli_error($connect_site)); // global of all volunteers in the database

if(isset($_GET['id']))
{
 	$action = $_GET['id'];
}
else
{
	$action = NULL;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SITE @UIUC</title>
    <link rel="shortcut icon" type="image/x-icon" href="../views/images/ec.png" />

    <!-- Bootstrap -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../views/css/datatables.min.css" rel="stylesheet">
    <link href="../views/css/admin.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,300,400italic,400,700' rel='stylesheet' type="text/css">

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="10">
    <!--BEGIN PAGE LOADER-->
    <div id="page-loader"></div>
    <!--END PAGE LOADER-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-top-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Site @uiuc</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-top-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="?id=db">Database</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?

switch($action)
{
    case "db":
        include "database-tables.php";  
        break;
    default:
        include "database-tables.php";  
        break;
}

?>





   <!-- Footer -->
    <footer id="contact" class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        Copyright &copy; SITE 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../views/js/bootstrap.min.js"></script>
    <script src="../views/js/jquery.validate.min.js"></script>
    <script src="../views/js/datatables.min.js"></script>
    <script src="../views/js/admin.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      

</body>
</html>