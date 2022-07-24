<?php
     require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
?>
    
<?php
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
        $_SESSION['user_id']=null;
        header('Location: ../index.php');
    }

    if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != null) {
        $_COOKIE['user_id']=null;
        setcookie('user_id', '', 0, '/');
        header('Location: ../index.php');
    }
?>



<?php
     require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>