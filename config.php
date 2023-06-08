<?php
ob_start();
ini_set('date.timezone','Asia/Manila');
date_default_timezone_set('Asia/Manila');
session_start();
// This part for '/' page.
if (stripos($_SERVER['REQUEST_URI'], 'view_events')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // if admin will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='2'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='3'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='4'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else{
            // the clients,membership,youthpeople will restrict admin page!
        }
    }

} if (stripos($_SERVER['REQUEST_URI'], 'church_officers')){
    if(isset($_SESSION['userdata'])){ // if user loggin.
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // if admin will restrict accessing 'church_officers' redirect to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'church_officers' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='2'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='3'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='4'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else{
            // the clients,membership,youthpeople will not restrict 'church_officers' page!
        }
    } else{
        echo '<script>location.href="./login"</script>';
            // if not loggin will redirect to login page.
    }

} if (stripos($_SERVER['REQUEST_URI'], 'view_topics')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'church_officers' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='2'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='3'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='4'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else{
            // if client will not restrict
        }
    }
} if (stripos($_SERVER['REQUEST_URI'], 'schedule')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'church_officers' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='2'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='3'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='4'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else{
            // if client will not restrict
        }
    }
} if (stripos($_SERVER['REQUEST_URI'], 'about')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'church_officers' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='2'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='3'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else if($_SESSION['userdata']['status']=='4'){
            echo '<script>location.href="index.php"</script>';
            // if pastor will restrict accessing 'events' redirect to admin page!
        }
        else{
            // if client will not restrict
        }
    }
} if (stripos($_SERVER['REQUEST_URI'], 'index')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else{
            // if client will not restrict
        }
    }
} if (stripos($_SERVER['REQUEST_URI'], 'articles')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            echo '<script>location.href="admin"</script>';
            // the admin will restrict homepage!
        }
        else if($_SESSION['userdata']['type']=='3'){
            echo '<script>location.href="admin"</script>';
            // if pastor will restrict accessing 'church_officers' redirect to admin page!
        }
        else{
            // if client will not restrict
        }
    }
} if (stripos($_SERVER['REQUEST_URI'], 'new')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['status']=='2'){
            // the client will not restrict
        }
        else{
            echo '<script>location.href="./"</script>';
            // if client will restirct.
        }
    } else{
            echo '<script>location.href="./"</script>';
            // if guest will restirct.
    }
} if (stripos($_SERVER['REQUEST_URI'], 'my_user')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['status']=='1'){
            // the client will not restrict
        }
        else{
            echo '<script>location.href="./"</script>';
            // if client will restirct.
        }
    } else{
            echo '<script>location.href="./"</script>';
            // if guest will restirct.
    }
}

// This part for '/admin' page.
if (stripos($_SERVER['REQUEST_URI'], 'admin')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'ad_event')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'api')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'appointment')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'blogs')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'daily_verse')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'sched_req_type')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'set_officer')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'system_info')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'topic_type')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'aduser')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user_admin')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user_client')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user_membership')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user_pastor')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user_youthpeople')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'verify_client')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'verify_membership')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'verify_pastor')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'verify_youthpeople')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // if admin will not restrict to admin page!
        }
        else if($_SESSION['userdata']['type']=='3'){
            // if pastor will not restrict to admin page!
        }
        else{
            header("Location:../");
            // the clients,membership,youthpeople will restrict admin page!
        }
    } else {
        echo '<script>location.href="../login"</script>';
            // if not loggin will redirect to login page.
    }
}
if (stripos($_SERVER['REQUEST_URI'], 'user')){
    if(isset($_SESSION['userdata'])){
        if($_SESSION['userdata']['type']=='1'){
            // the admin will not restrict
        }
        else if($_SESSION['userdata']['type']=='3'){
            // the admin will not restrict
        }
        else{
            echo '<script>location.href="./"</script>';
            // if non admin will restirct.
        }
    } else{
            echo '<script>location.href="./"</script>';
            // if guest will restirct.
    }
}
require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/SystemSettings.php');
$db = new DBConnection;
$conn = $db->conn;

function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="'.base_url .$url.'"</script>';
}
function validate_image($file){
	if(!empty($file)){
			// exit;
		if(is_file(base_app.$file)){
			return base_url.$file;
		}else{
			return base_url.'dist/img/no-image-available.png';
		}
	}else{
		return base_url.'dist/img/no-image-available.png';
	}
}
function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone', 
        '/ipod/i' => 'iPod', 
        '/ipad/i' => 'iPad', 
        '/android/i' => 'Android', 
        '/blackberry/i' => 'BlackBerry', 
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile User Agent is detected
    foreach($aMobileUA as $sMobileKey => $sMobileOS){
        if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }
    }
    //Otherwise return false..  
    return false;
}
ob_end_flush();
?>