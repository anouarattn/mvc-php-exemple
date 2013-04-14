
<script type="text/javascript">var headID = document.getElementsByTagName("head")[0];
    var cssNode = document.createElement('link');
    cssNode.type = 'text/css';
    cssNode.rel = 'stylesheet';
    cssNode.href = '/mvc_test/libs/css/animateur.css';
    cssNode.media = 'screen';
    headID.appendChild(cssNode);</script>







<div id="cv" class="instaFade">
    <div class="mainDetails">
        <div id="headshot" class="quickFade">
            <img src=<?php echo "/mvc_test/image/get?val=" . $_GET["Photo"] ?> alt=<?php echo $_GET["Nom"] . " " . $_GET["Prenom"] ?> />
        </div>

        <div id="name">
            <h1 class="quickFade delayTwo"><?php echo $_GET["Nom"] . " " . $_GET["Prenom"] ?></h1>
            <h2 class="quickFade delayThree">Animateur</h2>
        </div>

        <div id="contactDetails" class="quickFade delayFour">
            <ul>
                <li>Identifiant: <?php echo $_GET["identifiant"] ?></li>
                <li>e-mail: <?php echo $_GET["e-mail"] ?></li>
                <li>CIN: <?php echo $_GET["CIN"] ?></li>
                <li>Adresse: <?php echo $_GET["Adresse"] ?></li>
                <li>Tel: <?php echo $_GET["Téléphone"] ?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div id="mainArea" class="quickFade delayFive">

        <section>
            <div class="sectionTitle">
                <h1>Formation Animer</h1>
            </div>

            <div class="sectionContent">
                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">April 2011 - Present</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>

                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">Janruary 2007 - March 2011</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>

                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">October 2004 - December 2006</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>
            </div>
            <div class="clear"></div>
        </section>





    </div>
</div>

</body>
</html>

