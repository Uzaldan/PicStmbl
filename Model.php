<?php
function getUserName($Id)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select Username from Users where id='$Id'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function getUserNamefPname($name)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select UID from Photos where Name='$name";
    $result = mysqli_query($conn, $sql);
    $Uid = implode(mysqli_fetch_assoc($result));
    $username = getUserName($Uid);
    return ($username);
}
function MdeleteUser($username)
{
    global $conn;
    $sql = "DELETE FROM Users WHERE Username ='$username'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getUId($username)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select id from Users where Username='$username'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function getPhotoName($PId)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select Name from Photos where PId='$PId'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function getPId($Photoname)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select PId from Photos where Name='$Photoname'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function getAId($Albumname)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select PId from Albums where Name='$Albumname'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function getAlbumName($AId)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select Name from Album where AId='$AId'";
    $result = mysqli_query($conn, $sql);
    return implode(mysqli_fetch_assoc($result));
}
function checkUsername($username)
{ // It returns a Boolean value.
    global $conn;
    $sql = "Select username from Users where username='$username'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if (!empty($result)) {
        return true;
    } else {
        return 0;
    }
}
function AddUsername($username, $password, $email)
{ // It returns a Boolean value.
    global $conn;
    $date = date("Ymd");
    if (!checkUsername($username)) {
        $sql = "insert into Users values (NULL,'$username', '$password', 0, '$email',NULL,NULL, '$date',NULL)";
        $result = mysqli_query($conn, $sql);
        return true;
    } else {
        return 0;
    }
}
function checkPassword($username, $password)
{ // It returns a Boolean value.
    global $conn;
    if (checkUsername($username)) {
        $sql = "Select UPassword from Users where username='$username'";
        $result = mysqli_query($conn, $sql);
        if (implode(mysqli_fetch_assoc($result)) == $password)
            return true;
        else
            return 0;
    }
}
function signIn($username, $password)
{
    if ($result = checkPassword($username, $password))
        return true;
    else
        return 0;

}
function AlluserPhotos($username)
{
    global $conn;
    $uid = getUId($username);
    $sql = "select Name from Photos where UId='$uid'";
    $result = mysqli_query($conn, $sql);
    $photos = (mysqli_fetch_all($result));
    return $photos;
}
function AddQuestion($Question, $Username)
{ // It returns a Boolean value.
    global $conn;
    $date = date("Ymd");
    if (!empty($Question)) {
        $sql = "insert into Questions values (NULL,'$Question', '$Username', '$date')";
        $result = mysqli_query($conn, $sql);
        return true;
    } else {
        return 0;
    }
}
function QuestionLookup($searchTerm)
{ // It returns a Boolean value.
    global $conn;
    if (!empty($searchTerm)) {
        $sql = "Select * from Questions where Question like'%$searchTerm%'";
        $result = mysqli_query($conn, $sql);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $array;
    } else {
        return 0;
    }
}
function MChangeUsername($username, $u)
{ // It returns a Boolean value.
    global $conn;
    if (checkUsername($u)) {
        $sql = "UPDATE Users SET username='$username' WHERE username='$u'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
function MChangepassword($password, $u)
{ // It returns a Boolean value.
    global $conn;

    $sql = "UPDATE Users SET UPassword='$password' WHERE username='$u'";
    $result = mysqli_query($conn, $sql);
    if (!empty($result)) {
        return true;
    } else {
        return 0;

    }
}
function MChangeMisc($tags, $blocked, $private, $u)
{ // It returns a Boolean value.
    global $conn;

    $sql = "UPDATE Users SET Tags = '$tags', Blocklist = '$blocked', UPrivate = '$private' WHERE username='$u'";
    $result = mysqli_query($conn, $sql);
    return $result;


}

function MStmblSearch($username)
{
    global $conn;
    $uid = getUId($username);
    $uid = '4';
    $sql = "select Name, tags, UId from Photos where UId not like'$uid'";
    $result = mysqli_query($conn, $sql);
    $photos = (mysqli_fetch_all($result));
    return PickUnblocked($photos, $uid);
}
function PickUnblocked($photoinfo, $uid)
{
    global $conn;
    $sql = "select Tags, Blocklist from Users where Id='$uid'";
    $result = mysqli_query($conn, $sql);
    $misc = (mysqli_fetch_assoc($result));
    if (explode(' ', $misc['Tags']))
        $Btags = explode(' ', $misc['Tags']);
    else
        $Btags = $misc['Tags'];
    if (explode(' ', $misc['Blocklist']))
        $BUsers = explode(' ', $misc['Blocklist']);
    else
        $BUsers = $misc['Blocklist'];
    $photos = $photoinfo;
    $possiblephotos = array();

    $cond = 1;
    foreach ($photos as $photo) {
        $cond = 1;
        foreach ($Btags as $tag) {
            if ($tag == $photo[1] && $photo[1] != null) {
                $cond = 0;
            }

        }
        foreach ($BUsers as $user) {
            $username = getUserName($photo[2]);
            if ($user == $username) {
                $cond = 0;
            }
        }
        if ($cond == 1)
            array_push($possiblephotos, $photo[0]);


    }
    $rand_photo = array_rand($possiblephotos, 1);


    return $possiblephotos[$rand_photo];
}




function MAddPhoto($Photoname, $Username)
{
    global $conn;
    $uid = getUId($Username);
    $sql = "insert into Photos values (NULL,NULL,'$uid',NULL,'$Photoname',DEFAULT)";
    $result = mysqli_query($conn, $sql);
    return $result;

}
function getFirstPhoto($AId)
{
    global $conn;
    $sql = "Select Photos from Albums where Name='$AId'";
    $result = mysqli_query($conn, $sql);
    $Pids = (mysqli_fetch_assoc($result));
    return var_dump($Pids);

}



?>