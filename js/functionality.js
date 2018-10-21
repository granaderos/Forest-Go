
var forestIdInWhichDataWillBeAdded = 0;
var dataIdInWhichCommentWillBeAdded = 0;

$(document).ready(function() {
    displayAllData();
    displayAllDataForAdmin();

    $("#btnRegister").click(function() {
        var fname = $("#firstname").val();
        var lname = $("#lastname").val();
        var email= $("#email").val();
        var password = $("#password").val();
        var cPassword = $("#confirmPassword").val();

        if(password == cPassword) {
            $.ajax({
                type: "POST",
                url: "php/objects/addUser.php",
                data: {"firstName": fname, "lastName": lname, "email": email, "password": password},
                success: function(data) {
                    alert("Welcome to ForestGo " + fname + ". Enjoy!");
                    window.location.assign("newsfeed.php");
                    getCurrentUserData();
                    console.log("data = " + data);
                },
                error: function(data) {
                    console.log("error in adding user = " +  JSON.stringify(data));
                }
            })
        } else {
            alert("password mismatched");
        }

        return false;
    });

    $("#btnLogin").click(function() {
        var email = $("#emailEntered").val();
        var password = $("#passwordEntered").val();

        $.ajax({
            type: "POST",
            url: "php/objects/login.php",
            data: {"email": email, "password": password},
            success: function(data) {
                if(data == "valid") {
                    getCurrentUserData(email, password);
                    window.location.assign("newsfeed.php");
                } else {
                    alert(data);
                }
            },
            error: function(data) {
                console.log(JSON.stringify(data));
            }
        });
    });


    var formData = false;
    if(window.FormData) {
        formData = new FormData();
    }
    var dataPhoto = "";
    $("#dataPhoto").change(function() {
        dataPhoto = this.files[0];
    });

    $("#btnAddData").click(function() {
        if(formData) {
            var dataTitle = $("#dataTitle").val();
            var dataContent = $("#dataDescription").val();
            formData.append("forestId", forestIdInWhichDataWillBeAdded);
            formData.append("title", dataTitle);
            formData.append("content", dataContent);
            formData.append("photo", dataPhoto);
            $.ajax({
                type: "POST",
                url: "php/objects/addData.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    //$("#modal-id").hide();
                    displayAllData();
                    console.log("success " + data)
                },
                error: function(data) {
                    console.log("error in adding post = " + JSON.stringify(data));
                }
            });
        } else console.log("Heyyyy");
    });

    var reportPhoto = "";
    $("#reportPhoto").change(function() {
        reportPhoto = this.files[0];
    });

    $("#btnAddReport").click(function() {
        if(formData) {
            var dataTitle = $("#reportTitle").val();
            var dataContent = $("#reportDescription").val();
            var userMobile = $("#userNumber").val();
            formData.append("forestId", forestIdInWhichDataWillBeAdded);
            formData.append("title", dataTitle);
            formData.append("content", dataContent+" [The reporter's contact number is " + userMobile + ".][The reporter's location when sending this information is " + locationOfUser + "]");
            formData.append("photo", reportPhoto);
            $.ajax({
                type: "POST",
                url: "php/objects/addReport.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert("Thank you! Data was successfully reported to the authority.");
                    console.log("success " + data)
                },
                error: function(data) {
                    console.log("error in adding post = " + JSON.stringify(data));
                }
            });
        } else console.log("Heyyyy");
    });
});

function searchForest() {
    var keyWord = $("#forestToSearch").val();
    if(keyWord != "") {
        $.ajax({
            type: "POST",
            url: "php/objects/searchForest.php",
            data: {"keyWord": keyWord},
            success: function(data) {
                $("#keyWordSpan").html(keyWord);
                $("#forestResultsTable").html(data);
            },
            error: function(data) {
                console.log(JSON.stringify(data));
            }
        });
    }
}

function setUserLocationInSearch() {
    $("#currentLocationOfUserInSearch").html("<small>Your Location: </small>" + locationOfUser);
}

function setForestId(forestId) {
    forestIdInWhichDataWillBeAdded = forestId;
}

function displayAllForests() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayAllForests.php",
        success: function(data) {
            $("#currentLocationOfUser").html("<small>Your Location: </small>" + locationOfUser);
            $("#forestsContainerTable").html(data);
            $("#nearest").show();
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayComments(dataId) {
  $.ajax({
    type: "POST",
    url: "php/objects/displayComments.php",
    data: {"dataId": dataId},
    success: function(data) {
        setDataId(dataId);
        $("#commentsContainerUl").html(data);
        console.log("this " + data);
    },
    error: function(data) {
      console.log(JSON.stringify(data));
    }
  });
}

function displayCoins() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayCoins.php",
        success: function(data) {
            $("#coinDataContainerDiv").html(data);
            console.log("coins " + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function setDataId(dataId) {
    dataIdInWhichCommentWillBeAdded = dataId;
}

function addCoins(userId) {
    $.ajax({
        type: "POST",
        url: "php/objects/addCoins.php",
        data: {"userID": userId},
        success: function(data) {

        },
        error: function(Data) {
            console.log(JSON.stringify(data));
        }
    });
}

function getCurrentUserData(email, password) {
    $.ajax({
       type: "POST",
        url: "php/objects/getCurrentUserData.php",
        data: {"email": email, "password": password},
        success: function(data) {
            console.log("current user data successfully retrieved " + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayForestData(forestId) {
    $.ajax({
        type: "POST",
        url: "php/objects/displayForestData.php",
        data: {"forestId": forestId},
        success: function(data) {
            $("#forestDataContainerDiv").html(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function likeData(dataId) {
    $.ajax({
        type: "POST",
        url: "php/objects/likeData.php",
        data: {"dataId": dataId},
        success: function(data) {
            var curLikes = parseInt($("#totalLikes"+dataId).html());
            var newLikes = curLikes+1;
            if(newLikes > 0) newLikes = "+"+newLikes;
            $("#totalLikes"+dataId).html(newLikes);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function addComment() {
    var comment = $("#comment").val();
    $.ajax({
        type: "POST",
        url: "php/objects/addComment.php",
        data: {"dataId": dataIdInWhichCommentWillBeAdded, "comment": comment},
        success: function(data) {
            // refresh comments here
            displayComments(dataIdInWhichCommentWillBeAdded);
            console.log("com " + data);
            $("#comment").val("");
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayLikers(dataId) {
    $.ajax({
        type: "POST",
        url: "php/objects/displayLikers.php",
        data: {"dataId": dataId},
        success: function(data) {
            // Anjo, display the likers of a particular post here
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayAllData() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayAllData.php",
        success: function(data) {
            $("#dataContainerDiv").html(data);
        },
        error: function(data) {
            console.log("error in displaying posts = " + JSON.stringify(data));
        }
    });
}

function displayAllDataForAdmin() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayAllDataForAdmin.php",
        success: function(data) {
            $("#dataContainerForAdminDiv").html(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }

    });
}

function verifyData(dataId) {
    $.ajax({
        type: "POST",
        url: "php/objects/verifyData.php",
        data: {"dataId": dataId},
        success: function(data) {
            displayAllData();
            displayAllDataForAdmin();
            console.log("verify data is" + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function deleteData(dataId) {
    $.ajax({
        type: "POST",
        url: "php/objects/deleteData.php",
        data: {"dataId": dataId},
        success: function(data) {
            alert("The data was successfully deleted!");
            displayAllDataForAdmin();
            console.log("delete " + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayProcessedReports() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayProcessedData.php",
        success: function(data) {
            $("#previousReportsContainerDiv").html(data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function dislikeData(dataId) {
    $.ajax({
        type: "POST",
        url: "php/objects/dislikeData.php",
        data: {"dataId": dataId},
        success: function(data) {
            console.log("dislike " + data);
            var curLikes = parseInt($("#totalLikes"+dataId).html());
            var newLikes = curLikes-1;
            if(newLikes > 0) newLikes = "+"+newLikes;
            $("#totalLikes"+dataId).html(newLikes);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}
