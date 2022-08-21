<?php
$page = basename($_SERVER["PHP_SELF"]);
?>
    </head>
    <body>
        <div class="navbar-content">
            <nav id="navbar">
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="<?php echo "personal_space.php" ?>" class="<?php
                        if ($page == "personal_space.php") {
                            echo "active";
                        } else {
                            echo "not-active";
                        }
                        ?>">Espace Personnel</a>
                    </li>
                    <li class="navbar-item" id="nav-right">
                        <a href="<?php echo "login.php?disconnected" ?>">
                            Se déconnecter</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main>
        <div class="main-content">