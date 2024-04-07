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
<body style='background-color:black'>
<div style='background-color:White' class='container-fluid my-0'>
        <h1 style='text-align:Left; margin-bottom: 0; '>PicStmbl</h1>
</div>
<div  class='container-fluid my-0 bg-dark text-white'>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-right">
<ul class="navbar-nav mr-1"> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-search">Search Questions</button>
</ul>
<ul class="navbar-nav mr-1 "> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-AddQ">Ask a Question</button>
</ul>
<ul class="navbar-nav ml-auto">  
<form class="form-inline" id='Sign-out-form' method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
    <input type='hidden' name='page' value='view_Search'>
    <input type='hidden' name='command' value='SignOut'>
    <button class="btn btn-danger" type="submit">Sign Out</button>
  </form>
</ul>
</nav>
</div>
<div  class='container-fluid my-0 bg-dark text-white'>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom justify-content-right">
<ul class="navbar-nav mr-1"> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-search">Search Questions</button>
</ul>
<ul class="navbar-nav mr-1 "> 
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-AddQ">Ask a Question</button>
</ul>
</nav>
</div>
</body>

<script>
    document.getElementById('button-signin').addEventListener('click', function () {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('modal-signin').style.display = 'block';
    });
    document.getElementById('cancel-signin').addEventListener('click', function () {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('modal-signin').style.display = 'none';
    });
    document.getElementById('blanket').addEventListener('click', function () {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('modal-signin').style.display = 'none';
        document.getElementById('modal-signup').style.display = 'none';
    });
    document.getElementById('button-signup').addEventListener('click', function () {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('modal-signup').style.display = 'block';
    });
    document.getElementById('cancel-signup').addEventListener('click', function () {
        document.getElementById('blanket').style.display = 'none';
        document.getElementById('modal-signup').style.display = 'none';
    });


    function show_signin_modal_window() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('modal-signin').style.display = 'block';

    }
    function show_signin_modal_windowError() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('modal-signin').style.display = 'block';
        document.getElementById('modal-signinError').innerHTML = ' Wrong username, or  Wrong password';
    }


    function show_signup_modal_window() {
        document.getElementById('blanket').style.display = 'block';
        document.getElementById('modal-signup').style.display = 'block';

    }

    <?php
    if ($display_modal_window == 'signin') {
        echo 'show_signin_modal_window();';
    }
    if ($display_modal_window == 'signup') {
        echo 'show_signup_modal_window();';
    }
    if ($display_modal_window == 'signinError') {
        echo 'show_signin_modal_windowError();';

    }


    ?>


</script>

</html>