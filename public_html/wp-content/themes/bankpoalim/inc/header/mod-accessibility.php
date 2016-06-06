<?php if(is_home() || is_front_page()):?>
    <div class="wrapper relative">
      <!-- to prevent autofocus on windows-->
      <?php
    //   home, template-about,
      ?>
        <nav class="accessible-nav">
            <a id="first-a-link" href="#content" tabindex="1" class="accessible-nav-link">Jump to content</a>
            <a href="#page-footer" tabindex="1" class="accessible-nav-link">Jump to footer</a>
            <a href="./home.html" tabindex="1" class="accessible-nav-link">Go to homepage</a>
        </nav>
    </div>
    <script>
        document.getElementById('first-a-link').blur();
    </script>
<?php endif; ?>
