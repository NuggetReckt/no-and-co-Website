<?php
$page = basename($_SERVER["PHP_SELF"]);
?>
    </head>
<body>
<div class="navbar-content">
    <nav id="navbar">
        <ul class="navbar-list">
            <li class="navbar-item">
                <a href="<?php echo "index.php" ?>" class="<?php
                if ($page == "index.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Menu</a>
            </li>
            <li class="navbar-item" id="nav-right">
                <a href="<?php echo "login.php" ?>" class="<?php
                if ($page == "login.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Se déconnecter</a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <main>