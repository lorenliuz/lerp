<?php
/**
 * 主题header
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!--Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/plugins.css?v=2.2"/>
    <!-- Main Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css?v=2.2"/>
    <!-- Color Skins -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/skins/default.css"/>
    <!-- End Page Styles -->

    <?php wp_head(); ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
</head>

<!-- BODY START -->
<body <?php body_class(); ?>>
<!-- LOADER -->
<div class="page-loader bg-white">
    <div class="v-center t-center">
        <div class="spinner">
            <div class="spinner__item1 bg-dark"></div>
            <div class="spinner__item2 bg-dark"></div>
            <div class="spinner__item3 bg-dark"></div>
            <div class="spinner__item4 bg-dark"></div>
        </div>
    </div>
</div>

<!-- NAVIGATION -->
<nav id="navigation" class="white-nav transparent modern hover4 radius-drop" data-offset="55">
    <!-- Columns -->
    <div class="columns clearfix container-xl">
        <!-- Logo -->
        <div class="logo">
            <a href="index.html">
                <img src="images/logos/logo_03.png" data-second-logo="images/logos/logo_01.png" alt="Logo">
                <!-- Retina Logo -->
                <img src="images/logos/logo_03@2x.png" data-second-logo="images/logos/logo_01@2x.png"
                     class="retina-logo" alt="Logo">
            </a>
        </div>
        <!-- Right Elements; Nav Button, Language Button, Search .etc -->
        <div class="nav-elements">
            <ul class="clearfix nav no-ls normal">
                <!-- Search Button -->
                <li><a href="#" class="search-form-trigger"><i class="fa fa-search"></i></a></li>
                <!-- Item With Dropdown -->
                <!--                <li class="dropdown-toggle"><a href="#" class="flag-item"><img src="images/flag-usa.png" alt=""> <span>En</span></a>-->
                <!-- Dropdown -->
                <!--                    <ul class="dropdown-menu capitalize medium to-right">-->
                <!-- Item -->
                <!--                        <li><a href="#" class="flag-item"><img src="images/flag-uk.png" alt=""> <span>UK</span></a></li>-->
                <!-- Item -->
                <!--                        <li><a href="#" class="flag-item"><img src="images/flag-turkish.png" alt=""> <span>TR</span></a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>
        </div>
        <!-- End Navigation Elements -->
        <!-- Navigation Menu -->
        <div class="nav-menu">
            <ul class="nav clearfix uppercase">
                <li><a href="index.html">Layouts</a></li>
                <li class="dropdown-toggle"><a href="#" class="stay">Features</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">Sliders <span
                                        class="mark bg-danger border-danger white">new</span></a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="slider-rs-premium-demos.html">Revolution Slider <span
                                                class="mark bg-danger border-danger white">new</span></a></li>
                                <li class="dropdown-toggle"><a href="#" class="stay">Slick Slider <span
                                                class="mark bg-danger border-danger white">new</span></a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="slider-slick-1.html">Slick Slider 1</a></li>
                                        <li><a href="slider-slick-2.html">Slick Slider 2</a></li>
                                        <li><a href="slider-slick-3.html">Slick Slider 3</a></li>
                                        <li><a href="slider-slick-4.html">Slick Slider 4</a></li>
                                        <li><a href="slider-slick-5.html">Slick Slider 5</a></li>
                                        <li><a href="slider-slick-6.html">Slick Slider 6</a></li>
                                        <li><a href="slider-slick-7.html">Slick Slider 7</a></li>
                                        <li><a href="slider-slick-8.html">Slick Slider 8</a></li>
                                        <li><a href="slider-slick-9.html">Slick Slider 9</a></li>
                                        <li><a href="slider-slick-10.html">Slick Slider 10</a></li>
                                        <li><a href="slider-slick-11.html">Slick Slider 11</a></li>
                                        <li><a href="slider-slick-12.html">Slick Slider 12</a></li>
                                        <li><a href="slider-slick-13.html">Slick Slider 13 <span
                                                        class="mark bg-danger border-danger white">new</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Headers</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="header-classic.html">Classic</a></li>
                                <li class="dropdown-toggle"><a href="#" class="stay">Colors</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="header-color-1.html">Primary</a></li>
                                        <li><a href="header-color-2.html">Warning</a></li>
                                        <li><a href="header-color-3.html">Default</a></li>
                                        <li><a href="header-color-4.html">Success</a></li>
                                        <li><a href="header-color-5.html">Custom</a></li>
                                    </ul>
                                </li>
                                <li><a href="header-custom-size.html">Custom Size</a></li>
                                <li><a href="header-dark.html">Dark Tone</a></li>
                                <li><a href="header-fading.html">Fading Effect</a></li>
                                <li><a href="header-slider.html">Background Slider</a></li>
                                <li class="dropdown-toggle"><a href="#" class="stay">Gradients</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="header-gradient-1.html">Gradient 1</a></li>
                                        <li><a href="header-gradient-2.html">Gradient 2</a></li>
                                        <li><a href="header-gradient-3.html">Gradient 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="header-mini.html">Mini Header</a></li>
                                <li><a href="header-no-bg.html">No Background</a></li>
                                <li><a href="header-parallax.html">Parallax Effect</a></li>
                                <li><a href="header-pattern.html">Pattern Effect</a></li>
                                <li><a href="header-reverse.html">Reverse</a></li>
                                <li><a href="header-scale.html">Scale Effect</a></li>
                                <li><a href="header-video.html">Background Video</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Navigation Styles</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="navigation-1.html">Navigation Style 1</a></li>
                                <li><a href="navigation-2.html">Navigation Style 2</a></li>
                                <li><a href="navigation-3.html">Navigation Style 3</a></li>
                                <li><a href="navigation-4.html">Navigation Style 4</a></li>
                                <li><a href="navigation-5.html">Navigation Style 5</a></li>
                                <li><a href="navigation-6.html">Navigation Style 6</a></li>
                                <li><a href="navigation-7.html">Navigation Style 7</a></li>
                                <li><a href="navigation-8.html">Navigation Style 8</a></li>
                                <li><a href="navigation-9.html">Navigation Style 9</a></li>
                                <li><a href="navigation-10.html">Navigation Style 10</a></li>
                                <li><a href="navigation-11.html">Navigation Style 11</a></li>
                                <li><a href="navigation-12.html">Navigation Style 12</a></li>
                                <li><a href="navigation-13.html">Navigation Style 13</a></li>
                                <li><a href="navigation-14.html">Navigation Style 14</a></li>
                                <li><a href="navigation-15.html">Navigation Style 15</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Navigation Types</a>
                            <ul class="dropdown-menu to-right">
                                <li class="dropdown-toggle"><a href="navigation-block.html">Block Navigation</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-block.html">Block Navigation</a></li>
                                        <li><a href="navigation-block-styled.html">Block Navigation Styled</a></li>
                                        <li><a href="navigation-block-hide-by-scroll.html">Hide By Scroll</a></li>
                                    </ul>
                                </li>
                                <li><a href="navigation-dotted.html">Dotted Navigation</a></li>
                                <li class="dropdown-toggle"><a href="navigation-extra.html">Extra Navigation</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-extra.html">Extra Navigation</a></li>
                                        <li><a href="navigation-extra-centered.html">Extra Navigation Centered</a></li>
                                        <li><a href="navigation-extra-rtl.html">Extra Navigation RTL</a></li>
                                        <li><a href="navigation-extra-styled.html">Extra Navigation Styled</a></li>
                                        <li><a href="navigation-extra-white.html">Extra Navigation White</a></li>
                                    </ul>
                                </li>
                                <li><a href="navigation-icon.html">Icon Navigation</a></li>
                                <li class="dropdown-toggle"><a href="navigation-punch.html">Punch Navigation</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-punch.html">Punch Navigation</a></li>
                                        <li><a href="navigation-punch-dark.html">Punch Navigation Dark</a></li>
                                        <li><a href="navigation-punch-styled.html">Punch Navigation Styled</a></li>
                                        <li><a href="navigation-punch-unlimited-links.html">Unlimited Links</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="navigation-side-mini.html">Mini Side Navigation</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-side-mini.html">Side Mini Navigation</a></li>
                                        <li><a href="navigation-side-mini-right.html">Side Mini Navigation Right</a>
                                        </li>
                                        <li><a href="navigation-side-mini-styled.html">Side Mini Navigation Styled</a>
                                        </li>
                                        <li><a href="navigation-side-mini-white.html">Side Mini Navigation White</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="navigation-side.html">Side Navigation</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-side.html">Side Navigation</a></li>
                                        <li><a href="navigation-side-right.html">Side Navigation Right</a></li>
                                        <li><a href="navigation-side-styled-1.html">Side Navigation Styled 1</a></li>
                                        <li><a href="navigation-side-styled-2.html">Side Navigation Styled 2</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="navigation-side-type-2.html">Side Navigation Type
                                        2</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="navigation-side-type-2.html">Side Navigation</a></li>
                                        <li><a href="navigation-side-type-2-right.html">Side Navigation Right</a></li>
                                        <li><a href="navigation-side-type-2-color-1.html">Primary Background</a></li>
                                        <li><a href="navigation-side-type-2-color-2.html">Warning Background</a></li>
                                        <li><a href="navigation-side-type-2-color-3.html">Default Background</a></li>
                                        <li><a href="navigation-side-type-2-color-4.html">Custom Background</a></li>
                                        <li><a href="navigation-side-type-2-animate-1.html">Animated Background 1</a>
                                        </li>
                                        <li><a href="navigation-side-type-2-animate-2.html">Animated Background 2</a>
                                        </li>
                                        <li><a href="navigation-side-type-2-animate-3.html">Animated Background 3</a>
                                        </li>
                                        <li><a href="navigation-side-type-2-gradient-1.html">Gradient Background 1</a>
                                        </li>
                                        <li><a href="navigation-side-type-2-gradient-2.html">Gradient Background 2</a>
                                        </li>
                                        <li><a href="navigation-side-type-2-gradient-3.html">Gradient Background 3</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Sidebar</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="elements-sidebar-left.html">Sidebar Left</a></li>
                                <li><a href="elements-sidebar-right.html">Sidebar Right</a></li>
                                <li><a href="elements-sidebar-top.html">Sidebar Top</a></li>
                                <li><a href="elements-sidebar-bottom.html">Sidebar Bottom</a></li>
                                <li><a href="elements-sidebar-styled.html">Sidebar Styled</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Footer</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="footer-fixed.html">Footer Sticky</a></li>
                                <li><a href="footer-1.html">Footer Layout 1</a></li>
                                <li><a href="footer-2.html">Footer Layout 2</a></li>
                                <li><a href="footer-3.html">Footer Layout 3</a></li>
                                <li><a href="footer-4.html">Footer Layout 4</a></li>
                                <li><a href="footer-5.html">Footer Layout 5</a></li>
                                <li><a href="footer-6.html">Footer Layout 6</a></li>
                                <li><a href="footer-7.html">Footer Layout 7</a></li>
                                <li><a href="footer-8.html">Footer Layout 8</a></li>
                                <li><a href="footer-9.html">Footer Layout 9</a></li>
                                <li><a href="footer-10.html">Footer Layout 10</a></li>
                                <li><a href="footer-11.html">Footer Layout 11</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">User Account</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-account-profile.html">Account Profile</a></li>
                                <li><a href="pages-account-login-1.html">Account Login 1</a></li>
                                <li><a href="pages-account-login-2.html">Account Login 2</a></li>
                            </ul>
                        </li>
                        <li><a href="module-twitter.html">Twitter Module</a></li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Pagetop</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pagetop-white.html">Pagetop Classic</a></li>
                                <li><a href="pagetop-dark.html">Pagetop Dark</a></li>
                                <li><a href="pagetop-transparent.html">Pagetop Transparent</a></li>
                                <li class="dropdown-toggle"><a href="pagetop-color-1.html">Pagetop Colors</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="pagetop-color-1.html">Pagetop Primary</a></li>
                                        <li><a href="pagetop-color-2.html">Pagetop Success</a></li>
                                        <li><a href="pagetop-color-3.html">Pagetop Default</a></li>
                                        <li><a href="pagetop-color-4.html">Pagetop Custom</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="pagetop-gradient-1.html">Pagetop Gradients</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="pagetop-gradient-1.html">Pagetop Gradient 1</a></li>
                                        <li><a href="pagetop-gradient-2.html">Pagetop Gradient 2</a></li>
                                        <li><a href="pagetop-gradient-3.html">Pagetop Gradient 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Coming Soon</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-coming-soon-1.html">Coming Soon 1</a></li>
                                <li><a href="pages-coming-soon-2.html">Coming Soon 2</a></li>
                                <li><a href="pages-coming-soon-3.html">Coming Soon 3</a></li>
                                <li><a href="pages-coming-soon-4.html">Coming Soon 4</a></li>
                                <li><a href="pages-coming-soon-5.html">Coming Soon 5</a></li>
                                <li><a href="pages-coming-soon-6.html">Coming Soon 6</a></li>
                                <li><a href="pages-coming-soon-7.html">Coming Soon 7</a></li>
                                <li><a href="pages-coming-soon-8.html">Coming Soon 8</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Pages</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">About Us</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-about-me.html">About Me</a></li>
                                <li><a href="pages-about-1.html">About Us 1</a></li>
                                <li><a href="pages-about-2.html">About Us 2</a></li>
                                <li><a href="pages-about-3.html">About Us 3</a></li>
                                <li><a href="pages-about-4.html">About Us 4</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Contact Us</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-contact-1.html">Contact Us 1</a></li>
                                <li><a href="pages-contact-2.html">Contact Us 2</a></li>
                                <li><a href="pages-contact-3.html">Contact Us 3</a></li>
                                <li><a href="pages-contact-4.html">Contact Us 4</a></li>
                                <li><a href="pages-contact-5.html">Contact Us 5</a></li>
                                <li><a href="pages-contact-6.html">Contact Us 6</a></li>
                                <li><a href="pages-contact-7.html">Contact Us 7</a></li>
                                <li><a href="pages-contact-8.html">Contact Us 8</a></li>
                                <li><a href="pages-contact-9.html">Contact Us 9</a></li>
                                <li><a href="pages-contact-10.html">Contact Us 10</a></li>
                                <li><a href="pages-contact-1-advanced.html">Contact Us - Advanced 1</a></li>
                                <li><a href="pages-contact-2-advanced.html">Contact Us - Advanced 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Our Team</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-team-1.html">Our Team 1</a></li>
                                <li><a href="pages-team-2.html">Our Team 2</a></li>
                                <li><a href="pages-team-3.html">Our Team 3</a></li>
                                <li><a href="pages-team-4.html">Our Team 4</a></li>
                                <li><a href="pages-team-5.html">Our Team 5</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Our Services</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-services-1.html">Our Services 1</a></li>
                                <li><a href="pages-services-2.html">Our Services 2</a></li>
                                <li><a href="pages-services-3.html">Our Services 3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Faqs</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-faqs-1.html">Faqs Layout 1</a></li>
                                <li><a href="pages-faqs-2.html">Faqs Layout 2</a></li>
                                <li><a href="pages-faqs-3.html">Faqs Layout 3</a></li>
                                <li><a href="pages-faqs-4.html">Faqs Layout 4</a></li>
                            </ul>
                        </li>
                        <li>
                            <hr class="black">
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Layouts</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-layout-fullwidth.html">Full Width</a></li>
                                <li><a href="pages-layout-fullwidth-wide.html">Full Width (Wide)</a></li>
                                <li><a href="pages-layout-left-sidebar.html">Left Sidebar</a></li>
                                <li><a href="pages-layout-right-sidebar.html">Right Sidebar</a></li>
                                <li><a href="pages-layout-double-sidebar.html">Double Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="pages-maintenance-1.html">Maintenance</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-maintenance-1.html">Maintenance Layout 1</a></li>
                                <li><a href="pages-maintenance-2.html">Maintenance Layout 2</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-career.html">Careers</a></li>
                        <li class="dropdown-toggle"><a href="pages-maintenance-1.html">Utilities</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-404-clean.html">Error 404 - Clean</a></li>
                                <li><a href="pages-404-parallax.html">Error 404 - Parallax</a></li>
                                <li><a href="pages-404-3d.html">Error 404 - 3D</a></li>
                                <li><a href="pages-404-classic.html">Error 404 - Classic</a></li>
                                <li><a href="pages-search-results.html?q=quadra">Search Results</a></li>
                                <li><a href="pages-account-profile.html">Account Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Portfolio</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">Grid Portfolio</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-grid-text-floats.html">Text Floats</a></li>
                                <li><a href="portfolio-grid-styled-colors.html">Styled Colors</a></li>
                                <li><a href="portfolio-grid-column-2.html">Column 2</a></li>
                                <li><a href="portfolio-grid-column-3.html">Column 3</a></li>
                                <li><a href="portfolio-grid-column-4.html">Column 4</a></li>
                                <li><a href="portfolio-grid-column-5.html">Column 5</a></li>
                                <li><a href="portfolio-grid-column-6.html">Column 6</a></li>
                                <li><a href="portfolio-grid-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="portfolio-grid-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Masonry Portfolio</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-masonry-text-floats.html">Text Floats</a></li>
                                <li><a href="portfolio-masonry-styled-colors.html">Styled Colors</a></li>
                                <li><a href="portfolio-masonry-column-2.html">Column 2</a></li>
                                <li><a href="portfolio-masonry-column-3.html">Column 3</a></li>
                                <li><a href="portfolio-masonry-column-4.html">Column 4</a></li>
                                <li><a href="portfolio-masonry-column-5.html">Column 5</a></li>
                                <li><a href="portfolio-masonry-column-6.html">Column 6</a></li>
                                <li><a href="portfolio-masonry-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="portfolio-masonry-infinity-scroll-click.html">Infinity Scroll &amp;
                                        Click<span class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Mosaic Portfolio</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-mosaic-text-floats.html">Text Floats</a></li>
                                <li><a href="portfolio-mosaic-styled-colors.html">Styled Colors</a></li>
                                <li><a href="portfolio-mosaic-column-3.html">Column 3</a></li>
                                <li><a href="portfolio-mosaic-column-4.html">Column 4</a></li>
                                <li><a href="portfolio-mosaic-column-5.html">Column 5</a></li>
                                <li><a href="portfolio-mosaic-column-6.html">Column 6</a></li>
                                <li><a href="portfolio-mosaic-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="portfolio-mosaic-infinity-scroll-click.html">Infinity Scroll &amp;
                                        Click<span class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Justified Portfolio</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-justified.html">Justified Fullwidth</a></li>
                                <li><a href="portfolio-justified-boxed.html">Justified Boxed</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Single Project <span
                                        class="mark bg-colored border-colored white">new</span></a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-single-1.html">Single Project Page 1</a></li>
                                <li><a href="portfolio-single-2.html">Single Project Page 2</a></li>
                                <li><a href="portfolio-single-3.html">Single Project Page 3</a></li>
                                <li><a href="portfolio-single-4.html">Single Project Page 4</a></li>
                                <li><a href="portfolio-single-5.html">Single Project Page 5</a></li>
                                <li><a href="portfolio-single-6.html">Single Project Page 6</a></li>
                                <li><a href="portfolio-single-7.html">Single Project Page 7</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Hover Styles</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-hover-1.html">Hover Style 1</a></li>
                                <li><a href="portfolio-hover-2.html">Hover Style 2</a></li>
                                <li><a href="portfolio-hover-3.html">Hover Style 3</a></li>
                                <li><a href="portfolio-hover-4.html">Hover Style 4</a></li>
                                <li><a href="portfolio-hover-5.html">Hover Style 5</a></li>
                                <li><a href="portfolio-hover-6.html">Hover Style 6</a></li>
                                <li><a href="portfolio-hover-7.html">Hover Style 7</a></li>
                                <li><a href="portfolio-hover-8.html">Hover Style 8</a></li>
                                <li><a href="portfolio-hover-9.html">Hover Style 9</a></li>
                                <li><a href="portfolio-hover-10.html">Hover Style 10</a></li>
                                <li><a href="portfolio-hover-11.html">Hover Style 11</a></li>
                                <li><a href="portfolio-hover-12.html">Hover Style 12</a></li>
                                <li><a href="portfolio-hover-13.html">Hover Style 13</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Filter Types</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-filter-1.html">Filter Type 1</a></li>
                                <li><a href="portfolio-filter-2.html">Filter Type 2</a></li>
                                <li><a href="portfolio-filter-3.html">Filter Type 3</a></li>
                                <li><a href="portfolio-filter-4.html">Filter Type 4</a></li>
                                <li><a href="portfolio-filter-5.html">Filter Type 5</a></li>
                                <li><a href="portfolio-filter-6.html">Filter Type 6</a></li>
                                <li><a href="portfolio-filter-7.html">Filter Type 7</a></li>
                                <li><a href="portfolio-filter-8.html">Filter Type 8</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Ajax</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="portfolio-ajax-in-page.html">Ajax In Page</a></li>
                                <li><a href="portfolio-ajax-in-modal.html">Ajax In Modal</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Categories</a>
                            <ul class="dropdown-menu to-right">
                                <li class="dropdown-toggle"><a href="#" class="stay">Categories Style 1</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="portfolio-categories-column-2.html">Column 2</a></li>
                                        <li><a href="portfolio-categories-column-3.html">Column 3</a></li>
                                        <li><a href="portfolio-categories-column-4.html">Column 4</a></li>
                                        <li><a href="portfolio-categories-column-5.html">Column 5</a></li>
                                        <li><a href="portfolio-categories-centered-details.html">Centered Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="#" class="stay">Categories Style 2</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="portfolio-categories-style-2-column-2.html">Column 2</a></li>
                                        <li><a href="portfolio-categories-style-2-column-3.html">Column 3</a></li>
                                        <li><a href="portfolio-categories-style-2-column-4.html">Column 4</a></li>
                                        <li><a href="portfolio-categories-style-2-column-5.html">Column 5</a></li>
                                        <li><a href="portfolio-categories-style-2-centered-details.html">Centered
                                                Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-toggle"><a href="#" class="stay">Categories Style 3</a>
                                    <ul class="dropdown-menu to-right">
                                        <li><a href="portfolio-categories-style-3-column-2.html">Column 2</a></li>
                                        <li><a href="portfolio-categories-style-3-column-3.html">Column 3</a></li>
                                        <li><a href="portfolio-categories-style-3-column-4.html">Column 4</a></li>
                                        <li><a href="portfolio-categories-style-3-column-5.html">Column 5</a></li>
                                        <li><a href="portfolio-categories-style-3-centered-details.html">Centered
                                                Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="portfolio-categories-parallax.html">Categories Parallax</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio-filter-animation-1.html#works">22+ Filter Animations</a></li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Shop</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">Shop Classic</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="shop-column-2.html">Column 2</a></li>
                                <li><a href="shop-column-3.html">Column 3</a></li>
                                <li><a href="shop-column-4.html">Column 4</a></li>
                                <li><a href="shop-column-5.html">Column 5</a></li>
                                <li><a href="shop-column-6.html">Column 6</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Shop Styled</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="shop-styled-column-2.html">Column 2</a></li>
                                <li><a href="shop-styled-column-3.html">Column 3</a></li>
                                <li><a href="shop-styled-column-4.html">Column 4</a></li>
                                <li><a href="shop-styled-column-5.html">Column 5</a></li>
                                <li><a href="shop-styled-column-6.html">Column 6</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Shop Login</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="shop-login-1.html">Shop Login 1</a></li>
                                <li><a href="shop-login-2.html">Shop Login 2</a></li>
                                <li><a href="shop-login-3.html">Shop Login 3</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-sidebar-left.html">Left Sidebar</a></li>
                        <li><a href="shop-sidebar-right.html">Right Sidebar</a></li>
                        <li><a href="shop-single.html">Single Item</a></li>
                        <li><a href="shop-cart.html">Cart</a></li>
                        <li><a href="shop-checkout.html">Checkout</a></li>
                        <li><a href="shop-terms.html">Terms</a></li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Gallery</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">Gallery Grid</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="gallery-grid-column-2.html">Column 2</a></li>
                                <li><a href="gallery-grid-column-3.html">Column 3</a></li>
                                <li><a href="gallery-grid-column-4.html">Column 4</a></li>
                                <li><a href="gallery-grid-column-5.html">Column 5</a></li>
                                <li><a href="gallery-grid-column-6.html">Column 6</a></li>
                                <li><a href="gallery-grid-with-texts.html">With Texts</a></li>
                                <li><a href="gallery-grid-with-texts-untitle.html">With Texts Untitle</a></li>
                                <li><a href="gallery-grid-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="gallery-grid-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Gallery Masonry</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="gallery-masonry-column-2.html">Column 2</a></li>
                                <li><a href="gallery-masonry-column-3.html">Column 3</a></li>
                                <li><a href="gallery-masonry-column-4.html">Column 4</a></li>
                                <li><a href="gallery-masonry-column-5.html">Column 5</a></li>
                                <li><a href="gallery-masonry-column-6.html">Column 6</a></li>
                                <li><a href="gallery-masonry-with-texts.html">With Texts</a></li>
                                <li><a href="gallery-masonry-with-texts-untitle.html">With Texts Untitle</a></li>
                                <li><a href="gallery-masonry-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="gallery-masonry-infinity-scroll-click.html">Infinity Scroll &amp;
                                        Click<span class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Gallery Mosaic</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="gallery-mosaic-column-3.html">Column 3</a></li>
                                <li><a href="gallery-mosaic-column-4.html">Column 4</a></li>
                                <li><a href="gallery-mosaic-column-5.html">Column 5</a></li>
                                <li><a href="gallery-mosaic-column-6.html">Column 6</a></li>
                                <li><a href="gallery-mosaic-with-texts.html">With Texts</a></li>
                                <li><a href="gallery-mosaic-with-texts-untitle.html">With Texts Untitle</a></li>
                                <li><a href="gallery-mosaic-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="gallery-mosaic-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Gallery Hovers</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="gallery-hover-1.html">Hover Style 1</a></li>
                                <li><a href="gallery-hover-2.html">Hover Style 2</a></li>
                                <li><a href="gallery-hover-3.html">Hover Style 3</a></li>
                                <li><a href="gallery-hover-4.html">Hover Style 4</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Gallery Filters</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="gallery-filter-1.html">Filter Style 1</a></li>
                                <li><a href="gallery-filter-2.html">Filter Style 2</a></li>
                                <li><a href="gallery-filter-3.html">Filter Style 3</a></li>
                                <li><a href="gallery-filter-4.html">Filter Style 4</a></li>
                                <li><a href="gallery-filter-5.html">Filter Style 5</a></li>
                                <li><a href="gallery-filter-6.html">Filter Style 6</a></li>
                                <li><a href="gallery-filter-7.html">Filter Style 7</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Elements</a>
                    <!-- Dropdown - you can add background image to mega-menu. just add data-background="yourimage" code. -->
                    <ul class="dropdown-menu to-center mega-menu bg-right bg-bottom"
                        data-background="images/megamenu-bg.jpg">
                        <li>
                            <ul class="column">
                                <li class="column-title">Element Group</li>
                                <li><a href="elements-accordions.html">Accordions</a></li>
                                <li><a href="elements-audio-player.html">Audio Player</a></li>
                                <li><a href="elements-alerts.html">Alerts</a></li>
                                <li><a href="elements-animated-headings.html">Animated Headings</a></li>
                                <li><a href="elements-animated-images.html">Animated Images</a></li>
                                <li><a href="elements-animations.html">Animations</a></li>
                                <li><a href="elements-background-changer.html">Background Changer</a></li>
                                <li><a href="elements-before-after.html">Before&amp;After Images</a></li>
                                <li><a href="elements-blockquotes.html">Blockquotes</a></li>
                                <li><a href="elements-boxes.html">Boxes</a></li>
                                <li><a href="elements-buttons.html">Buttons</a></li>
                                <li><a href="elements-call-to-action.html">Call To Action</a></li>
                            </ul>
                            <ul class="column">
                                <li class="column-title">Element Group</li>
                                <li><a href="elements-carousels.html">Carousels</a></li>
                                <li><a href="elements-clients.html">Clients</a></li>
                                <li><a href="charts-all.html">Charts</a></li>
                                <li><a href="elements-counters.html">Counters</a></li>
                                <li><a href="elements-data-tables.html">Data Tables</a></li>
                                <li><a href="elements-dividers.html">Dividers</a></li>
                                <li><a href="elements-dropcaps.html">Dropcaps</a></li>
                                <li><a href="elements-form-elements.html">Form Elements <span
                                                class="mark bg-colored border-colored white">new</span></a></li>
                                <li><a href="elements-form-validations.html">Form Validations</a></li>
                                <li><a href="elements-animated-gradients.html">Gradient Animations</a></li>
                                <li><a href="elements-headings.html">Headings</a></li>
                                <li><a href="elements-icon-navigation.html">Icon Navigation Effects</a></li>
                            </ul>
                            <ul class="column">
                                <li class="column-title">Element Group</li>
                                <li><a href="elements-icons.html">Icons</a></li>
                                <li><a href="elements-infoboxes.html">Info Boxes <span
                                                class="mark bg-colored1 border-colored1 white">new</span></a></li>
                                <li><a href="elements-instagram.html">Instagram</a></li>
                                <li><a href="elements-labels.html">Labels</a></li>
                                <li><a href="elements-lightboxes.html">Lightboxes</a></li>
                                <li><a href="elements-lists.html">Lists</a></li>
                                <li><a href="elements-loaders.html">Loaders</a></li>
                                <li><a href="elements-maps.html">Google Maps</a></li>
                                <li><a href="elements-modals.html">Modals</a></li>
                                <li><a href="elements-pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="elements-process-steps.html">Process Steps</a></li>
                                <li><a href="elements-progress-bars.html">Progress Bars</a></li>
                            </ul>
                            <ul class="column">
                                <li class="column-title">Element Group</li>
                                <li><a href="elements-range-slider.html">Range Slider</a></li>
                                <li><a href="elements-ratings.html">Ratings</a></li>
                                <li><a href="elements-responsive-visibility.html">Responsive Visibility</a></li>
                                <li><a href="elements-rotate-boxes.html">Rotate Boxes</a></li>
                                <li><a href="elements-sections-parallax.html">Parallax Sections</a></li>
                                <li><a href="elements-sidebar-left.html">Sidebar Types</a></li>
                                <li><a href="elements-socials.html">Socials</a></li>
                                <li><a href="elements-step-wizard.html">Step Wizard</a></li>
                                <li><a href="elements-sticky-items.html">Sticky Items</a></li>
                                <li><a href="elements-tabs.html">Tabs</a></li>
                                <li><a href="elements-testimonials.html">Testimonials</a></li>
                                <li><a href="elements-hotspots.html">Hotspots On Images</a></li>
                            </ul>
                            <ul class="column">
                                <li class="column-title">Element Group</li>
                                <li><a href="elements-gradient-texts.html">Text Gradients</a></li>
                                <li><a href="elements-text-rotator.html">Text Rotator</a></li>
                                <li><a href="elements-timeline.html">Timeline</a></li>
                                <li><a href="elements-toggles.html">Toggles</a></li>
                                <li><a href="elements-tooltips.html">Tooltips</a></li>
                                <li><a href="elements-tour-wizard.html">Tour Wizard</a></li>
                                <li><a href="elements-twitter.html">Twitter</a></li>
                                <li><a href="elements-typeahead.html">Typeahead</a></li>
                                <li><a href="elements-video-backgrounds.html">Video Backgrounds</a></li>
                                <li><a href="elements-video-player.html">Video Players</a></li>
                                <li><a href="elements-wishbox.html">Wish Box</a></li>
                                <li><a href="elements-all.html">All Elements <span
                                                class="mark bg-colored border-colored white">ALL</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-toggle"><a href="#" class="stay">Blog</a>
                    <ul class="dropdown-menu to-right">
                        <li class="dropdown-toggle"><a href="#" class="stay">Blog Grid</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-grid-column-2.html">2 Column</a></li>
                                <li><a href="blog-grid-column-3.html">3 Column</a></li>
                                <li><a href="blog-grid-column-4.html">4 Column</a></li>
                                <li><a href="blog-grid-column-5.html">5 Column</a></li>
                                <li><a href="blog-grid-column-6.html">6 Column</a></li>
                                <li><a href="blog-grid-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="blog-grid-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Blog Masonry</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-masonry-column-2.html">2 Column</a></li>
                                <li><a href="blog-masonry-column-3.html">3 Column</a></li>
                                <li><a href="blog-masonry-column-4.html">4 Column</a></li>
                                <li><a href="blog-masonry-column-5.html">5 Column</a></li>
                                <li><a href="blog-masonry-column-6.html">6 Column</a></li>
                                <li><a href="blog-masonry-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="blog-masonry-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Blog Styled</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-styled-column-2.html">2 Column</a></li>
                                <li><a href="blog-styled-column-3.html">3 Column</a></li>
                                <li><a href="blog-styled-column-4.html">4 Column</a></li>
                                <li><a href="blog-styled-column-5.html">5 Column</a></li>
                                <li><a href="blog-styled-column-6.html">6 Column</a></li>
                                <li><a href="blog-styled-fullwidth.html">Fullwidth</a></li>
                                <li><a href="blog-styled-infinity-scroll.html">Infinity Scroll<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                                <li><a href="blog-styled-infinity-scroll-click.html">Infinity Scroll &amp; Click<span
                                                class="mark bg-danger border-danger white">NEW</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Blog Landing</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-landing.html">Blog Landing</a></li>
                                <li><a href="blog-landing-single-1.html">Blog Landing Single 1</a></li>
                                <li><a href="blog-landing-single-2.html">Blog Landing Single 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Layout</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-sidebar-left.html">Sidebar Left</a></li>
                                <li><a href="blog-sidebar-right.html">Sidebar Right</a></li>
                                <li><a href="blog-sidebar-both.html">Sidebar Both</a></li>
                                <li><a href="blog-sidebar-none.html">No Sidebar Boxed</a></li>
                                <li><a href="blog-sidebar-none-wide.html">No Sidebar Fullwidth</a></li>
                            </ul>
                        </li>
                        <li><a href="blog-list-type.html">Blog List</a></li>
                        <li class="dropdown-toggle"><a href="#" class="stay">Single Layouts</a>
                            <ul class="dropdown-menu to-right">
                                <li><a href="blog-single-01.html">Single Layout 1</a></li>
                                <li><a href="blog-single-02.html">Single Layout 2</a></li>
                                <li><a href="blog-single-03.html">Single Layout 3</a></li>
                                <li><a href="blog-single-04.html">Single Layout 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigation Menu -->
    </div>
    <!-- End Columns -->
</nav>
<!-- END NAVIGATION -->


