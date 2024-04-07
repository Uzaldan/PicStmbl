<!DOCTYPE html>
<html lang="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

    <body style='background-color:black'>
        <div style='background-color:White' class='container-fluid my-0'>
            <h1 style='text-align:Left; margin-bottom: 0; '>PicStmbl</h1>
        </div>
        <div class='container-fluid my-0 bg-dark text-white'>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-right">
                <ul class="navbar-nav mr-1">
                    <form class="form-inline mr-1" id='Profile-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_Settings'>
                        <input type='hidden' name='command' value='Profile'>
                        <button class="btn btn-light" type="submit">Profile</button>
                    </form>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <form class="form-inline" id='Sign-out-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_Settings'>
                        <input type='hidden' name='command' value='SignOut'>
                        <button class="btn btn-danger" type="submit">Sign Out</button>
                    </form>
                </ul>
            </nav>
            <form class="form" id='Sign-out-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <div class="form-group">
                    <label class="pr-2" for='ChangeUsername'>Username:</label><br>
                    <input type='text' class="form-control" id='Username'>
                </div>
                <button id="ChangeUsername" class="btn btn-danger" type="button">Change Username</button>
            </form>
            <form class="form my-3" id='Sign-out-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <div class="form-group">
                    <label class="pr-3" for='ChangePassword'>Password: </label><br>
                    <input type='password' class="form-control" id='Password'>
                </div>

                <button id="ChangePassword" class="btn btn-danger" type="button">Change Password</button>
            </form>
            <form class="form my-3" id='Sign-out-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <div class="form-group">
                    <label for='Pvisibility'>Profile Visibility:</label><br>
                    <select class="form-control" name='Pvisibility' id='Pvisibility'>
                        <option value="1">Private</option>
                        <option value="0">Public</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for='BlockUsers'>Block users (space between usernames):</label><br>
                    <input type="text" class="form-control" id="BlockUsers">
                    <label for='BlockTags'>Block Tags (space between tags):</label><br>
                    <input type="text" class="form-control" id="BlockTags">
                </div>
                <button id='ChangeMisc' class="btn btn-danger" type="button">Save Misc Settings</button>
            </form>
            <form class="form-inline mr-1" id='Stmbl-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <input type='hidden' name='page' value='view_Settings'>
                <input type='hidden' name='command' value='DeleteUser'>
                <button class="btn btn-danger" type="submit">Delete Account</button>
            </form>
        </div>
    </body>

    <script>
        $('#ChangeUsername').click(function () {  // When the above submit button is clicked,  
            var xhttp = new XMLHttpRequest();;  // create an AJAX object
            xhttp.onreadystatechange = function () {  // register an event handler for the onreadystatechange event
                if (this.readyState == 4 && this.status == 200) {  // check readyState and status
                    alert(this.responseText); // display the text response to the above <div> using jQuery
                }
            };
            var controller = "controller.php";
            var query = "page=view_Settings&command=ChangeUsername" + '&Username=' + $('#Username').val();
            xhttp.open("POST", controller);  // open the channel to the controller using the get method
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // send the query
            xhttp.send(query);
        });
        $('#ChangePassword').click(function () {  // When the above submit button is clicked,  
            var xhttp = new XMLHttpRequest();;  // create an AJAX object
            xhttp.onreadystatechange = function () {  // register an event handler for the onreadystatechange event
                if (this.readyState == 4 && this.status == 200) {  // check readyState and status
                    $('#Passwordresult-p').html(this.responseText); // display the text response to the above <div> using jQuery
                }
            };
            var controller = "controller.php";
            var query = "page=view_Settings&command=ChangePassword" + '&Password=' + $('#Password').val();
            xhttp.open("POST", controller);  // open the channel to the controller using the get method
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // send the query
            xhttp.send(query);
        });
        $('#ChangeMisc').click(function () {  // When the above submit button is clicked,  
            var xhttp = new XMLHttpRequest();;  // create an AJAX object
            xhttp.onreadystatechange = function () {  // register an event handler for the onreadystatechange event
                if (this.readyState == 4 && this.status == 200) {  // check readyState and status
                    // display the text response to the above <div> using jQuery
                }
            };
            var controller = "controller.php";
            var query = "page=view_Settings&command=ChangeMisc" + '&Pvisibility=' + $('#Pvisibility').val() + '&BlockUsers=' + $('#BlockUsers').val() + '&BlockTags=' + $('#BlockTags').val();
            xhttp.open("POST", controller);  // open the channel to the controller using the get method
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // send the query
            xhttp.send(query);
        });


    </script>

</html>