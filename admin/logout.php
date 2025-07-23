<!-- masukan kode untuk logout disini -->
<?php
    session_unset();
    session_destroy();

    header("location:../login.php");
    exit();
?>