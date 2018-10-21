<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Flupcoin | Admin</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-custom navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".flupbook-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-custom-brand" href="index.php">
                  <img src="images/Logo.png" class="img-responsive logo" />
                </a>
            </div>
            <div class="collapse navbar-collapse flupbook-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="login"><button type="submit" class="btn-login" onclick="displayProcessedReports()"><a data-toggle="modal" href='#processedReports'> previous reports</a></button></li>
                    <li class="login"><button type="submit" class="btn-login" >Log out</button></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="processedReports">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Processed Reports</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body" id="previousReportsContainerDiv">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="padding-top: 90px;">
        <div class=""row">
            <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2"></div>
            <div class="col-xs-12 col-sm-12 col-ms-8 col-lg-8">
                <div id="dataContainerForAdminDiv">

                </div>
            </div>
        <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2"></div>
    </div>
    </div>
    </body>





<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/functionality.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
