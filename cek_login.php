<?php
session_start();
include"../koneksi.php";
$id_user=$_POST['id_user'];
$pass=md5($_POST['password']);
$sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
if ($_POST["captcha_code"]==$_SESSION["captcha_code"]){
    $login=mysql_query(con,$sql);
    $ketemu=mysql_num_rows($login);
    $r=mysql_fetch_array($login);
    if($ketemu>0){
        $_SESSION['iduser']=$r['id_user'];
        $_SESSION['passuser']=$r['pasword'];
        echo"USER BERHASIL LOGIN <br>";
        echo "id_user=",$_SESSION['iduser'],"<br>";
        echo "<a href=logout.php><b>LOGOUT</b</a></center>";
    }
    else{
        echo "<center>login gagal! username & password tidak benar<br>";
        echo "<a href=form_login.php><b>ULANGI LAGI</br></a></center>";
    }
    mysqli_close($con);
}else {
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center";
}
?>