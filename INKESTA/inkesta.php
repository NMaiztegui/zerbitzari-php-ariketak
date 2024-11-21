<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    if(!empty($_POST['option'])){
        echo'Zure emaitza bidali da';
        $emaitza=$_POST['option'];
        echo $emaitza;
    }
}
?>