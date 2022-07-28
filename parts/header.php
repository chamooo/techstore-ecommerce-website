<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="/all-products/assets/css/all-products.css">
<!-- BOOTSTRAP -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
<!-- jQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Online Store</title>
</head>
<body>
<header class="header">
        <div class="header__container container">
            <div class="header__logo">
                <a href="../index.php" style="text-decoration: none; color: #000;">
                    <img src="/assets/img/header/logo.svg">
                    <div class="header__label">
                        <h3>Гаджетаріум</h3>
                        <h5>Магазин цифрових рішень</h5>
                    </div>
                </a>
            </div>
            <nav class="header__nav">
                <ul>
                    <li>
                        <a href="/all-products/all-products.php">Всі</a>
                    </li>
                    <li>
                        <a href="/all-products/all-products.php?category=Смартфони">Телефони</a>
                    </li>
                    <li>
                        <a href="/all-products/all-products.php?category=Планшети">Планшети</a>
                    </li>
                    <li>
                        <a href="/all-products/all-products.php?category=Ноутбуки">Ноутбуки</a>
                    </li>
                </ul>
            </nav>
            <a href="tel:+771722645555" class="header__phone">+7 7172 264 55 55</a>
            <button class="header__auth">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 285.5 285.5" style="enable-background:new 0 0 285.5 285.5;" xml:space="preserve">
                    <g id="XMLID_791_">
                    <path id="XMLID_792_" d="M142.75,125.5c34.601,0,62.751-28.149,62.751-62.75S177.351,0,142.75,0S79.999,28.149,79.999,62.75
                        S108.149,125.5,142.75,125.5z M142.75,30c18.059,0,32.751,14.691,32.751,32.75S160.809,95.5,142.75,95.5
                        s-32.751-14.691-32.751-32.75S124.691,30,142.75,30z"/>
                    <path id="XMLID_795_" d="M142.75,155.5c-63.411,0-115,51.589-115,115c0,8.284,6.716,15,15,15h200c8.284,0,15-6.716,15-15
                        C257.75,207.089,206.161,155.5,142.75,155.5z M59.075,255.5c7.106-39.739,41.923-70,83.675-70s76.569,30.261,83.675,70H59.075z"/>
                </svg>
                <span>Вхід</span>
            </button>
            <div class="header__cart">
                <a href="/cart/cart.php">
                    <img src="/assets/img/header/shopping-cart.svg">
                </a>
                <div>
                    <p><span> <?= $sum['SUM(price)'] ?> </span> грн.</p>
                    <p class="arrow-drop"></p>
                </div>
            </div>
            <div class="header__burger">
                <span></span>
            </div>
        </div>
	</header>