<footer class="c-footer py-2 py-lg-4">
    <div class="container text-center">
        <span>&copy; Copyright <?= date('Y'); ?>, <?php bloginfo('name'); ?></span>
        <nav role="navigation" class="c-nav-legal">
            <?php wp_nav_menu(array('container' => 'ul', 'menu_class' => false, 'theme_location' => 'legal_navigation')); ?>
        </nav>
    </div>
</footer>
