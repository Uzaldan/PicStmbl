<?php
$conn = mysqli_connect('localhost', 'f3zabel', 'f3zabel136', 'C354_f3zabel');
error_reporting(E_ALL ^ E_NOTICE && E_WARNING);

$display_modal_window = '';
session_start();
if (empty($_POST['page']))
    $_POST['page'] = '';
$SessionInactive = empty($_SESSION['user']);
if ($SessionInactive && empty($_POST['page'])) {
    include("view_startpage.php");
    exit();
} else if ($_POST['page'] == 'view_startPage') {
    $command = $_POST['command'];
    switch ($command) { // When a command is sent from the client through the SignIn modal window
        case 'SignIn': // With username and password
            if (isValid($_POST['Username'], $_POST['Password'])) {

                $_SESSION['user'] = $_POST['Username'];
                include('view_Profile.php'); // The user will see MainPage.
                //$UserAlbums =  getAlbums();
                exit();
            } else
                $display_modal_window = 'signinError'; // It will display the start page with the SignIn box.
            include('view_startpage.php'); // The user will see StartPage.
            exit();
        case 'SignUp': // With username, password and email
            include('view_SignUp.php');
            exit();
        case 'Profile':
            include('view_Profile.php'); // The user will see MainPage.
            //$UserAlbums =  getAlbums();
            exit();




        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        default:
            include('view_startpage.php');
            exit();
    }
} else if ($_POST['page'] == 'view_SignUp') {
    $command = $_POST['command'];
    switch ($command) {

        case 'SignUp':
            ASignUp($_POST['Username'], $_POST['Password'], $_POST['Email']);
            include('view_startpage.php');
            exit;
        case 'Cancel':
            exit;
        default:
            include('view_startpage.php');
            exit();
    }
} else if ($_POST['page'] == 'view_MainPage') {
    $command = $_POST['command'];

    switch ($command) { // When a command is sent from the client through the SignIn modal window
        case 'SignOut': // With username, password, email, some other information
            include('view_startpage.php');
            exit();
        case 'PostAQuestion': // With username, password, email, some other information
            NewQuestionF($_POST['Question'], $_SESSION['user']);

            exit();
        case 'SearchQuestions': // With username, password, email, some other information
            $result = SearchQuestions($_POST['searchTerm']);
            if ($result != FALSE) {
                $data_to_be_displayed = json_encode($result);
                echo '<p> Questions:  ' . $data_to_be_displayed . '</p>';
                exit();
            } else
                exit;


        default:
            include('view_startpage.php');
            exit();
    }
} else if ($_POST['page'] == 'view_Profile') {
    $command = $_POST['command'];
    switch ($command) {
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        case 'Pictures':
            include('view_pictures.php');
            echo (getPhotos($_SESSION['user']));
            //$UserPhotos =  getPhotos();
            exit();
        case 'Settings': // With username, password, email, some other information
            include('view_Settings.php');
            exit();
        case 'Stmbl': // With username, password, email, some other information
            include('view_Search.php');
            echo (StmblSearch());
            exit();
        case 'Chat': // With username, password, email, some other information
            include('view_Chat.php');
            exit();
        case 'UploadFiles':
            UploadFile($_SESSION['user']);
            AddPhoto($_FILES["fileToUpload"]['name'], $_SESSION['user']);
            include('view_pictures.php');
            exit;
        //Addphotos($_POST['photos'],$_SESSION['user']);
        case 'Album':
            include('view_album.php');

        default:
            include('view_startpage.php');
            exit();
    }
} else if ($_POST['page'] == 'view_image') {
    $command = $_POST['command'];
    switch ($command) {
        case 'AddTags': // With username, password, email, some other information
            AddTags($_POST['Tags']);
            exit();
        case 'Profile':
            include('view_Profile.php');
            //$UserAlbums =  getAlbums();
            exit();
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        default:
            include('view_startpage.php');
            exit();

    }
} else if ($_POST['page'] == 'view_Album') {
    $command = $_POST['command'];
    switch ($command) {
        case 'AddAlbumTags':
            exit();
        case 'Profile':
            include('view_Profile.php');
            //$UserAlbums =  getAlbums();
            exit();
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        default:
            include('view_.php');
            exit();
    }
} else if ($_POST['page'] == 'view_Search') {
    $command = $_POST['command'];
    switch ($command) {
        case 'Stmbl':
            include('view_Search.php');
            echo StmblSearch();
            exit();
        case 'Profile':
            include('view_Profile.php');
            //$UserAlbums =  getAlbums();
            exit();
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        default:
            include('view_Profile.php');
            exit();
    }
} else if ($_POST['page'] == 'view_Settings') {
    $command = $_POST['command'];
    switch ($command) {
        case 'ChangeUsername':
            $result = ChangeUsername($_POST['Username'], $_SESSION['user']);
            echo $result . ' ' . $_POST['Username'] . ' ' . $_SESSION['user'];
            $_SESSION['user'] = $_POST['Username'];
            exit;
        case 'ChangePassword':
            if (ChangePassword($_POST['Password'], $_SESSION['user'])) {
                session_unset();
                session_destroy();
                include('view_startpage.php');
                exit();
            } else {
                exit();
            }
        case 'DeleteUser':
            $result = deleteUser();
            include('view_startpage.php');
            exit();
        case 'Profile':
            include('view_Profile.php');
            //echo getAlbums();
            exit();
        case 'ChangeMisc':
            $result = ChangeMisc($_POST['BlockTags'], $_POST['BlockUsers'], $_POST['Pvisibility'], $_SESSION['user']);
            include('view_Profile.php');
            exit();
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
    }
} else if ($_POST['page'] == 'view_pictures') {
    $command = $_POST['command'];
    switch ($command) {
        case 'Profile':
            include('view_Profile.php');
            //echo getAlbums();
            exit();
        case 'SignOut': //unloads and kills session returns to login
            session_unset();
            session_destroy();
            include('view_startpage.php');
            exit();
        default:
            include('view_Profile.php');
            exit();
    }
} else {
    session_unset();
    session_destroy();
    include('view_startpage.php');
    exit();
}

function GetAlbums()
{
    include('Model.php');
    return MGetAlbums($_SESSION['user']);
}

function NewQuestionF($question, $user)
{
    include('Model.php');
    $result = AddQuestion($question, $user);
    return $result;
}
function isValid($u, $p) //checks if username and password are valid
{
    include('Model.php');
    $result = signIn($u, $p);
    return $result;
}
function ASignUp($u, $p, $e) //Creates new user
{
    include('Model.php');
    $result = AddUsername($u, $p, $e, );
    return $result;

}
function deleteUser()
{
    include('Model.php');

    return MdeleteUser($_SESSION['user']);
}
function getPhotos($username)
{
    include('Model.php');
    $photos = (AlluserPhotos($username));

    foreach ($photos as $photo) {
        $retstr .= PhotoDisplay($photo[0]);
        ;

    }
    return ($retstr);
}
function PhotoDisplay($photoname)
{
    $dir = $photoname;
    $imagestr = "<img class=\"mx-auto d-block\" src=\"" . $_SESSION['user'] . '\\' . $dir . "\">";
    return $imagestr;
}
function StmblSearch()
{	   //does a random search can include tags, will ignore photos that have a blocked tag and blocked user
    include('Model.php');
    $photoname = MStmblSearch($_SESSION['user']);
    $result = PhotoCenteredDisplay($photoname);
    return $result;
}
function AddTags($tags)
{  //adds tags to a photo
    include('Model.php');
    $result = MAddTags($tags);
    return $result;
}
function AddATags($tags)
{  //adds tags to an album
    include('Model.php');
    $result = MAddATags($tags);
    return $result;
}
function Addphoto($photo, $u)
{    //Adds a new photo to the database
    include('Model.php');
    $result = MAddphoto($photo, $u);
    return $result;
}
function AddAlbum($album, $u)
{      //adds a new album to the database
    include('Model.php');
    $result = MAddAlbum($album, $u);
    return $result;
}
function ChangeMisc($tags, $blocked, $private, $u)
{     //Changes the privacy setting, Blocked Users and Blocked tags for a user
    include('Model.php');
    $result = MChangeMisc($tags, $blocked, $private, $u);
    return $result;
}
function ChangeUsername($newusername, $u)
{     //changes username of current user
    include('Model.php');
    $result = MChangeUsername($newusername, $u);
    return $result;
}
function ChangePassword($newpassword, $u)
{      //changes password of current user
    include('Model.php');
    $result = MChangepassword($newpassword, $u);
    return $result;
}
function PhotoCenteredDisplay($Photoname)
{

    $dir = getUserNamefPname($Photoname) . '/' . $Photoname;
    $imagestr = "<img class=\"mx-auto d-block\" src=\"" . $_SESSION['user'] . '\\' . $dir . "\" style='max-width:1080px; max-height:520 ;overflow:hidden;'>";
    return $imagestr;
}
function UploadFile($username)
{
    $target_dir = $username . "/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0733, true);
    }
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>