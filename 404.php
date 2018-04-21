<?php

get_header();
?>

    <!-- TEXTS -->
    <section id="pagenotfound" class="fullscreen height-auto-mobile t-center moving-container">
        <!-- Background image - you can choose parallax ratio and offset -->
        <div class="bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0"
             data-background="<?php echo get_template_directory_uri() ?>/assets/images/404.jpg"></div>
        <!-- Center Details -->
        <div class="v-center v-normal-mobile lg-py-mobile">
            <!-- Container to texts -->
            <div class="top-190 relative white container sm-pb-mobile moving">
                <h1 class="normal-subtitle oswald gray2 uppercase translatez-sm">也许，你要找的页面在雾霾的深处</h1>
                <h5 class="gray4 mini-mt semibold translatez-md"></h5>
                <div class="xs-mt bold uppercase translatez-lg">
                    <a href="index.html" class="lg-btn dark radius-lg font-12 bg-colored-hover white-hover bs-lg-hover slow bg-gray3">
                        <?php echo __( '返回首页', 'lerp' ); ?>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Center Details -->
    </section>
    <!-- END TEXTS -->

<?php get_footer();
