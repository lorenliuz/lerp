<?php
/**
 * Show support page in Lerp menu
 */

if ( !defined('ABSPATH') ) exit;


if ( !class_exists('Lerp_Menu_Support_Page') ) {

    /**
     * Lerp_Menu_Support_Page Class
     *
     * Creates the Support page.
     */
    class Lerp_Menu_Support_Page
    {
        /**
         * Constructor.
         */
        public function __construct()
        {
            // Add support page to WP menu
            add_action('admin_menu', array($this, 'add_to_menu'), 100);
        }

        /**
         * Add support page
         */
        public function add_to_menu()
        {
            add_submenu_page('lerp-system-status',
                esc_html__('支持', 'lerp'),
                esc_html__('支持', 'lerp'),
                'edit_theme_options',
                'lerp-support',
                array($this, 'output'));
        }

        /**
         * Get cards
         */
        public function get_cards()
        {
            $cards = array(
                array(
                    'id' => 'general',
                    'title' => esc_html__('General', 'lerp'),
                    'description' => esc_html__('General information about WordPress, Server Requirements and Lerp Theme versions.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213452809',
                ),
                array(
                    'id' => 'first-steps',
                    'title' => esc_html__('First Steps', 'lerp'),
                    'description' => esc_html__('Lerp Theme and plugins installation guide, Demo Contents import and theme update.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213454309',
                ),
                array(
                    'id' => 'theme-options',
                    'title' => esc_html__('Theme Options', 'lerp'),
                    'description' => esc_html__('Options are the backbone of Lerp and they give you full control over your website.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213455189',
                ),
                array(
                    'id' => 'pages-posts',
                    'title' => esc_html__('Page & Posts', 'lerp'),
                    'description' => esc_html__('Discover how to create, customise and manage pages, blog posts and portfolio items.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/214002625',
                ),
                array(
                    'id' => 'page-builder',
                    'title' => esc_html__('Page Builder', 'lerp'),
                    'description' => esc_html__('Learn how to create beautiful pages quickly with the powerful Lerp’s Page Builder.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213456589',
                ),
                array(
                    'id' => 'header',
                    'title' => esc_html__('Headers', 'lerp'),
                    'description' => esc_html__('Lerp works with 4 different header types fully integrated with the Theme Options.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213456989',
                ),
                array(
                    'id' => 'extra',
                    'title' => esc_html__('Extra', 'lerp'),
                    'description' => esc_html__('Advanced features and additional plugins to boost your Lerp Theme functionalities.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213457109',
                ),
                array(
                    'id' => 'how-to',
                    'title' => esc_html__('How To', 'lerp'),
                    'description' => esc_html__('Discover how to work with some of the most common elements and features of Lerp.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/articles/213459529',
                ),
                array(
                    'id' => 'faq',
                    'title' => esc_html__('FAQ', 'lerp'),
                    'description' => esc_html__('Search the frequent asked questions from the customer community before open a ticket.',
                        'lerp'),
                    'url' => '//support.undsgn.com/hc/en-us/categories/201692765',
                ),
            );

            return $cards;
        }

        /**
         * Handles the display of the Reservations page in admin.
         */
        public function output()
        {
            ?>

            <div class="wrap lerp-wrap" id="lerp-support">

                <?php echo lerp_admin_panel_page_title('support'); ?>

                <div class="lerp-admin-panel">
                    <?php echo lerp_admin_panel_menu('support'); ?>

                    <div class="lerp-admin-panel__content lerp-admin-panel__content--two-cols">
                        <div class="lerp-admin-panel__left-w">
                            <h2 class="lerp-admin-panel__heading"><?php esc_html_e('Knowledge Base', 'lerp'); ?></h2>

                            <div class="box-cards">
                                <ul class="box-cards__list lerp-ui-layout lerp-ui-layout--three-cols">

                                    <?php
                                    $card_i = 0;
                                    foreach ( $this->get_cards() as $card ) : ?>

                                        <li class="box-card box-card--<?php echo esc_attr($card['id']); ?> lerp-ui-layout__item lerp-ui-layout__item--three-cols<?php echo ($card_i % 3 == 0) ? ' clear-left' : ''; ?>">
                                            <a target="_blank" tabindex="-1" href="<?php echo esc_url($card['url']); ?>"
                                               class="box-card__link box-card__link--<?php echo esc_attr($card['id']); ?>">
                                                <h3 class="box-card__title"><?php echo esc_html($card['title']); ?></h3>
                                            </a>
                                        </li>

                                        <?php
                                        $card_i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </div>

                        </div><!-- .lerp-admin-panel__left-w -->

                        <div class="lerp-admin-panel__right-w">

                            <h2 class="lerp-admin-panel__heading"><?php esc_html_e('Help Center', 'lerp'); ?></h2>

                            <div class="lerp-info-box">

                                <p class="lerp-admin-panel__description"><?php printf(esc_html__('According to Envato’s terms, Lerp comes with 6 months of support for every purchase, and free lifetime theme updates. This support can be %s via ThemeForest.',
                                        'lerp'),
                                        '<a href="//themeforest.net/item/lerp-creative-multiuse-wordpress-theme/13373220?utm_source=undsgn_support&ref=undsgn&license=regular&open_purchase_for_item_id=13373220&purchasable=source" target="_blank" tabindex="-1">' . esc_html__('extended through subscriptions',
                                            'lerp') . '</a>'); ?></p>

                                <p class="lerp-admin-panel__description"><?php esc_html_e('Support is limited to questions regarding the Lerp\'s features, or problems with the theme. To open a support ticket, please navigate to our Help Center homepage and click the \'Submit a request\' in the top right corner. One of our Support Team members will respond to you shortly.',
                                        'lerp'); ?></p>

                                <p class="lerp-admin-panel__description"><?php esc_html_e('Item Support DOES include:',
                                        'lerp'); ?></p>
                                <ul class="checklist">
                                    <li><?php esc_html_e('Availability of the theme\'s authors to answer questions;',
                                            'lerp'); ?></li>
                                    <li><?php esc_html_e('Answers to technical queries about the theme\'s features;',
                                            'lerp'); ?></li>
                                    <li><?php esc_html_e('Assistance with reported bugs and issues.', 'lerp'); ?></li>
                                </ul>

                                <p class="lerp-admin-panel__description"><?php esc_html_e('Item Support DOES NOT include:',
                                        'lerp'); ?></p>
                                <ul class="errorlist">
                                    <li><?php esc_html_e('Customization services;', 'lerp'); ?></li>
                                    <li><?php esc_html_e('Installation services;', 'lerp'); ?></li>
                                    <li><?php esc_html_e('Help and support for non-bundled third-party plugins that you install.',
                                            'lerp'); ?></li>
                                </ul>
                                <a target="_blank" tabindex="-1"
                                   class="button button-primary button--view-documentation"
                                   href="//support.undsgn.com/hc/en-us"><?php esc_html_e('Submit a request',
                                        'lerp'); ?></a>
                            </div><!-- .lerp-info-box -->
                        </div><!-- .lerp-admin-panel__right-w -->
                    </div><!-- .lerp-admin-panel__content -->
                </div><!-- .lerp-admin-panel -->
            </div><!-- .lerp-wrap -->
            <?php
        }
    }
}

return new Lerp_Menu_Support_Page();
