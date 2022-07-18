<?php
$page = basename($_SERVER["PHP_SELF"]);
?>
    </head>
<body>
<div class="navbar-content">
    <nav id="navbar">
        <ul class="navbar-list">
            <li class="navbar-item">
                <a href="<?php echo "panel.php" ?>" class="<?php
                if ($page == "panel.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Menu</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "add_project.php" ?>" class="<?php
                if ($page == "add_project.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Nouveau projet</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "add_account.php" ?>" class="<?php
                if ($page == "add_account.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Nouveau compte</a>
            </li>
            <li class="navbar-item" id="nav-right">
                <a href="<?php echo "login.php" ?>">
                    Se déconnecter</a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <main>