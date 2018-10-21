<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flupcoin | Newsfeed</title>

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
<nav class=" navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#flupbook-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-custom-brand" href="index.php">
                <img src="images/Logo.png" class="img-responsive logo" />
            </a>
        </div>
        <div class="collapse navbar-collapse" id="flupbook-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="login"><button type="button" class="btn-login"><a href="logout.php">Log out</a></button></li>
            </ul>
        </div>
    </div>
    </div>
</nav>
<div class=" visible-xs visible-sm">
    <ul>
        <li><a class="panel-tabs" href="#dataContainerDiv" class="sidebar" aria-controls="dataContainerDiv" role="tab" data-toggle="tab" onclick="displayAllData()"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Biofeed</a></li>
        <li><a class="panel-tabs" href="#nearest" class="sidebar" aria-controls="nearest" role="tab" data-toggle="tab" onclick="displayAllForests()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Nearest forest</a></li>
        <li><a class="panel-tabs" href="#find" class="sidebar" aria-controls="find" role="tab" data-toggle="tab" onclick="setUserLocationInSearch()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Find a forest</a></li>
        <li><a class="panel-tabs" href="#coins" class="sidebar" aria-controls="coins" role="tab" data-toggle="tab" onclick="displayCoins()"><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> Flup Coins</a></li>
        <li><a class="panel-tabs" href="#coins" class="sidebar" aria-controls="coins" role="tab" data-toggle="tab" onclick="displayCoins()"><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> </a></li>
    </ul>
</div>

<div class="container indexx">
<div class="row">
<!-- Sidebar -->
<div class="hidden-xs hidden-sm col-md-4 col-lg-3">
    <div class="panel panel-side panel-success">
        <!-- Default panel contents -->
        <div class="panel-heading text-center"> Profile</div>
        <div class="panel-body">
            <img class="img-responsive img-profile" src="images/ForestGuard.png"><br>
            <p class="text-center"><strong>Rank:</strong> Forest Guardian</p>
        </div>
        <ul class="nav nav-prof nav-stacked">
            <li><a class="panel-tabs" href="#dataContainerDiv" class="sidebar" aria-controls="dataContainerDiv" role="tab" data-toggle="tab" onclick="displayAllData()"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Biofeed</a></li>
            <li><a class="panel-tabs" href="#nearest" class="sidebar" aria-controls="nearest" role="tab" data-toggle="tab" onclick="displayAllForests()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Nearest forest</a></li>
            <li><a class="panel-tabs" href="#find" class="sidebar" aria-controls="find" role="tab" data-toggle="tab" onclick="setUserLocationInSearch()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Find a forest</a></li>
            <li><a class="panel-tabs" href="#coins" class="sidebar" aria-controls="coins" role="tab" data-toggle="tab" onclick="displayCoins()"><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> Flup Coins</a></li>
            <li><a data-toggle="modal" href='#report'><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Send a Report</a></li>
        </ul>
    </div>
</div>
<!-- end of sidebar -->
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
    <div role="tabpanel">
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Tab pane for newsfeed -->
            <div role="tabpanel" class="tab-pane active" id="dataContainerDiv">
            </div>
            <!-- end of tab pane for newsfeed -->

            <!-- modal for comments -->
            <div class="modal fade" id="modal-comments">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><a><span class="glyphicon glyphicon-pencil"></span></a> &nbsp; Comments <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>
                                <div class="panel-notif">
                                    <div class="panel-body comments">
                                        <div class="clearfix"></div>
                                        <hr>
                                        <ul class="media-list" id="commentsContainerUl">
                                        </ul>
                                        <textarea id='comment' class='form-control' placeholder='Write your comment' rows='2'></textarea><br>
                                        <button onclick='addComment()' type='button' class='btn btn-info pull-right'>Submit Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of modal comments -->

            <!-- tab pane for nearest -->
            <div role="tabpanel" class="tab-pane fade" id="nearest">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of the nearest forest around you</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="forestsContainerTable">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of tab pane for nearest -->

            <!-- Tabpane for view details -->
            <div role="tabpanel" class="tab-pane fade" id="view">
                <div class="panel panel-success">
                    <div id="forestDataContainerDiv">

                    </div>
                </div>

            </div>
            <!-- End of view details -->

            <!-- tab pane for find -->
            <div role="tabpanel" class="tab-pane fade" id="find">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" id="forestToSearch" placeholder="Search for a forest ...">
                            <div class="input-group-addon"><a onclick="searchForest()" href="#forest" aria-controls="nearest" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-lg-12">

                        <div role="tabpanel" class="tabpane fade" id="forest">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search result for <span id="keyWordSpan"></span></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="forestResultsTable">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- end of tab pane for find-->

            <!-- tab pane for coins -->
            <div role="tabpanel" class="tab-pane fade" id="coins">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title"><h3 class="text-center">FLUP COINS</h3></h2>
                    </div>
                    <div class="panel-body">
                        <div id="coinDataContainerDiv"></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of tab pane for coins -->
            </div>
        </div>




    </div>
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Add Data</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="" id="dataTitle" class="form-control" value="" placeholder="Title" required="required">
                                        </div><br>
                                    </div><br>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <textarea id="dataDescription" class="form-control" rows="5" placeholder="Description" required="required"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <hr>
                            <div class="btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="file" id="dataPhoto" class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <a data-toggle="modal" href='#submit'><button id="btnAddData" type="button" class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Submit Data</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewlikers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> People who likes this post</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Tuban, Anjo</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="submit">
    <div class="modal-dialog">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> Your data has been successfully submitted. Thank you.
        </div>

    </div>
</div>

<div class="modal fade" id="report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">You are about to send a report</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <form action="" method="POST" role="form" onsubmit="return false;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="reportTitle" placeholder="Title" required="">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="reportDescription" class="form-control" rows="4" placeholder="Write the description here ..." required="required"></textarea>
                            </div>
                            <input type="file" id="reportPhoto" class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6" />
                            <div class="form-group">
                                <input type="tel" class="form-control" id="userNumber" placeholder="Contact number" required="">
                            </div>
                            <button type="submit" class="btn-report btn-success pull-right"  id="btnAddReport">Send Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/googleAPI.js" type="text/javascript"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVIdx3RbFKaI-NDa7hw-t-CQVGX_IiEHE&callback=initialize"></script>
<script type="text/javascript" src="js/functionality.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
