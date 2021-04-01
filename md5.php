<?php
    session_start();
    include 'logging.php';
    //echo $_SESSION['path'];
    if(isset($_GET['file'])){
        $file = str_replace('<','',$_GET['file'],$i);
        if ($i){
                die();
        }
        $a = md5_file($file);
        echo '<b>MD5 '.$file.':</b>';
        echo '<br>'.$a;
        echo "<br><a href='./index.html'>Back</a>";
    }
    else{
        $a = md5_file($_SESSION['path']);
        echo '<b>MD5 '.$_SESSION['path'].':</b>';
        echo '<br>'.$a;
        echo "<br><a href='./index.html'>Back</a>";
    }

	/*DienTapATTT{nobug_nobounty__bigbug_bigbounty_nopain_nogain}*/
?>
