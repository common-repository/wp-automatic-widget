<?php
require_once 'config.php';
class wp_automatic_widget_core extends WP_Widget
{
	public $name = 'Automatic Widget';
	public $description = 'Create an automatic widget';
	public $control_options = array();

	function __construct()
	{
		$widget_options = array(
		'classname' => __CLASS__
	    );
		parent::__construct( __CLASS__, $this->name,$widget_options,$this->control_options);
	}
	
	static function register_automatic_widget()
	{
		register_widget(__CLASS__);
	}


	function widget($args, $instance)
	{
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $text = apply_filters('widget_text', $instance['text']);
        $checkbox = $instance['manually_auto_widget'];
        $end = $instance['manually_auto_widget_end_date'];
        $end_dead = $instance['manually_auto_widget_end_date_deadline'];
        $start = $instance['manually_auto_widget_start_date'];

        if($checkbox == "manually")
        {
            echo $before_widget;
            if ( $title )
                echo $before_title . $title . $after_title;
            if ( $text )
                echo '<div class="widget-text">'.$text."</div>";
            echo $after_widget;
        }
        elseif($checkbox == "auto")
        {
            $now = date("Ymd");
            $end_date = date("Ymd", strtotime($end));
            $start_date = date("Ymd", strtotime($start));
            if($now < $end_date)
            {
                if($now >= $start_date)
                {
                    echo $before_widget;
                    if ( $title )
                        echo $before_title . $title . $after_title;
                    if ( $text )
                        echo '<div class="widget-text">'.$text."</div>";
                    echo $after_widget;
                }
            }

            /*$auto_widgets = get_option("widget_wp_automatic_widget_core");
            $now = date("Ymd");
            foreach($auto_widgets as $key => $value)
            {
                if($value["manually_auto_widget"] == "auto")
                {
                    $end_date = date("Ymd", strtotime($end));
                    $start_date = date("Ymd", strtotime($start));
                    if($now >= $end_date)
                    {
                        unset($auto_widgets[$key]);
                        continue;
                    }
                    else
                    {
                        if($now >= $start_date)
                        {
                            echo $before_widget;
                            if ( $title )
                                echo $before_title . $title . $after_title;
                            if ( $text )
                                echo '<div class="widget-text">'.$text."</div>";
                            echo $after_widget;
                        }
                    }
                }
            }
            $new_value = $auto_widgets;
            update_option( "widget_wp_automatic_widget_core", $new_value );
            var_dump($new_value);*/
        }
        else if($checkbox == "deadline")
        {
            $now = date("Ymd");
            $end_date = date("Ymd", strtotime($end_dead));
            if($now < $end_date)
            {
                echo $before_widget;
                if ( $title )
                    echo $before_title . $title . $after_title;
                if ( $text )
                    echo '<div class="widget-text">'.$text."</div>";
                echo $after_widget;
            }
            /*$auto_widgets = get_option("widget_wp_automatic_widget_core");
            $new_value = $auto_widgets;
            $now = date("Ymd");
            foreach($auto_widgets as $key => $value)
            {
                if($value["manually_auto_widget"] == "deadline")
                {
                    $end_date = date("Ymd", strtotime($end_dead));
                    if($now >= $end_date)
                    {
                        unset($auto_widgets[$key]);
                        continue;
                    }
                    else
                    {
                        echo $before_widget;
                        if ( $title )
                            echo $before_title . $title . $after_title;
                        if ( $text )
                            echo '<div class="widget-text">'.$text."</div>";
                        echo $after_widget;
                    }
                }
            }
            $new_value = $auto_widgets;
            update_option( "widget_wp_automatic_widget_core", $new_value );
            var_dump($new_value);*/
        }
        else
        {
            // NOTHING
        }

	}

 	function form($instance)
 	{
        $title = esc_attr($instance['title']);
        $text = esc_attr($instance['text']);
        $checkbox = esc_attr($instance['manually_auto_widget']);
        @$end = esc_attr($instance['manually_auto_widget_end_date']);
        @$start = esc_attr($instance['manually_auto_widget_start_date']);
        @$end_deadline = esc_attr($instance["manually_auto_widget_end_date_deadline"]);
?>
     <p>
        <script>
            var $ = jQuery;
        </script>
        <div id="wp_automatic_widget" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 600px;">
            <div class="modal-header">
                <h3 id="myModalLabel">Add new automatic widget.</h3>
            </div>
            <div class="modal-body">
                <p>
                    <label for="<?php echo $this->get_field_id('manually_auto_widget'); ?>"><?php _e('<b>Manually:</b> '); ?></label>
                    <input id="<?php echo $this->get_field_id('manually_auto_widget'); ?>" name="<?php echo $this->get_field_name('manually_auto_widget'); ?>" style="margin-left: 5px; margin-top: 2px;" type="radio" value="manually" <?php checked( 'manually', $checkbox ); if($checkbox == "") echo "checked"; ?>  onclick="auto_widget_date_box('<?php echo $this->get_field_id('manually_auto_widget'); ?>', 'hide', this.value)"/>
                    <span style="margin-left: 20px;">
                     <label for="<?php echo $this->get_field_id('manually_auto_widget'); ?>"><?php _e('<b>Automatically:</b> '); ?></label>
                     <input id="<?php echo $this->get_field_id('manually_auto_widget'); ?>" name="<?php echo $this->get_field_name('manually_auto_widget'); ?>" style="margin-left: 5px; margin-top: 2px;" type="radio" value="auto" <?php checked( 'auto', $checkbox ); ?> onclick="auto_widget_date_box('<?php echo $this->get_field_id('manually_auto_widget'); ?>', 'show', this.value)"/>
                    </span>
                    <span style="margin-left: 20px;">
                     <label for="<?php echo $this->get_field_id('manually_auto_widget'); ?>"><?php _e('<b>Deadline:</b> '); ?></label>
                     <input id="<?php echo $this->get_field_id('manually_auto_widget'); ?>" name="<?php echo $this->get_field_name('manually_auto_widget'); ?>" style="margin-left: 5px; margin-top: 2px;" type="radio" value="deadline" <?php checked( 'deadline', $checkbox ); ?> onclick="auto_widget_date_box('<?php echo $this->get_field_id('manually_auto_widget'); ?>', 'show', this.value)"/>
                    </span>

                </p>
            <span id="show_date_<?php echo $this->get_field_id('manually_auto_widget'); ?>" style="<?php if($checkbox != "deadline") echo "display: none;";?>">

                <div class="input-append">
                     <label for="<?php echo $this->get_field_id('manually_auto_widget_end_date_deadline'); ?>"><?php _e('<b>End Date:</b> '); ?>&nbsp;</label>

                     <input data-format="MM/dd/yyyy" type="date" id="<?php echo $this->get_field_id('manually_auto_widget_end_date_deadline');?>"  name="<?php echo $this->get_field_name('manually_auto_widget_end_date_deadline'); ?>" value="<?php echo $end_deadline;?>" />
                        <span class="add-on">
                          <i class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="You can add your end date with following format: mm/dd/yyyy for example 07/20/2013">
                          </i>
                        </span>
                </div>

            </span>

            <span id="show_date_auto_<?php echo $this->get_field_id('manually_auto_widget'); ?>" style="<?php if($checkbox != "auto") echo "display: none;";?>">

                <div class="input-append">
                    <label for="<?php echo $this->get_field_id('manually_auto_widget_start_date'); ?>"><?php _e('<b>Start Date:</b> '); ?>&nbsp;</label>

                    <input data-format="MM/dd/yyyy" type="date" id="<?php echo $this->get_field_id('manually_auto_widget_start_date');?>"  name="<?php echo $this->get_field_name('manually_auto_widget_start_date'); ?>" value="<?php echo $start;?>" />
                        <span class="add-on">
                          <i class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="You can add your start date with following format: mm/dd/yyyy for example 07/20/2013">
                          </i>
                        </span>
                </div>

                <div class="input-append">
                    <label for="<?php echo $this->get_field_id('manually_auto_widget_end_date'); ?>"><?php _e('<b>End Date:</b> '); ?>&nbsp;</label>

                    <input data-format="MM/dd/yyyy" type="date" id="<?php echo $this->get_field_id('manually_auto_widget_end_date');?>"  name="<?php echo $this->get_field_name('manually_auto_widget_end_date'); ?>" value="<?php echo $end;?>" style="margin-left: 7px;"/>
                        <span class="add-on">
                          <i class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="You can add your end date with following format: mm/dd/yyyy for example 07/20/2013">
                          </i>
                        </span>
                </div>

                <div class="alert alert-user">
                    <p>
                        <b>NOTE: </b> If you want to use this option you must have another active widget ( with any type ) in your sidebar.
                    </p>
                </div>

            </span>

                <br>
                <hr>
                <br>
                <!--Start Add Information-->
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('<b>Title:</b> '); ?> </label>
                <br /><br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                <br /><br />
                <label><?php _e('<b>Shortcodes:</b> '); ?></label>
                <p>
                <center>
                    <button class="btn btn-primary" id="alert" type="button" onclick="show_automatic_widget(this.id, '<?php echo $this->get_field_name('text');?>');">Alert</button>
                    <button class="btn btn-primary" id="button" type="button" onclick="show_automatic_widget(this.id, '<?php echo $this->get_field_name('text');?>');">Button</button>
                    <button class="btn btn-primary" id="button-group" type="button" onclick="show_automatic_widget(this.id, '<?php echo $this->get_field_name('text');?>');">Button Group</button>
                    <button class="btn btn-primary" id="icon" type="button" onclick="automatic_widget_add_shortcode(this.id, '<?php echo $this->get_field_name('text');?>');">Icons</button>
                    <button class="btn btn-primary" id="hero_unit" type="button" onclick="automatic_widget_add_shortcode(this.id, '<?php echo $this->get_field_name('text');?>');">Hero Unit</button>
                    <button class="btn btn-primary" id="well" type="button" onclick="automatic_widget_add_shortcode(this.id, '<?php echo $this->get_field_name('text');?>');">Well</button>
                    <button class="btn btn-primary" id="link" type="button" onclick="automatic_widget_add_shortcode(this.id, '<?php echo $this->get_field_name('text');?>');">link</button>
                    <button class="btn btn-primary" id="img" type="button" onclick="automatic_widget_add_shortcode(this.id, '<?php echo $this->get_field_name('text');?>');">img</button>
                </center>

            </p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('<b>Html Text:</b> '); ?></label>
            <p>
                 <?php
                 $settings_wp = array(
                     'wpautop' => false,
                     'media_buttons' => true,
                     'textarea_rows' => 10,
                     'teeny' => false,
                     'dfw' => false,
                     'tinymce' => false,
                     'quicktags' => false
                 );
                 $content = $text;
                 wp_editor( $content, $this->get_field_name('text'), $settings_wp);
                 ?>
            </p>
            <!--End Add Information-->
        </div>
        <div class="modal-footer" id="show_choose_<?php echo $this->get_field_name('text');?>" style="text-align: left;">
        </div>
     </div>
     <!-- Button to trigger modal -->
    <center>
     <a href="javascript:;" role="button" class="btn" style="text-decoration: none;" onclick="show_bootstrap_icons_auto_widget('show', '<?php echo $this->get_field_id('text'); ?>')">Show Bootstrap Icon Classes</a>
    </center>
    <!-- Modal -->
    <div id="auto_widget_Bootstrap_icons_<?php echo $this->get_field_id('text'); ?>" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none; width: 200px; height: 200px; margin-left: 120px; border-radius: 0;">
        <div class="modal-header">
            <button type="button" class="close" onclick="show_bootstrap_icons_auto_widget('hide', '<?php echo $this->get_field_id('text'); ?>')">x</button>
            <h3>Bootstrap Icons</h3>
        </div>
        <!--<div class="modal-body">-->
            <p>
            <ul class="the-icons clearfix" style="margin-left: 10px;">
                <li><i class="icon-glass"></i> icon-glass</li>
                <li><i class="icon-music"></i> icon-music</li>
                <li><i class="icon-search"></i> icon-search</li>
                <li><i class="icon-envelope"></i> icon-envelope</li>
                <li><i class="icon-heart"></i> icon-heart</li>
                <li><i class="icon-star"></i> icon-star</li>
                <li><i class="icon-star-empty"></i> icon-star-empty</li>
                <li><i class="icon-user"></i> icon-user</li>
                <li><i class="icon-film"></i> icon-film</li>
                <li><i class="icon-th-large"></i> icon-th-large</li>
                <li><i class="icon-th"></i> icon-th</li>
                <li><i class="icon-th-list"></i> icon-th-list</li>
                <li><i class="icon-ok"></i> icon-ok</li>
                <li><i class="icon-remove"></i> icon-remove</li>
                <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
                <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
                <li><i class="icon-off"></i> icon-off</li>
                <li><i class="icon-signal"></i> icon-signal</li>
                <li><i class="icon-cog"></i> icon-cog</li>
                <li><i class="icon-trash"></i> icon-trash</li>
                <li><i class="icon-home"></i> icon-home</li>
                <li><i class="icon-file"></i> icon-file</li>
                <li><i class="icon-time"></i> icon-time</li>
                <li><i class="icon-road"></i> icon-road</li>
                <li><i class="icon-download-alt"></i> icon-download-alt</li>
                <li><i class="icon-download"></i> icon-download</li>
                <li><i class="icon-upload"></i> icon-upload</li>
                <li><i class="icon-inbox"></i> icon-inbox</li>

                <li><i class="icon-play-circle"></i> icon-play-circle</li>
                <li><i class="icon-repeat"></i> icon-repeat</li>
                <li><i class="icon-refresh"></i> icon-refresh</li>
                <li><i class="icon-list-alt"></i> icon-list-alt</li>
                <li><i class="icon-lock"></i> icon-lock</li>
                <li><i class="icon-flag"></i> icon-flag</li>
                <li><i class="icon-headphones"></i> icon-headphones</li>
                <li><i class="icon-volume-off"></i> icon-volume-off</li>
                <li><i class="icon-volume-down"></i> icon-volume-down</li>
                <li><i class="icon-volume-up"></i> icon-volume-up</li>
                <li><i class="icon-qrcode"></i> icon-qrcode</li>
                <li><i class="icon-barcode"></i> icon-barcode</li>
                <li><i class="icon-tag"></i> icon-tag</li>
                <li><i class="icon-tags"></i> icon-tags</li>
                <li><i class="icon-book"></i> icon-book</li>
                <li><i class="icon-bookmark"></i> icon-bookmark</li>
                <li><i class="icon-print"></i> icon-print</li>
                <li><i class="icon-camera"></i> icon-camera</li>
                <li><i class="icon-font"></i> icon-font</li>
                <li><i class="icon-bold"></i> icon-bold</li>
                <li><i class="icon-italic"></i> icon-italic</li>
                <li><i class="icon-text-height"></i> icon-text-height</li>
                <li><i class="icon-text-width"></i> icon-text-width</li>
                <li><i class="icon-align-left"></i> icon-align-left</li>
                <li><i class="icon-align-center"></i> icon-align-center</li>
                <li><i class="icon-align-right"></i> icon-align-right</li>
                <li><i class="icon-align-justify"></i> icon-align-justify</li>
                <li><i class="icon-list"></i> icon-list</li>

                <li><i class="icon-indent-left"></i> icon-indent-left</li>
                <li><i class="icon-indent-right"></i> icon-indent-right</li>
                <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
                <li><i class="icon-picture"></i> icon-picture</li>
                <li><i class="icon-pencil"></i> icon-pencil</li>
                <li><i class="icon-map-marker"></i> icon-map-marker</li>
                <li><i class="icon-adjust"></i> icon-adjust</li>
                <li><i class="icon-tint"></i> icon-tint</li>
                <li><i class="icon-edit"></i> icon-edit</li>
                <li><i class="icon-share"></i> icon-share</li>
                <li><i class="icon-check"></i> icon-check</li>
                <li><i class="icon-move"></i> icon-move</li>
                <li><i class="icon-step-backward"></i> icon-step-backward</li>
                <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                <li><i class="icon-backward"></i> icon-backward</li>
                <li><i class="icon-play"></i> icon-play</li>
                <li><i class="icon-pause"></i> icon-pause</li>
                <li><i class="icon-stop"></i> icon-stop</li>
                <li><i class="icon-forward"></i> icon-forward</li>
                <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                <li><i class="icon-step-forward"></i> icon-step-forward</li>
                <li><i class="icon-eject"></i> icon-eject</li>
                <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
                <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
                <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
                <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
                <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
                <li><i class="icon-ok-sign"></i> icon-ok-sign</li>

                <li><i class="icon-question-sign"></i> icon-question-sign</li>
                <li><i class="icon-info-sign"></i> icon-info-sign</li>
                <li><i class="icon-screenshot"></i> icon-screenshot</li>
                <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
                <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
                <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
                <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
                <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
                <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
                <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
                <li><i class="icon-share-alt"></i> icon-share-alt</li>
                <li><i class="icon-resize-full"></i> icon-resize-full</li>
                <li><i class="icon-resize-small"></i> icon-resize-small</li>
                <li><i class="icon-plus"></i> icon-plus</li>
                <li><i class="icon-minus"></i> icon-minus</li>
                <li><i class="icon-asterisk"></i> icon-asterisk</li>
                <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
                <li><i class="icon-gift"></i> icon-gift</li>
                <li><i class="icon-leaf"></i> icon-leaf</li>
                <li><i class="icon-fire"></i> icon-fire</li>
                <li><i class="icon-eye-open"></i> icon-eye-open</li>
                <li><i class="icon-eye-close"></i> icon-eye-close</li>
                <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
                <li><i class="icon-plane"></i> icon-plane</li>
                <li><i class="icon-calendar"></i> icon-calendar</li>
                <li><i class="icon-random"></i> icon-random</li>
                <li><i class="icon-comment"></i> icon-comment</li>
                <li><i class="icon-magnet"></i> icon-magnet</li>

                <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
                <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
                <li><i class="icon-retweet"></i> icon-retweet</li>
                <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
                <li><i class="icon-folder-close"></i> icon-folder-close</li>
                <li><i class="icon-folder-open"></i> icon-folder-open</li>
                <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
                <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
                <li><i class="icon-hdd"></i> icon-hdd</li>
                <li><i class="icon-bullhorn"></i> icon-bullhorn</li>
                <li><i class="icon-bell"></i> icon-bell</li>
                <li><i class="icon-certificate"></i> icon-certificate</li>
                <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                <li><i class="icon-hand-right"></i> icon-hand-right</li>
                <li><i class="icon-hand-left"></i> icon-hand-left</li>
                <li><i class="icon-hand-up"></i> icon-hand-up</li>
                <li><i class="icon-hand-down"></i> icon-hand-down</li>
                <li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
                <li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
                <li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
                <li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
                <li><i class="icon-globe"></i> icon-globe</li>
                <li><i class="icon-wrench"></i> icon-wrench</li>
                <li><i class="icon-tasks"></i> icon-tasks</li>
                <li><i class="icon-filter"></i> icon-filter</li>
                <li><i class="icon-briefcase"></i> icon-briefcase</li>
                <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
            </ul>
            </p>
        <!--</div>-->
        <div class="modal-footer">
            <button type="button" class="btn" onclick="show_bootstrap_icons_auto_widget('hide', '<?php echo $this->get_field_id('text'); ?>')">Close</button>
        </div>
    </div>
    </p>
<?php
    }
	
 	function update($new_instance, $old_instance) 
 	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] =  $new_instance['text'];
        $instance['manually_auto_widget'] = strip_tags($new_instance['manually_auto_widget']);
        $instance['manually_auto_widget_end_date'] = strip_tags($new_instance['manually_auto_widget_end_date']);
        $instance['manually_auto_widget_start_date'] = strip_tags($new_instance['manually_auto_widget_start_date']);
        $instance['manually_auto_widget_end_date_deadline'] = strip_tags($new_instance['manually_auto_widget_end_date_deadline']);
        return $instance;
    }

	public static function add_wp_automatic_widget_css()
	{
    	$src = plugins_url(wp_automatic_widget_name.'/css/wp_automatic_widget_css.css',dirname(__FILE__) );
		wp_register_style('wp_automatic_widget', $src);
		wp_enqueue_style('wp_automatic_widget');
	}

    public static function add_wp_automatic_widget_initialize_shortcode_css()
    {
        $src = plugins_url(wp_automatic_widget_name.'/css/wp_automatic_widget_shortcode.css',dirname(__FILE__) );
        wp_register_style('wp_automatic_widget_shortcodes', $src);
        wp_enqueue_style('wp_automatic_widget_shortcodes');
    }
	
	public static function add_wp_automatic_widget_javascript()
	{
        wp_enqueue_script('jquery');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
        $js_file = plugins_url(wp_automatic_widget_name.'/js/wp_automatic_widget_js.js', dirname(__FILE__) );
        wp_enqueue_script("wp_automatic_widget", $js_file, array('jquery'));
	}

    static function auto_widget_dashboard_widget_function()
    {
        $auto_widgets = get_option("widget_wp_automatic_widget_core");

        if($auto_widgets == false or empty($auto_widgets))
        {
            echo '<div class="alert alert-user" style="text-align: center"><b>NO AUTOMATIC WIDGETS</b></div>';
        }
        else
        {
            $flag = true;
            echo '<table class="_table _table-striped" id="auto_widget_dashboard_table">';
            echo '<tr>
                    <th>Widget Type</th>
                    <th>Widget Title</th>
                    <th>Widget Start Date</th>
                    <th>Widget End Date</th>
                 </tr>';
            foreach($auto_widgets as $key => $value)
            {
                if($value["manually_auto_widget"] == "deadline")
                {
                    $flag = false;
?>
                    <tr>
                        <td><span class="label label-info">Deadline</span></td>
                        <td><span class="label label-inverse"><?php echo $value["title"];?></span></td>
                        <td><span class="label label-success">Started</span></td>
                        <td><span class="label label-warning"><?php echo $value["manually_auto_widget_end_date_deadline"];?></span></td>
                    </tr>
<?php
                }
                if($value["manually_auto_widget"] == "auto")
                {
                    $flag = false;
                    $start = $value["manually_auto_widget_start_date"];
                    $show_start = $start;
                    $now = date("Ymd");
                    $start = date("Ymd", strtotime($start));
                    if($now >= $start)
                    {
                        $show_start = "Started";
                    }
?>
                    <tr>
                        <td><span class="label label-info">Automatic</span></td>
                        <td><span class="label label-inverse"><?php echo $value["title"];?></span></td>
                        <td><span class="label label-success"><?php echo $show_start;?></span></td>
                        <td><span class="label label-warning"><?php echo $value["manually_auto_widget_end_date"];?></span></td>
                    </tr>
<?php
                }
            }
            echo '</table>';
            if($flag == true)
            {
                echo '<script type="text/javascript">
                        document.getElementById("auto_widget_dashboard_table").style.display = "none";
                     </script>';
                echo '<div class="alert alert-user" style="text-align: center"><b>NO AUTOMATIC WIDGETS</b></div>';
            }
        }
    }


    static function auto_widget_add_dashboard_widgets()
    {
        wp_add_dashboard_widget('auto_widget_dashboard_statistics', 'Automatic Widgets', 'wp_automatic_widget_core::auto_widget_dashboard_widget_function');
    }
}


class wp_automatic_widget_bootstrap_shortcodes
{
    static function bootstrap_alerts($atts, $content="")
    {
        extract( shortcode_atts( array(
            'class' => '',
            'style' => ''
        ), $atts ) );

        return '<div class="alert '.esc_attr($class).'" style="'.esc_attr($style).'">
				'.do_shortcode($content).'
				</div>';
    }

    static function bootstrap_button_groups($atts)
    {
        extract( shortcode_atts( array(
            'class' => '',
            'inner_class' => '',
            'inner_value' => '',
            'style' => '',
            'href' => ''
        ), $atts ) );
        if (esc_attr($inner_class) == '')
            $innerClass = "btn";
        else
            $innerClass = esc_attr($inner_class);
        $return = '<div class="btn-group '.esc_attr($class).'" style="'.esc_attr($style).'">';
        $innerValue = explode(", ", esc_attr($inner_value));
        $href = explode(", ", esc_attr($href));
        foreach ($innerValue as $key => $value)
        {
            $return .= '<a href="'.$href[$key].'"><button class="'.$innerClass.'">'.$value.'</button></a>';
        }
        $return .=	'</div>';

        return $return;
    }

    static function bootstrap_buttons($atts, $content="")
    {
        extract( shortcode_atts( array(
            'class' => '',
            'type' => '',
            'disabled' => '',
            'style' => '',
            'href' => ''
        ), $atts ) );

        $_type = esc_attr($type);
        if ($_type == '')
            $_type = 'button';

        $_disabled = esc_attr($disabled);
        if ($_disabled == "true")
            $_disabled = 'disabled="disabled"';

        $href = esc_attr($href);
        if($href != "")
            return '<a href="'.esc_attr($href).'"><button type="'.$_type.'" class="btn '.esc_attr($class).'"  style="'.esc_attr($style).'" '.$_disabled.'>'.do_shortcode($content).'</button></a>';
        else
            return '<button type="'.$_type.'" class="btn '.esc_attr($class).'"  style="'.esc_attr($style).'" '.$_disabled.'>'.do_shortcode($content).'</button>';
    }

    static function bootstrap_icons($atts)
    {
        extract( shortcode_atts( array(
            'class' => '',
            'style' => ''
        ), $atts ) );

        return '<i class="'.esc_attr($class).'" style="'.esc_attr($style).'"></i>';
    }

    static function bootstrap_hero_units($atts, $content="")
    {
        extract( shortcode_atts( array(
            'heading' => '',
            'style' => ''
        ), $atts ) );
        return '<div class="hero-unit" style="'.esc_attr($style).'">
				  <h1>'.esc_attr($heading).'</h1>
				  '.do_shortcode($content).'
				</div>';
    }

    static function bootstrap_wells($atts, $content="")
    {
        extract( shortcode_atts( array(
            'class' => '',
            'style' => ''
        ), $atts ) );
        return '<div class="well '.esc_attr($class).'" style="'.esc_attr($style).'">
  				'.do_shortcode($content).'
				</div>';
    }
}
?>