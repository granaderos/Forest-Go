<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 1:35 PM
 */

include_once "DatabaseConnector.php";
session_start();
class Functions extends DatabaseConnector {
    function addUser($firstname, $lastname, $email, $password) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO users VALUES (null, ?, ?, ?, password(?));");
        $sql->execute(array($firstname, $lastname, $email, $password));

        $userID = $this->dbHolder->lastInsertId();

        $sqlInsertToCoins = $this->dbHolder->prepare("INSERT INTO flupCoins VALUES (null, ?, 0, 0);");
        $sqlInsertToCoins->execute(array($userID));
        $this->closeConnection();
    }

    function logIn($email, $password) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ?;");
        $sql->execute(array($email));

        if($sql->fetch()) {
            $sql2 = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ? AND password = password(?);");
            $sql2->execute(array($email, $password));
            if($sql2->fetch()) {
                echo "valid";
                $this->getCurrentUserData($email, $password);
            } else echo "Invalid password.";

        } else echo "Invalid email.";

        $this->closeConnection();
    }

    function getCurrentUserData($email, $password) {
        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ? AND password = password(?);");
        $sql->execute(array($email, $password));
        $data = $sql->fetch();

        $_SESSION["userId"] = $data[0];
        $_SESSION["firstname"] = $data[1];
        $_SESSION["lastname"] = $data[2];
        $_SESSION["email"] = $data[3];
        $_SESSION["password"] = $data[4];
        //echo " id noe is = ".$_SESSION["userId"];
    }

    function addData($forestId, $title, $content, $photo) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO data VALUES (null, ?, ?, ?, ?, ?, ?, 0);");
        $sql->execute(array($forestId, $_SESSION["userId"], nl2br(htmlentities($title)), nl2br(htmlentities($content)), $photo, $this->getCurrentDate()));

        $this->closeConnection();
    }

    function displayForestData($forestId) {
        $this->openConnection();

        $sqlForest = $this->dbHolder->prepare("SELECT * FROM forests WHERE forestId = ?;");
        $sqlForest->execute(array($forestId));

        $forestDataRetrieved = $sqlForest->fetch();

        $sqlData = $this->dbHolder->prepare("SELECT * from data WHERE status = 1 AND forestId = ?;");
        $sqlData->execute(array($forestId));

        $dataToDisplay = "<div class='panel-heading'>
                               <h1 class='panel-title'><h2>".$forestDataRetrieved[1]."</h2></h1>
                               <h4>Location: ".$forestDataRetrieved[2]." ".$forestDataRetrieved[3]." ".$forestDataRetrieved[4]."</h4>
                               <h4>Area: ".$forestDataRetrieved[5]."</h4>
                          </div>
                          <div class='panel-body'>
                            <h4>Data Added By Users:</h4>";
        $dataOfForest = "";
        while($dataRetrieved = $sqlData->fetch()) {
            $dataOfForest .= "<p>".$dataRetrieved[3]."</p>";
        }
        if($dataOfForest == "") {
            $dataOfForest = "No further data.";
        }
        $dataToDisplay .= $dataOfForest;
        $dataToDisplay .= "</div><hr><a onclick='setForestId(".$forestDataRetrieved[0].")' data-toggle='modal' href='#add'><button type='button' class='btn-register pull-right'>Add data</button></a>";

        echo $dataToDisplay;

        $this->closeConnection();
    }

    function addComment($dataId, $comment) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO comments VALUES (null, ?, ?, ?);");
        $sql->execute(array($dataId, $_SESSION["userId"], nl2br(htmlentities($comment))));

        $this->closeConnection();
    }

    function displayCoins() {
        $this->openConnection();

        $sqlLikes = $this->dbHolder->prepare("SELECT count(*) FROM likes WHERE userId = ?;");
        $sqlLikes->execute(array($_SESSION["userId"]));

        $sqlDislikes = $this->dbHolder->prepare("SELECT count(*) FROM dislikes WHERE userId = ?;");
        $sqlDislikes->execute(array($_SESSION["userId"]));

        $totalCoins = $sqlLikes->fetch()[0]-$sqlDislikes->fetch()[0];

        //$sql = $this->dbHolder->prepare("SELECT f.coins, f.equivalent FROM flupCoins f, users u WHERE u.userId = f.userId AND u.userId = ?;");
        //$sql->execute(array($_SESSION["userId"]));

        $dataToDisplay = "";

        //if($data = $sql->fetch()) {
            $dataToDisplay .= "<div class='row'>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6'>
                                            <h3><strong>Current Flup Coins:</strong> ".$totalCoins."</h3>
                                        </div>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6'>
                                            <h3><strong>Conversion to Peso:</strong> ".($totalCoins/100)."</h3>
                                        </div>
                               </div>

                               <div class='row'>
                                      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                          <h3><strong>Total Flup Coins gathered:</strong> ".$totalCoins."</h3>
                                      </div>
                                </div>
                                <br />
                                <br />
                                  <div class='row'>
                                      <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
                                        <img src='images/ForestGuard.png' class='img-responsive'>
                                        <p><center><strong>Forest Guardian</strong></center></p>
                                      </div>
                                      <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
                                          <img src='images/ForestWarriorDim.png' class='img-responsive'>
                                          <p><center>Forest Warrior</center></p>
                                      </div>
                                      <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
                                          <img src='images/ForestNinjaDim.png' class='img-responsive'>
                                          <p><center>Forest Ninja</center></p>
                                      </div>
                                  </div>";
        //}

        echo $dataToDisplay;

        $this->closeConnection();
    }

    function searchForest($keyWord) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT f.*, d.* FROM forests f, data d WHERE f.name LIKE ?;");
        $sql->execute(array("%".$keyWord."%"));

        $dataToDisplay = "<thead>
                            <tr>
                                <th>FOREST NAME</th>
                                <th>FOREST LOCATION</th>
                                <th>FOREST DETAILS</th>
                            </tr>
                          </thead><tbody>";
        $forestReally = "";
        while($data = $sql->fetch()) {
            $forestReally .= "<tr>
                                    <td>".$data[1]."</td>
                                    <td>".$data[2]."</td>
                                    <td><a href='#view' aria-controls='feed' role='tab' data-toggle='tab'><button type='button' class='btn btn-info' onclick='displayForestData(".$data[0].")'>Show Data</button></a></td>
                                </tr>";
        }

        if($forestReally == "") {
            $dataToDisplay .= "<tr><td colspan='3'>No record found.</td></tr>";
        } else {
            $dataToDisplay .= $forestReally;
        }

        $dataToDisplay .= "</tbody>";


        echo $dataToDisplay;

        $this->closeConnection();
    }

    function displayAllForests() {
        $this->openConnection();

        $sql = $this->dbHolder->query("SELECT * FROM forests f;");

        $dataToDisplay = "<thead>
                            <tr>
                                <th>FOREST NAME</th>
                                <th>FOREST LOCATION</th>
                                <th>FOREST DETAILS</th>
                            </tr>
                          </thead><tbody>";
        while($data = $sql->fetch()) {
            $dataToDisplay .= "<tr>
                                    <td>".$data[1]."</td>
                                    <td>".$data[2]."</td>
                                    <td><a href='#view' aria-controls='feed' role='tab' data-toggle='tab'><button type='button' class='btn btn-info' onclick='displayForestData(".$data[0].")'>Show Data</button></a></td>
                                </tr>";
        }
        $dataToDisplay .= "</tbody>";

        echo $dataToDisplay;

        $this->closeConnection();
    }

    function likeData($dataId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO likes VALUES (null, ?, ?);");
        $sql->execute(array($dataId, $_SESSION["userId"]));

        $this->closeConnection();
    }

    function dislikeData($dataId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO dislikes VALUES (null, ?, ?);");
        $sql->execute(array($dataId, $_SESSION["userId"]));

        $this->closeConnection();
    }

    function getCurrentDate() {
        $this->openConnection();

        $sql = $this->dbHolder->query("SELECT CURDATE();");
        $date =  $sql->fetch();

        $this->closeConnection();
        return $date[0];
    }

    function displayAllData() {
        $this->openConnection();

        $sqlData= $this->dbHolder->query("SELECT u.firstname, u.lastname, f.*, d.* FROM users u, forests f, data d WHERE u.userId = d.userId AND f.forestId = d.forestId ORDER BY d.dateAdded;");

        $dataToDisplay = "";

        while($dataRetrieved = $sqlData->fetch()) {

            $sqlLikes = $this->dbHolder->prepare("SELECT count(*) FROM likes WHERE dataId = ?;");
            $sqlLikes->execute(array($dataRetrieved[8]));
            if($numOfLikes = $sqlLikes->fetch()) {
                $numOfLikes = $numOfLikes[0];
            } else $numOfLikes = 0;

            $sqlDislikes = $this->dbHolder->prepare("SELECT count(*) FROM dislikes WHERE dataId = ?;");
            $sqlDislikes->execute(array($dataRetrieved[8]));
            if($numOfDislikes = $sqlDislikes->fetch()) {
                $numOfDislikes = $numOfDislikes[0];
            } else $numOfDislikes = 0;

            $totalLikes = $numOfLikes-$numOfDislikes;
            if($totalLikes > 0 && $totalLikes != 0) {
                $totalLikes = "+".$totalLikes;
            }

            $sqlComments = $this->dbHolder->prepare("SELECT count(*) FROM comments WHERE dataId = ?;");
            $sqlComments->execute(array($dataRetrieved[8]));
            if($numOfComments = $sqlComments->fetch()) {
                $numOfComments = $numOfComments[0];
            } else {
                $numOfComments = 0;
            }

            $dataToDisplay .= "<div class='panel panel-success'>
                            <div class='panel-body text-left'>
                            <div class='col-xs-3 col-sm-3 col-md-2 col-lg-2'>
                                <br><br><br><br><br>
                                <div class='row'>
                                    <a class='position'><button type='button' class='btn btn-report' onclick='likeData(".$dataRetrieved[8].")'><span class='glyphicon glyphicon-arrow-up' aria-hidden='true'></span></button></a>
                                </div>
                                <div class='row'>
                                    <span><br>&nbsp; <span  class='position' id='totalLikes".$dataRetrieved[8]."'>".$totalLikes."</span></span>
                                </div>
                                <div class='row'><br>
                                    <a class='position'><button type='button' class='btn btn-report' onclick='dislikeData(".$dataRetrieved[8].")'><span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span></button></a>
                                </div>
                            </div>
                            <div class='col-xs-9 col-sm-9 col-md-10 col-lg-10'>
                                <div class='row'>
                                    <div class='col-lg-10'>
                                        <p class=post'><strong>".$dataRetrieved[0]." ".$dataRetrieved[1]."</strong><br><small>".$dataRetrieved[14]."</small><br><br></p>
                                    </div>
                                </div>
                                <div class='row''>
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                        <p>RE: ".$dataRetrieved[11]."</p>
                                        <p>".$dataRetrieved[12]."</p><br>
                                    </div>
                                </div>
                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                   <img src='images/".$dataRetrieved[13]."' class='img-responsive img-comment' /><br>
                                </div>
                                <div>Forest Name: ".$dataRetrieved[3]."</div>

                                <div class='row'>
                                    <!--<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                                       <br><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'> </span><small><a href='#viewlikers' data-toggle='modal' onclick='displayLikers(".$dataRetrieved[2].")'>Show people who like this post</a></small>
                                    </div>-->
                                    <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                                       <br><span class='pull-right badge'> ".$numOfComments." Comments</span><!--<span class='pull-right badge'> ".$numOfLikes." likes </span>->
                                    </div>
                                </div>
                                     <hr>
                                   <div class='btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                        <!--<button onclick='likeData(".$dataRetrieved[8].")' type='button' class='btn btn-default col-xs-12 col-sm-12 col-md-1 col-lg-6'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span> Like</button>-->
                                        <a onclick='displayComments(".$dataRetrieved[8].")' data-toggle='modal' href='#modal-comments'><button type='button' class='btn btn-default col-xs-12 col-sm-12 col-md-12 col-lg-6'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Comment</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>";

            /*$dataToDisplay .= "<div class='panel panel-success'>
                                    <div class='panel-body text-left'>
                                        <div class='row'>
                                            <div class='col-lg-10'>
                                                <p class=post'><strong>".$dataRetrieved[0]." ".$dataRetrieved[1]."</strong><br><small>".$dataRetrieved[14]."</small><br><br></p>
                                            </div>
                                        </div>
                                        <div class='row''>
                                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                <p>RE: ".$dataRetrieved[11]."</p>
                                                <p>".$dataRetrieved[12]."</p><br>
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                           <img src='images/".$dataRetrieved[13]."' class='img-responsive img-comment' />
                                        </div>
                                        <div>Forest Name: ".$dataRetrieved[3]."</div>

                                        <div class='row'>
                                            <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                                               <br><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'> </span><small><a href='#viewlikers' data-toggle='modal' onclick='displayLikers(".$dataRetrieved[2].")'>Show people who like this post</a></small>
                                            </div>
                                            <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                                               <br><span class='pull-right badge'> ".$numOfComments." Comments</span><span class='pull-right badge'> ".$numOfLikes." likes </span>
                                            </div>
                                        </div>
                                             <hr>
                                           <div class='btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                <button onclick='likeData(".$dataRetrieved[8].")' type='button' class='btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span> Like</button>
                                                <a onclick='displayComments(".$dataRetrieved[8].")' data-toggle='modal' href='#modal-comments'><button type='button' class='btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Comment</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";*/
        }

        echo $dataToDisplay;

        $this->closeConnection();
    }

    function displayLikers($dataId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT u.firstname, u.lastname, l.* FROM users u, likes l WHERE u.userId = l.userId AND l.dataId = ?;");
        $sql->execute(array($dataId));
        $data = "<ul>";
        while($likeData = $sql->fetch()) {
            $data .= "<li><img src='images/user_avatar.png' alt='' class='img-circle img-size'>".$likeData[0]." ".$likeData[1]."</li>";
        }
        $data .= "</ul>";

        echo $data;
        $this->closeConnection();
    }

    function displayComments($dataId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT u.firstname, u.lastname, c.* FROM users u, comments c WHERE u.userId = c.userId AND c.dataId = ?;");
        $sql->execute(array($dataId));
        $dataToDisplay = "";
        while($data = $sql->fetch()) {
            $dataToDisplay .= "<li class='media'>
                                <div class='comment'>
                                    <a href='#' class='pull-left'>
                                        <img src='images/user_avatar.png' alt='' class='img-circle img-size'>
                                    </a>
                                    <div class='media-body'>
                                        <strong class='text-success'>".$data[0]." ".$data[1]."</strong>
                                            <span class='text-muted'>
                                                <small class='text-muted'>Just now</small>
                                            </span>
                                        <p>".$data[5]."</p>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>
                            </li>";
        }
        echo $dataToDisplay;

        $this->closeConnection();
    }

    function verifyData($dataId) {
        $this->openConnection();

        $sqlUpdateStatus = $this->dbHolder->prepare("UPDATE reports set status = 1 WHERE dataId = ?;");
        $sqlUpdateStatus->execute(array($dataId));
        echo "updated status";
        $sqlUserId = $this->dbHolder->prepare("SELECT userId FROM reports WHERE dataId = ?;");
        $sqlUserId->execute(array($dataId));
        if($userId = $sqlUserId->fetch()) {
            echo "userId = ".$userId[0];
        } else echo "no userId ret".$userId[0];

        echo "dataId passed is ".$dataId;
        $this->closeConnection();
    }

    function deleteData($dataId) {
        $this->openConnection();

        $sqlDeleteData= $this->dbHolder->prepare("DELETE FROM data WHERE dataId = ?;");
        $sqlDeleteData->execute(array($dataId));

        $this->closeConnection();
    }

    function addReport($forestId, $title, $content, $photo) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO reports VALUES (null, ?, ?, ?, ?, ?, ?, 0);");
        $sql->execute(array($forestId, $_SESSION["userId"], nl2br(htmlentities($title)), nl2br(htmlentities($content)), $photo, $this->getCurrentDate()));

        $this->closeConnection();
    }

    function displayProcessedReports() {
        $this->openConnection();

        $sqlData= $this->dbHolder->query("SELECT u.firstname, u.lastname, r.* FROM users u, reports r WHERE u.userId = r.userId AND r.status = 1 ORDER BY r.dateAdded;");

        $dataToDisplay = "";

        while($dataRetrieved = $sqlData->fetch()) {
            $dataToDisplay .= "<div class='panel panel-success'>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-10'>
                                                <p class=post'><strong>".$dataRetrieved[0]." ".$dataRetrieved[1]."</strong><br><small>".$dataRetrieved[8]."</small><br><br></p>
                                            </div>
                                        </div>
                                        <div class='row''>
                                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                <p>".$dataRetrieved[6]."</p><br>
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                           <img src='images/".$dataRetrieved[7]."' class='img-responsive img-comment' />
                                    </div>
                                </div>";
        }
        echo $dataToDisplay;

        $this->closeConnection();
    }

    function displayAllDataForAdmin() {
        $this->openConnection();

        $sqlData= $this->dbHolder->query("SELECT u.firstname, u.lastname, r.* FROM users u, reports r WHERE u.userId = r.userId AND r.status=0 ORDER BY r.dateAdded;");

        $dataToDisplay = "";

        while($dataRetrieved = $sqlData->fetch()) {
            $dataToDisplay .= "<div class='panel panel-success'>
                                    <div class='panel-body'>
                                        <div class='row text-center'>
                                            <div class='col-lg-10'>
                                                <p class='text-center'><strong>".$dataRetrieved[0]." ".$dataRetrieved[1]."</strong><br><small>".$dataRetrieved[8]."</small><br><br></p>
                                            </div>
                                        </div>
                                        <div class='row''>
                                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                <p>".$dataRetrieved[6]."</p><br>
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                           <img src='images/".$dataRetrieved[7]."' class='img-responsive img-comment' />
                                        </div>
                                             <hr>
                                           <div class='btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                <br><button onclick='verifyData(".$dataRetrieved[2].")' type='button' class='btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span> Verify</button>
                                                <a onclick='deleteData(".$dataRetrieved[2].")' data-toggle='modal' href='#modal-comments'><button type='button' class='btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Delete</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
        }
        echo $dataToDisplay;

        $this->closeConnection();
    }
}
