<?php

class Footer_Contact_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
                'footer-contact', // Base ID  
                __('Footer Contact Widget', 'szia'), // Name  
                array(
            'description' => __('Footer Contact Widget.', 'szia')
                )
        );
    }

    public function form($instance) {

        $defaults = array(
            'email' => '#',
            'phone' => '#',
            'fax' => '#',            
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

        $instance['email'] = $new_instance['email'];
        $instance['phone'] = $new_instance['phone'];
        $instance['fax'] = $new_instance['fax'];
        
        return $instance;
    }

    public function widget($args, $instance) {

        extract($args, EXTR_SKIP);
        extract($instance);
        echo $before_widget;
        ?>
        <ul class="footer_contacts">
            <li><a href="mailto:<?php echo $email?>"><?php echo $email?></a></li>
            <li>P : <a href="#"><?php echo $phone?></a></li>
            <li>F : <a href="#"><?php echo $fax?></a></li>
        </ul>
        <?php
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Footer_Contact_Widget" );'));
?>