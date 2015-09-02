<footer>
    <div class="container">
        <div class="twelve columns">
            <div class="footer_primary">
                <?php
                if (is_active_sidebar('footer1'))
                    dynamic_sidebar('footer1');
                ?>
            </div>
            <div class="footer_secondary">
                <?php
                if (is_active_sidebar('footer2'))
                    dynamic_sidebar('footer2');
                ?>
            </div>

        </div>
    </div>
    <?php
    $menu_items = szia_nav_menu_items();
    $link = '#home';
    if(!empty($menu_items)){
        $link = "#{$menu_items[0][2]}";        
    }
    ?>
    
    <a href="<?php echo $link?>" id="to_top"></a>
</footer>

<?php wp_footer() ?>

</body>
</html>