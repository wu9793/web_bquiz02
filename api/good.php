<?php include_once "db.php";

if($Log->count(['news'=>$_POST['news'],'acc'=>$_SESSION['user']])>0){
    $Log->del(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good'];
}else{
    $Log->save(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good']++;
}

$News->save($news);
?>