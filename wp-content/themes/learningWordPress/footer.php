<footer class="site-footer">
    <nav class="site-nav">

        <?php
        $args = array(
            'theme_location' => 'footer'
        );

        wp_nav_menu($args);
        ?>
    </nav>
    <p>
        &copy; <?php echo date('Y') ?> <?php bloginfo('name'); ?>
    </p>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>