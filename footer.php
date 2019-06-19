
<?php $tdu = get_template_directory_uri(); ?>

<footer>

  <div class="container">
    <!-- Begin MailChimp Signup Form -->
    <form action="https://esplanadedulac.us16.list-manage.com/subscribe/post?u=e264d1633f461b9da2d27deea&amp;id=dace487137" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

        <div class="footer_columns">
          <div class="footer_column">
            <h3>L’Esplanade du Lac</h3>
            <p>
              181, avenue de la Plage <br>
              01220 Divonne les Bains - France <br>
              Téléphone : 33.(0)4.50.99.17.70<br>
              <a target="_blank" class="social_icon social_icon_instagram" href="https://www.instagram.com/esplanadedulac/"></a>
              <a target="_blank" class="social_icon social_icon_facebook" href="https://www.facebook.com/lesplanadedulac/"></a>
            </p>
          </div>

          <div class="footer_column ">
            <h3>Newsletter</h3>




            <input type="text" autocomplete="given-name" placeholder="Prénom" name="FNAME" id="mce-FNAME" />
            <input type="text" autocomplete="family-name" placeholder="Nom" name="LNAME" id="mce-LNAME" />



          </div>
          <div class="footer_column footer_column_right">
            <div class="showonlyonbig" style="height:36px;"></div>
            <input type="text"   autocomplete="email" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Adresse email" />
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e264d1633f461b9da2d27deea_dace487137" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="S'inscrire" name="subscribe" id="mc-embedded-subscribe" class="button"></div>


            <?php $footer_poster = get_field('footer_poster', 'option'); ?>
            <?php $footer_poster_link = get_field('footer_poster_link', 'option'); ?>

            <?php if ($footer_poster && $footer_poster_link && false) : ?>
              <a class="poster_link" target="_blank" href="<?php echo $footer_poster_link['url']; ?>">
                <img src="<?php echo $footer_poster['url']; ?>" alt="<?php echo $footer_poster['caption']; ?>" />
              </a>
            <?php endif; ?>

          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"><span class="close">Fermer</span></div>
            <div class="response" id="mce-success-response" style="display:none"><span class="close">Fermer</span></div>
          </div>

        </div>
      </form>
      <!--End mc_embed_signup-->    </div>


      <nav>
        <div class="container">
          <ul>
            <?php chilly_nav('footer_nav'); ?>
            <li><a target="_blank" href="https://webfactor.ch">Website by Webfactor</a></li>
          </ul>
        </div>
      </nav>
    </footer>


  </main>



  <?php wp_footer(); ?>
  <script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
  <script type='text/javascript' src='//maps.google.com/maps/api/js?key=AIzaSyCoHn6xGs3f0pMSx7zh7D0M1w1K6iS51tc&#038;ver=4.8.1'></script>
  <script type="text/javascript" src="<?php echo $tdu; ?>/js/featherlight.min.js?v=<?php echo wf_version(); ?>"></script>
  <script type="text/javascript" src="<?php echo $tdu; ?>/js/slick.min.js?v=<?php echo wf_version(); ?>"></script>
  <script type="text/javascript" src="<?php echo $tdu; ?>/js/scripts.js?v=<?php echo wf_version(); ?>"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114588276-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114588276-4');
</script>


</body>
</html>
