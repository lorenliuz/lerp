<?php
?>


<!-- FOOTER -->
<footer id="footer" class="footer footer-fixed" data-background="content/index/images/assets/background_06.jpg">
    <div class="container">
        <h5 class="footer-subtitle playfair italic">This is easy.</h5>
        <h2 class="footer-title">Start creating a stunning <span class="playfair italic">website today.</span> </h2>
        <div class="xxs-mt">
            <a href="https://themeforest.net/item/quadra-creative-multipurpose-template/21409528" target="_blank" class="lg-btn long-btn font-12 uppercase bold bg-gradient qdr-hover-6 qdr-hover-4 bs-lg radius-lg">
                purchase quadra <span data-color="#fdca37">now</span>
            </a>
        </div>
        <div class="copyright">
            <h6 class="gray7">Quadra Website Template. © 2018 Powered With <i class="fa fa-heart" data-color="#6e0307"></i> by <a href="http://goldeyestheme.com/" target="_blank" class="underline-hover white-hover">GOLDEYES THEME</a></h6>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- Quick Contact Form -->
<div class="quick-contact-form border-colored">
    <h5 class="uppercase t-center extrabold">Drop us a message</h5>
    <p class="t-center normal">You're in the right place! Just drop us a message. How can we help?</p>
    <!-- Contact Form -->
    <form class="quick_form" name="quick_form" method="post" action="php/quick-contact-form.php">
        <!-- Name -->
        <input type="text" name="qname" id="qname" required placeholder="Name" class="no-mt">
        <!-- Email -->
        <input type="email" name="qemail" id="qemail" required placeholder="E-Mail">
        <!-- Message -->
        <textarea name="qmessage" id="qmessage" required placeholder="Message"></textarea>
        <!-- Send Button -->
        <button type="submit" id="qsubmit" class="bg-colored white qdr-hover-6 uppercase extrabold">Send</button>
        <!-- End Send Button -->
    </form>
    <!-- End Form -->
    <a href="https://themeforest.net/user/goldeyes#contact" target="_blank" class="inline-block underline-hover uppercase extrabold h6">Or see contact page</a>
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

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/plugins/index/js/plugins.js?v=2.5"></script>
<script type="text/javascript">
    this.top.location !== this.location && (this.top.location = this.location);
</script>
<?php wp_footer(); ?>
</body>
<!-- Body End -->
</html>
