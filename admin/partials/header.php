    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

    // session_start();
    // $is_session = isset($_SESSION['user_id']) && $_SESSION['user_id'] != null;
    // $is_cookie = isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != null;

    // if ($is_session || $is_cookie) {
    //     $userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];
    //     $sql = "SELECT * FROM user WHERE id = '" . $userID . "'";
    //     $result = mysqli_query($conn, $sql);
    //     $user = $result->fetch_assoc();
    //     if ($user['role'] != "admin") {
    //         header('Location: ../modals/login.php');
    //     }
    // } else {
    //     header('Location: ../modals/login.php');
    // }
    ?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="/admin/assets/vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/admin/assets/css/select-option.css" rel="stylesheet">


</head>

<body id="page-top">