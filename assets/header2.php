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
                ?>">Accueil</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "galerie.php" ?>" class="<?php
                if ($page == "galerie.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Galerie</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "projets.php" ?>" class="<?php
                if ($page == "projets.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Les projets</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "materiel.php" ?>" class="<?php
                if ($page == "materiel.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Le matériel</a>
            </li>
            <li class="navbar-item">
                <a href="<?php echo "contact.php" ?>" class="<?php
                if ($page == "contact.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Nous contacter</a>
            </li>
            <li class="navbar-item" id="nav-right">
                <a href="<?php echo "login.php" ?>" class="<?php
                if ($page == "login.php") {
                    echo "active";
                } else {
                    echo "not-active";
                }
                ?>">Login</a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <main>