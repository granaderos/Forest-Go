$(document).ready(function() {
    displayPosts();


    $("#btnRegister").click(function() {
        alert("registering");
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
                    alert("finish creating user's account = " + data);
                    displayMessages();
                },
                error: function(data) {
                    console.log("error in adding user = " +  JSON.stringify(data));
                }
            })
        } else {
            alert("password mismatched");
        }
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

    var photo = "";
    $("#dataPhoto").change(function() {
        photo = this.files[0];
    });

    /*$("#btnSubmitData").click(function() {

    });*/
});

function displayComments(dataId) {
  $.ajax({
    type: "POST",
    url: "php/objects/displayComments.php",
    data: {"dataId": dataId},
    success: function(data) {

    },
    error: function(data) {
      console.log(JSON.stringify(data));
    }
  });
}

function addData(forestId) {
  if(formData) {
      var postTitle = $("#dataTitle").val();
      var postContent = $("#dataContent").val();
      formData.append("forestId", forestId);
      formData.append("title", postTitle);
      formData.append("content", postContent);
      formData.append("photo", photo);
      $.ajax({
          type: "POST",
          url: "php/objects/addData.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
              //$("#modal-id").hide(;
              displayAllData();
          },
          error: function(data) {
              console.log("error in adding post = " + JSON.stringify(data));
          }
      });
  }
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

function displayFullPost(postId) {
    $.ajax({
        type: "POST",
        url: "php/objects/displayFullPost.php",
        data: {"postId": postId},
        success: function(data) {
            // Anjo, display full Article here
            alert("Here the full Article with comment and write comment supposed to be:\n(Anjo, please display it the way you want)\n\n" + data)
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function likePost(postId) {
    $.ajax({
        type: "POST",
        url: "php/objects/likePost.php",
        data: {"postId": postId},
        success: function(data) {
            alert("You liked this post " + data);
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function sendMessage() {

}

function addComment(postId) {
    $.ajax({
        type: "POST",
        url: "php/objects/addComment.php",
        data: {"postId": postId},
        success: function(data) {
            // refresh comments here
            alert("adding comment");
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function displayLikers(postId) {
    $.ajax({
        type: "POST",
        url: "php/objects/displayLikers.php",
        data: {"postId": postId},
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

function displayMessages() {
    $.ajax({
        type: "POST",
        url: "php/objects/displayMessages.php",
        success: function(data) {

        },
        error: function(data) {
            console.log("error in displaying mesages = " + JSON.stringify(data));
        }
    });
}
