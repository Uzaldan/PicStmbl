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
                <ul class="navbar-nav mr-auto">
                    <span id="ProfileUsername" class="navbar-text">
                        UserName
                    </span>
                </ul>
                <ul class="navbar-nav mr-1">
                    <form class="form-inline mr-1" id='Stmbl-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_Profile'>
                        <input type='hidden' name='command' value='Stmbl'>
                        <button style=" Background-color:orange" class="btn" type="submit">Stmbl</button>
                    </form>
                    <form class="form-inline mr-1" id='Pictures-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_Profile'>
                        <input type='hidden' name='command' value='Pictures'>
                        <button class="btn btn-dark" type="submit">Pictures</button>
                    </form>
                    <form class="form-inline mr-1" id='Settings-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_Profile'>
                        <input type='hidden' name='command' value='Settings'>
                        <button class="btn btn-dark mr-1" type="submit">Settings</button>
                    </form>
                    <form class="form-inline" id='Sign-out-form' method='POST'
                        action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_MainPage'>
                        <input type='hidden' name='command' value='SignOut'>
                        <button class="btn btn-danger" type="submit">Sign Out</button>
                    </form>
                </ul>
            </nav>
        </div>
        <div class='modal fade' id='modal-search'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                        <input type='hidden' name='page' value='view_MainPage'>
                        <input type='hidden' name='command' value='SearchQuestions'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Search</h2>
                        </div>
                        <div class='modal-body'>
                            <div class="form-group">
                                <label class="control-label" for="searchterm">Search:</label>
                                <input name='searchTerm' type="text" class="form-control" id="search"
                                    placeholder="Search for a question">
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Cancel</button>
                                <button id='submitBSearch' type="button" class="btn btn-outline-primary"
                                    data-dismiss='modal'>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class='container-fluid my-0 bg-dark text-white'>
            <div id='AlbumPane'>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom justify-content-right">
                <ul class="navbar-nav mr-1 ">
                    <form class="form-inline" method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php"
                        enctype="multipart/form-data">
                        <input type='hidden' name='page' value='view_Profile'>
                        <input type="hidden" name="command" value="UploadFiles">
                        <label for="fileselect">Select image to upload:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>

                </ul>
            </nav>
        </div>
        </div>
    </body>

    <script>




        $('#uploadPhoto').click(function () {  // When the above submit button is clicked,  
            var xhttp = new XMLHttpRequest();;  // create an AJAX object
            xhttp.onreadystatechange = function () {  // register an event handler for the onreadystatechange event
                if (this.readyState == 4 && this.status == 200) {  // check readyState and status
                    $('#result-pane').html(this.responseText) // display the text response to the above <div> using jQuery
                }
            };
            var controller = "controller.php";
            var query = "page=view_Profile&command=UploadPhoto" + '&FileName=' + $('#Filename').val();
            xhttp.open("POST", controller);  // open the channel to the controller using the get method
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // send the query
            xhttp.send(query);
        });



    </script>

</html>