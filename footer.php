<?php
/**
  * 主题footer
  */
?>

<!-- FOOTER -->
<footer id="footer" class="bg-black gray8 semibold md-py font-13">
    <div class="container-sm t-center">
        <p>
            Copyright © 2018 <a href="https://maxsey.com" target="_blank" class="colored underline-hover"><?php echo get_bloginfo(); ?></a>
        </p>
        <p>
            Theme <a href="https://maxsey.com" target="_blank" class="colored underline-hover">Lerp</a>. Design by <a href="https://maxsey.com">Maxsey</a>
        </p>
    </div>
</footer>
<!-- END FOOTER -->

<!-- 公告 -->
<div class="quick-contact-form border-colored">
    <h5 class="uppercase t-center extrabold">公告</h5>
    <p class="t-center normal">欢迎光临薄我的博客！</p>
</div>

<!-- Contact us button -->
<a href="#" class="drop-msg click-effect dark-effect"><i class="fa fa-envelope-o"></i></a>
<!-- Back To Top -->
<a id="back-to-top" href="#top"><i class="fa fa-angle-up"></i></a>

<!-- SEARCH FORM FOR NAV -->
<div class="fs-searchform">
    <form id="fs-searchform" class="v-center container" action="pages-search-results.html" method="get">
        <!-- Input -->
        <input type="search" name="q" id="q" placeholder="Search on website.com" autocomplete="off">
        <!-- Search Button -->
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
        <div class="recommended font-14 normal">
            <h5 class="rcm-title">Recommend Links;</h5>
            <a href="demo-antares.html">Quadra, Antares version</a>
            <a href="demo-athena.html">Beautiful Athena demo</a>
            <a href="elements-all.html">Awesome Quadra Elements</a>
            <a href="demo-feronia.html">Why i will use the Quadra?</a>
            <a href="demo-sun.html">Checkout the Sun demo</a>
            <a href="index.html">See 600+ templates</a>
        </div>
    </form>
    <div class="form-bg"></div>
</div>
<!-- END SEARCH FORM -->

<!-- Messages for contact form -->
<div id="error_message" class="clearfix">
    <i class="fa fa-warning"></i>
    <span>Validation error occured. Please enter the fields and submit it again.</span>
</div>
<!-- Submit Message -->
<div id="submit_message" class="clearfix">
    <i class="fa fa-check"></i>
    <span>Thank You ! Your email has been delivered.</span>
</div>


<!-- jQuery -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js?v=2.2"></script>
<!-- END JS FILES -->

</body>
<!-- Body End -->
</html>