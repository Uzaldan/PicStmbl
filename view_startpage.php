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
    <div class='container my-0 bg-dark text-white'>
        <h2 style='text-align:center'>Sign In</h2>
        <div class="container justify-content-center">
            <div  class='row justify-content-center'>
            <form method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <input type='hidden' name='page' value='view_startPage'>
                <input type='hidden' name='command' value='SignIn'>
                <div class="form-group">
                    <label for='signin-username'>Username:</label>
                    <input type='text' class="form-control" name='Username'>
                </div>
                <div class="form-group">
                    <label for='signin-password'>Password:</label>
                    <input type='password' class="form-control" name='Password'>
                </div>
                
                <div class="text-center">
                <button id='submit-signin' type="Submit" class="btn btn-primary">Sign In</button>
                </div><br>
           
            </form>
            </div>
            <div class='row justify-content-center'>
            <form method='POST' action="https://cs.tru.ca/~f3zabel/Project/controller.php">
                <input type='hidden' name='page' value='view_startPage'>
                <input type='hidden' name='command' value='SignUp'>
            <button id='submit-signup' type="Submit" class="btn btn-light">Sign Up</button>
            <br> <br>
            </form>
            <br>  </br>

            </div>
        </div>
    </div>


</body>

<script>



</script>

</html>