<?php

class Footer_Social_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
                'social', // Base ID  
                __('Footer Social Widget', 'szia'), // Name  
                array(
            'description' => __('Footer Social Widget.', 'szia')
                )
        );
    }

    public function form($instance) {

        $defaults = array(
            'facebook' => '#',
            'twitter' => '#',
            'picasa' => '#',
            'googleplus' => '#'
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        extract($instance);
        
        foreach($defaults as $key=>$url):
        ?>
        
        <p>

            <label for="<?php echo $this->get_field_id($key); ?>">
                <?php echo ucwords($key).':' ?></label><br />

            <input type="text" id="<?php echo $this->get_field_id($key); ?>" 
                   name="<?php echo $this->get_field_name($key); ?>" 
                   value="<?php echo $instance[$key]; ?>"style="width:224px;" />

        </p>

        <?php
        endforeach;
    }

    public function update($new_instance, $old_instance) {

        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['picasa'] = $new_instance['picasa'];
        $instance['googleplus'] = $new_instance['googleplus'];
        return $instance;
    }

    public function widget($args, $instance) {

        extract($args, EXTR_SKIP);
        echo $before_widget;        
        ?>
        <ul class="social-icons">
            <li class="facebook"><a href="<?php echo $instance['facebook']?>">facebook</a></li>
            <li class="twitter"><a href="<?php echo $instance['twitter']?>">twitter</a></li>
            <li class="last-fm"><a href="<?php echo $instance['picasa']?>">picasa</a></li>
            <li class="googleplus"><a href="<?php echo $instance['googleplus']?>">googleplus</a></li>
        </ul>
        <?php
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Footer_Social_Widget" );'));
?>