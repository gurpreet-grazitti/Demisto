<?php/* * Post format Standard *  */?><?phpif (!is_singular()) {?>    <h2>        <a href="<?php the_permalink() ?>">            <?php the_title(); ?>        </a>    </h2>    <hr><?php } ?>