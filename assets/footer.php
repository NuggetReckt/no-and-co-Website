        </div>
        </main>
        <div class="footer-content">
            <footer>
                <span>Copyright © No&Co 2022</span><br>
                <span>Développé avec ❤ par Corto Morrow</span>
            </footer>
        </div>
        <div id="scrollUp">
            <a href="#top"><img src="/assets/images/to_top.png" width="150%" alt="to-top"/></a>
        </div>
        <script>
            jQuery(function () {
                $(function () {
                    $(window).scroll(function () { //Fonction appelée quand on descend la page
                        if ($(this).scrollTop() > 180) {  // Quand on est à 180 pixels du haut de page,
                            $('#scrollUp').css('right', '5' + '0px');
                        } else {
                            $('#scrollUp').removeAttr('style'); // Enlève les attributs CSS affectés par javascript
                        }
                    });
                });
            });
        </script>
    </body>
</html>