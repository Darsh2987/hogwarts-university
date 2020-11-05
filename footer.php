<footer class="footer">
  <h1 class="hogwarts-logo-text">
    <a href="<?php echo site_url() ?>"><strong>Hogwarts</strong> University</a>
  </h1>

  <div class="footer--menus">
    <div class="footer--main-menu">
      <h3>Explore</h3>
      <nav>
        <?php wp_nav_menu(array(
          "theme_location" => "footerMenuLocationOne"
        )); ?>
      </nav>
    </div>
      
    <div class="footer--sub-menu">
      <h3>Learn</h3>
      <nav>
        <?php wp_nav_menu(array(
          "theme_location" => "footerMenuLocationTwo"
        )); ?>
      </nav>
    </div>
  </div>

  <div class="footer--social-icons">
    <h3>Connect With Us</h3>
    <ul>
      <li>
        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
      </li>
    </ul>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>