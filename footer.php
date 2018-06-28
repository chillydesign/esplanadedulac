
<?php $tdu = get_template_directory_uri(); ?>

<footer>

    <div class="container">
        <form action="" >

        <div class="footer_columns">
            <div class="footer_column">
                <h3>L’Esplanade du Lac</h3>
                <p>
                    181, avenue de la Plage <br>
                    01220 Divonne les Bains - France <br>
                    Téléphone : 33.(0)4.50.99.17.70<br>
                    <a class="social_icon social_icon_instagram" href="#"></a>
                    <a class="social_icon social_icon_facebook" href="#"></a>
                </p>
            </div>

            <div class="footer_column ">
                <h3>Newsletter</h3>


                    <input type="text" autocomplete="given-name"  id="first_name" name="first_name" placeholder="Prénom" />
                    <input type="text" autocomplete="family-name" id="last_name" name="last_name" placeholder="Nom" />



            </div>
            <div class="footer_column footer_column_right">
              <div class="showonlyonbig" style="height:36px;"></div>
              <input type="text"   autocomplete="email" id="email" name="email" placeholder="Adresse email" />
              <button type="submit" id="submit_newsletter">S'inscrire</button>


                <?php $footer_poster = get_field('footer_poster', 'option'); ?>
                <?php $footer_poster_link = get_field('footer_poster_link', 'option'); ?>

                <?php if ($footer_poster && $footer_poster_link && false) : ?>
                    <a class="poster_link" target="_blank" href="<?php echo $footer_poster_link['url']; ?>">
                        <img src="<?php echo $footer_poster['url']; ?>" alt="<?php echo $footer_poster['caption']; ?>" />
                    </a>
                <?php endif; ?>

            </div>

        </div>
</form>
    </div>


    <nav>
        <div class="container">
            <ul>
                <?php chilly_nav('footer_nav'); ?>
                <li><a href="https://webfactor.ch">Website by Webfactor</a></li>
            </ul>
        </div>
    </nav>
</footer>


</main>



<?php wp_footer(); ?>
<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
<script type='text/javascript' src='//maps.google.com/maps/api/js?key=AIzaSyC-BDJZU14ltCrYRPei33a4ZSQfJqRbxNY&#038;ver=4.8.1'></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
<script>
// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
// ga('send', 'pageview');
</script>

</body>
</html>
