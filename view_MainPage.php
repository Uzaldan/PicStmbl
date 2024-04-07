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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
</head>
<body>
<div style='background-color:Beige' class='container-fluid px-0'>
        <h1 style='text-align:Left'>PicStmbl</h1>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom justify-content-right">
<ul class="navbar-nav mr-1"> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-search">Search Questions</button>
</ul>
<ul class="navbar-nav mr-1 "> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-AddQ">Ask a Question</button>
</ul>
<ul class="navbar-nav ml-auto">  
<form class="form-inline" id='Sign-out-form' method='GET' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
    <input type='hidden' name='page' value='view_MainPage'>
    <input type='hidden' name='command' value='SignOut'>
    <button class="btn btn-danger" type="submit">Sign Out</button>
  </form>
</ul>
</nav>
</div>

<div id='result-pane' style='border:1px solid black;'>Results here</div>
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
                        <input name='searchTerm' type="text" class="form-control" id="search" placeholder="Search for a question">
                    </div>
                </div>
                <div class='modal-footer'>
                    <div class="form-group"> 
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button id='submitBSearch' type="button" class="btn btn-outline-primary" data-dismiss='modal'>Submit</button>
                    </div>
                </div>  
            </form>             
        </div>  
    </div>    
</div>
<div class='modal fade' id='modal-AddQ'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <form method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
           
                <div class='modal-header'>
                    <h2 class='modal-title'>Ask Anything</h2>
                </div>
                <div class='modal-body'>
                    <div class="form-group">
                        <label class="control-label" for="Question">Question:</label>
                        <input name="Question" type="text" class="form-control" id="Question" placeholder="Ask a question">
                    </div>
                </div>
                <div class='modal-footer'>
                    <div class="form-group"> 
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button id='submitBAsk' type="button" class="btn btn-outline-primary" data-dismiss='modal'>Submit</button>
                    </div>
                </div>  
            </form>             
        </div>  
    </div>    
</div>

</div>
</body>

<script>
var timer = setTimeout(timeout, 10*1000);
window.addEventListener('mousemove', event_listener_mousemove);
window.addEventListener('keydown', event_listener_keypress);
function event_listener_mousemove() {
        clearTimeout(timer);  // Clear timeout
        timer = setTimeout(timeout, 10 * 1000);  // Reregister ...
}
function event_listener_keypress() {
        clearTimeout(timer);  // Clear timeout
        timer = setTimeout(timeout, 10 * 1000);  // Reregister ...
    }
function timeout() {
        clearTimeout(timer);  // Clear timeout
        window.removeEventListener('mousemove', event_listener_mousemove);  // Remove the event listener for 'mousemove'
        document.getElementById('Sign-out-form').submit();
    }
$('#submitBAsk').click(function() {  // When the above submit button is clicked,  
        var xhttp = new XMLHttpRequest(); ;  // create an AJAX object
        xhttp.onreadystatechange = function() {  // register an event handler for the onreadystatechange event
            if (this.readyState == 4 && this.status==200) {  // check readyState and status
                $('#result-pane').html(this.responseText) // display the text response to the above <div> using jQuery
            }
        };
        var controller = "controller.php";
        var query="page=view_MainPage&command=PostAQuestion" + '&Question=' + $('#Question').val();
        xhttp.open("POST", controller);  // open the channel to the controller using the get method
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // send the query
       xhttp.send(query); 
    });
    $('#submitBSearch').click(function() {  // When the above submit button is clicked,  
        var xhttp = new XMLHttpRequest(); ;  // create an AJAX object
        xhttp.onreadystatechange = function() {  // register an event handler for the onreadystatechange event
            if (this.readyState == 4 && this.status==200) {  // check readyState and status
                $('#result-pane').html(this.responseText) // display the text response to the above <div> using jQuery
            }
        };
        var controller = "controller.php";
        var query="page=view_MainPage&command=SearchQuestions" + '&searchTerm=' + $('#search').val();
        xhttp.open("POST", controller);  // open the channel to the controller using the get method
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // send the query
       xhttp.send(query); 
    });
</script>

</html>