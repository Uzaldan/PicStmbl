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

<body style='background-color:black;overflow:hidden;'>
    <div style='background-color:White' class='container-fluid my-0'>
        <h1 style='text-align:Left; margin-bottom: 0; '>PicStmbl</h1>
    </div>
    <div class='container-fluid my-0 bg-dark text-white'>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-right">
            <form class="form-inline mr-1" id='Stmbl-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <input type='hidden' name='page' value='view_Search'>
                <input type='hidden' name='command' value='Stmbl'>
                <button style=" Background-color:orange" class="btn" type="submit">Stmbl</button>
            </form>
            <form class="form-inline mr-1" id='Profile-form' method='POST'
                action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <input type='hidden' name='page' value='view_Search'>
                <input type='hidden' name='command' value='Profile'>
                <button class="btn btn-light" type="submit">Profile</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline" id='Sign-out-form' method='POST'
                    action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                    <input type='hidden' name='page' value='view_Search'>
                    <input type='hidden' name='command' value='SignOut'>
                    <button class="btn btn-danger" type="submit">Sign Out</button>
                </form>
            </ul>
        </nav>
    </div>
    <div class='container-fluid my-0 bg-dark text-white'>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom justify-content-right">

        </nav>
    </div>
</body>

<script>


    $('#submitSearch').click(function () {  // When the above submit button is clicked,  
        var xhttp = new XMLHttpRequest();;  // create an AJAX object
        xhttp.onreadystatechange = function () {  // register an event handler for the onreadystatechange event
            if (this.readyState == 4 && this.status == 200) {  // check readyState and status
                $('#result-pane').html(this.responseText) // display the text response to the above <div> using jQuery
            }
        };
        var controller = "controller.php";
        var query = "page=view_MainPage&command=SearchPics" + '&searchTerm=' + $('#search').val();
        xhttp.open("POST", controller);  // open the channel to the controller using the get method
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // send the query
        xhttp.send(query);
    });

</script>

</html>