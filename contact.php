<?php
require_once "assets/php/pager.php";
$pager = new Pager("Nous contacter");

$pager->setHeader();
?>
            <div class="top-content" id="top-content-contact">
                <div id="top-title">
                    <h1>Nous contacter</h1>
                    <span>Une question, un devis ou un renseignement ?</span> <span style="color: #1394C3">Contactez-nous</span><span> !</span>
                </div>
            </div>
            <div class="contact-form" id="contact-form">
                <form action="contact.php" method="POST">
                    <fieldset>
                        <div class="form-content">
                            <h1>Nous contacter</h1>
                            <label>Mail<br>
                                <input type="email" name="mail" class="input" placeholder="Votre adresse mail" required="">
                            </label>
                            <br>
                            <label>Objet<br>
                                <input type="text" name="object" class="input" placeholder="La nature de votre demande" required="">
                            </label>
                            <br>
                            <label>Message<br>
                                <textarea name="msg" id="msg" rows="5" required="" placeholder="Votre message" ></textarea>
                            </label>
                            <br>
                            <input type="submit" value="Envoyer">
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="sub-content" id="contact-content">
                <div id="contact-adresses">
                    <h1>Les adresses</h1>
                    <span style="color: #1394C3">Notre studio</span><span> : 53 Avenue Faidherbe - 93100 Montreuil</span>
                    <br>
                    <span style="color: #1394C3">Notre siège</span><span> : 11 bis Rue Lemercier - 75017 Paris</span>
                </div>
                <br>
                <div id="contact-tel">
                    <h1>Les numéros</h1>
                    <span style="color: #1394C3">Noël Morrow</span><span> : 06 63 33 35 02</span>
                    <br>
                    <span style="color: #1394C3">Catherine de Guirchitch</span><span> : 01 42 93 14 27</span>
                </div>
            </div>
<?php
$pager->setFooter();
?><?php
