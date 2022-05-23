<?php
$page = basename($_SERVER["PHP_SELF"]);
?>
    </head>
        <body>
        <div class="navbar-content">
            <nav id="navbar">
                <ul class="navbar-list">
                    <li class="navbar-items">
                        <a href="<?php echo "lien.php"?>" <?php if ($page=="index.php") {echo "class='active'";}?>>Lien 1</a>
                    </li>
                    <li class="navbar-items">
                        <a href="<?php echo "lien.php"?>" <?php if ($page=="lien.php") {echo "class='active'";}?>>Lien 2</a>
                    </li>
                    <li class="navbar-items">
                        <a href="<?php echo "lien.php"?>" <?php if ($page=="lien.php") {echo "class='active'";}?>>Lien 3</a>
                    </li>
                    <li class="navbar-items">
                        <a href="<?php echo "lien.php"?>" <?php if ($page=="lien.php") {echo "class='active'";}?>>Lien 4</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <main>