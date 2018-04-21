<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <div class="search-container-inner">
        <input type="search" class="search-field form-fluid no-livesearch"
               placeholder="<?php echo esc_html__('Search…', 'lerp'); ?>" value="" name="s"
               title="<?php echo esc_html__('Search for:', 'lerp'); ?>">
        <i class="fa fa-search3"></i>
    </div>
</form>
