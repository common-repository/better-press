<?php
wp_enqueue_script('am_bp_dashboard_js', plugins_url( 'am_betterpress/js/dashboard.js'), $deps);
?>

		
		<div class="generalSettings">
			<ul>
				<li>
					<h4><?php _e('Mode', 'BetterPress'); ?></h4>
					<input class="checkDynamic" type="radio" class="mode" id="<?php echo $this -> get_field_id('mode'); ?>Dynamic" name="<?php echo $this -> get_field_name('mode'); ?>" value="dynamic" <?php
						if ($instance['mode'] == "dynamic" || !$instance['mode']) { echo "checked"; } ?> />
					<label for="<?php echo $this -> get_field_id('mode'); ?>Dynamic"><?php _e('Dynamic'); ?></label> 
					<br><input class="checkStatic" type="radio" class="mode" id="<?php echo $this -> get_field_id('mode'); ?>Static" name="<?php echo $this -> get_field_name('mode'); ?>" value="static" <?php
						if ($instance['mode'] == "static") { echo "checked"; } ?> />
						<label for="<?php echo $this -> get_field_id('mode'); ?>Static"><?php _e('Static'); ?></label> 
					
				</li>
				<li>
					<h4><?php _e('Settings', 'BetterPress'); ?></h4>
					<label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
					<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
				</li>
				<li>
					<label for="<?php echo $this -> get_field_id('bp_id'); ?>"><?php _e('Betterplace ID:', 'BetterPress'); ?></label> 
					<input id="<?php echo $this -> get_field_id('bp_id'); ?>" name="<?php echo $this -> get_field_name('bp_id'); ?>" type="text" value="<?php echo esc_attr($instance['bp_id']); ?>"/>
				</li><li>
					<label for="<?php echo $this -> get_field_id('project_details'); ?>"><?php _e('Show Project Details', 'BetterPress'); ?></label> 
					<input class="check_project_details" type="checkbox" id="<?php echo $this -> get_field_id('project_details'); ?>" name="<?php echo $this -> get_field_name('project_details'); ?>" <?php
					if ($instance['project_details']) { echo "checked";
						}
 ?> />				</li><li>
					<label for="<?php echo $this -> get_field_id('show_needs'); ?>"><?php _e('Show Needs', 'BetterPress'); ?></label> 
					<input class="check_show_needs" type="checkbox" id="<?php echo $this -> get_field_id('show_needs'); ?>" name="<?php echo $this -> get_field_name('show_needs'); ?>" <?php
					if ($instance['show_needs']) { echo "checked";
						}
 ?> />				</li><li><div  class="checkBox">
 						<label for="<?php echo $this -> get_field_id('limit_needs'); ?>"><?php _e('Limit Needs', 'BetterPress'); ?></label> 
 						<input type="checkbox" id="<?php echo $this -> get_field_id('limit_needs'); ?>" name="<?php echo $this -> get_field_name('limit_needs'); ?>" <?php
					if ($instance['limit_needs']) { echo "checked";
	}
 ?> /></div><div class="hiddenbox">
					<label for="<?php echo $this -> get_field_id('needcount'); ?>"><?php _e('Limit to:', 'BetterPress'); ?></label> 
					<input id="<?php echo $this -> get_field_id('needcount'); ?>" name="<?php echo $this -> get_field_name('needcount'); ?>" type="text" value="<?php echo esc_attr($instance['needcount']); ?>" />
					</div>	
					</li>
			</ul>
			</div>
			<div class="projectDetails hiddenbox">
				<h4>Display Project Details</h4>
				<ul>
					<li><div class="checkBox">
						<label for="<?php echo $this -> get_field_id('show_title'); ?>"><?php _e('Show Title', 'BetterPress'); ?></label> 
						<input type="checkbox" class="bpCheckbox" id="<?php echo $this -> get_field_id('show_title'); ?>" name="<?php echo $this -> get_field_name('show_title'); ?>" <?php
		if ($instance['show_title']) { echo "checked";
		}
 ?> /></div><div class="hiddenbox">
						<label for="<?php echo $this -> get_field_id('title_link'); ?>"><?php _e('Title as Projektlink', 'BetterPress'); ?></label> 
						<input type="checkbox" class="bpCheckbox" id="<?php echo $this -> get_field_id('title_link'); ?>" name="<?php echo $this -> get_field_name('title_link'); ?>" <?php
		if ($instance['title_link']) { echo "checked";
		}
 ?> /></div>
		</li>
		<li><div class="checkBox">
		<label for="<?php echo $this -> get_field_id('show_description'); ?>"><?php _e('Show Description', 'BetterPress'); ?></label> 
		<input type="checkbox" class="bpCheckbox" id="<?php echo $this -> get_field_id('show_description'); ?>" name="<?php echo $this -> get_field_name('show_description'); ?>" <?php
		if ($instance['show_description']) { echo "checked";
		}
 ?> /></div><div class="hiddenbox">
		<label for="<?php echo $this -> get_field_id('description_lenght'); ?>"><?php _e('Words:', 'BetterPress'); ?></label> 
		<input type="text" id="<?php echo $this -> get_field_id('description_lenght'); ?>" name="<?php echo $this -> get_field_name('description_lenght'); ?>" value="<?php echo $instance['description_lenght']; ?>" />
		</div></li>
			<li>
		<div class="checkBox"><label for="<?php echo $this -> get_field_id('show_progress'); ?>"><?php _e('Show Progress', 'BetterPress'); ?></label> 
		<input type="checkbox" class="bpCheckbox" id="<?php echo $this -> get_field_id('show_progress'); ?>" name="<?php echo $this -> get_field_name('show_progress'); ?>" <?php
		if ($instance['show_progress']) { echo "checked";
		}
 ?> /></div><div class="hiddenbox">
		
		<label for="<?php echo $this -> get_field_id('progress_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('progress_title'); ?>" name="<?php echo $this -> get_field_name('progress_title'); ?>" type="text" value="<?php echo esc_attr($instance['progress_title']); ?>" />
	</div><div class="hiddenbox">
	<input type="radio" class="progress_radioButton" id="<?php echo $this -> get_field_id('progress_style'); ?>None" name="<?php echo $this -> get_field_name('progress_style'); ?>" value="none"<?php
		if ($instance['progress_style'] == "none" || !$instance['progress_style']) { echo "checked";
		}
 ?> /><label for="<?php echo $this -> get_field_id('progress_style'); ?>None"><?php _e('No Style', 'BetterPress'); ?></label>
		<input type="radio" class="progress_radioButton" id="<?php echo $this -> get_field_id('progress_style'); ?>Percent" name="<?php echo $this -> get_field_name('progress_style'); ?>" value="percent"<?php
		if ($instance['progress_style'] == "percent") { echo "checked";
		}
 ?> /><label for="<?php echo $this -> get_field_id('progress_style'); ?>Percent"><?php _e('Percent', 'BetterPress'); ?></label>
		<input type="radio" class="progress_radioButton" id="<?php echo $this -> get_field_id('progress_style'); ?>Bar" name="<?php echo $this -> get_field_name('progress_style'); ?>" value="bar"<?php
		if ($instance['progress_style'] == "bar") { echo "checked";
		}
 ?> />		<label for="<?php echo $this -> get_field_id('progress_style'); ?>Bar"><?php _e('Progress Bar', 'BetterPress'); ?></label>	
		</li>
		<li><div class="checkBox">
		<label for="<?php echo $this -> get_field_id('show_complete_amount'); ?>"><?php _e('Show Complete Requested Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('show_complete_amount'); ?>" name="<?php echo $this -> get_field_name('show_complete_amount'); ?>" <?php
		if ($instance['show_complete_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('complete_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('complete_amount_title'); ?>" name="<?php echo $this -> get_field_name('complete_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['complete_amount_title']); ?>" />
		</div>
		</li>
		<li>
		<div class="checkBox">
			<label for="<?php echo $this -> get_field_id('show_donated_amount'); ?>"><?php _e('Show Donated Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('show_donated_amount'); ?>" name="<?php echo $this -> get_field_name('show_donated_amount'); ?>" <?php
		if ($instance['show_donated_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('donated_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('donated_amount_title'); ?>" name="<?php echo $this -> get_field_name('donated_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['donated_amount_title']); ?>" />
		</div>
		</li>
		<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('show_open_amount'); ?>"><?php _e('Show Open Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('show_open_amount'); ?>" name="<?php echo $this -> get_field_name('show_open_amount'); ?>" <?php
		if ($instance['show_open_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('open_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('open_amount_title'); ?>" name="<?php echo $this -> get_field_name('open_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['open_amount_title']); ?>" />
		</div>
		</li>
		<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('project_link'); ?>"><?php _e('Show Seperate Project Link', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('project_link'); ?>" name="<?php echo $this -> get_field_name('project_link'); ?>" <?php
		if ($instance['project_link']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('project_link_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('project_link_title'); ?>" name="<?php echo $this -> get_field_name('project_link_title'); ?>" type="text" value="<?php echo esc_attr($instance['project_link_title']); ?>" />
		</div>
		</li>
		<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('donate_button'); ?>"><?php _e('Show Project Donate Button', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('donate_button'); ?>" name="<?php echo $this -> get_field_name('donate_button'); ?>" <?php
		if ($instance['donate_button']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('donate_button_label'); ?>"><?php _e('Label:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('donate_button_label'); ?>" name="<?php echo $this -> get_field_name('donate_button_label'); ?>" type="text" value="<?php echo esc_attr($instance['donate_button_label']); ?>" />
		</div>
		</li>
		</ul>
	</div>
	<div class="needDetails">
		<h4>Display Need Details</h4>
		<ul>
			<li>
					<label for="<?php echo $this -> get_field_id('needs_title'); ?>"><?php _e('Needs Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('needs_title'); ?>" name="<?php echo $this -> get_field_name('needs_title'); ?>" class="widefat" type="text" value="<?php echo esc_attr($instance['needs_title']); ?>" />
		</li>
			
 <div>
						<label for="<?php echo $this -> get_field_id('need_title_link'); ?>"><?php _e('Need Title as Donate Link', 'BetterPress'); ?></label> 
						<input type="checkbox" id="<?php echo $this -> get_field_id('need_title_link'); ?>" name="<?php echo $this -> get_field_name('need_title_link'); ?>" <?php
		if ($instance['need_title_link']) { echo "checked";
		}
 ?> /></li>
 <li><label for="<?php echo $this -> get_field_id('hide_completed_needs'); ?>"><?php _e('Hide Completed Needs:', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('hide_completed_needs'); ?>" name="<?php echo $this -> get_field_name('hide_completed_needs'); ?>" <?php
		if ($instance['hide_completed_needs']) { echo "checked";
		}
 ?> />	</li>
  <li><div class="checkBox"><label for="<?php echo $this -> get_field_id('show_need_description'); ?>"><?php _e('Display Need Description:', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('show_need_description'); ?>" name="<?php echo $this -> get_field_name('show_need_description'); ?>" <?php
		if ($instance['show_need_description']) { echo "checked";
		}
 ?> />	</div><div class="hiddenbox">
		<label for="<?php echo $this -> get_field_id('need_description_lenght'); ?>"><?php _e('Words:', 'BetterPress'); ?></label> 
		<input type="text" id="<?php echo $this -> get_field_id('need_description_lenght'); ?>" name="<?php echo $this -> get_field_name('need_description_lenght'); ?>" value="<?php echo $instance['need_description_lenght']; ?>" />
		</div></li>
 <li><div class="checkBox">
		<label for="<?php echo $this -> get_field_id('show_need_progress'); ?>"><?php _e('Show Need Progress', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('show_need_progress'); ?>" name="<?php echo $this -> get_field_name('show_need_progress'); ?>" <?php
		if ($instance['show_need_progress']) { echo "checked";
		}
 ?> /></div>
		<div class="hiddenbox">
		<label for="<?php echo $this -> get_field_id('need_progress_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('need_progress_title'); ?>" name="<?php echo $this -> get_field_name('need_progress_title'); ?>" type="text" value="<?php echo esc_attr($instance['need_progress_title']); ?>" />
		</div>
		<div class="hiddenbox">
			<input type="radio" id="<?php echo $this -> get_field_id('need_progress_style'); ?>None" name="<?php echo $this -> get_field_name('need_progress_style'); ?>" value="none"<?php
		if ($instance['need_progress_style'] == "none" || !$instance['need_progress_style']) { echo "checked";
		}
 ?> /><label for="<?php echo $this -> get_field_id('progress_style'); ?>None"><?php _e('No Style', 'BetterPress'); ?></label>

		<input type="radio" id="<?php echo $this -> get_field_id('need_progress_style'); ?>Percent" name="<?php echo $this -> get_field_name('need_progress_style'); ?>" value="percent"<?php
		if ($instance['need_progress_style'] == "percent") { echo "checked";
		}
 ?> />
 <label for="<?php echo $this -> get_field_id('need_progress_style'); ?>Percent"><?php _e('Percent', 'BetterPress'); ?></label>
 
		<input type="radio" id="<?php echo $this -> get_field_id('need_progress_style'); ?>Bar" name="<?php echo $this -> get_field_name('need_progress_style'); ?>" value="bar"<?php
		if ($instance['need_progress_style'] == "bar") { echo "checked";
		}
 ?> />
 		<label for="<?php echo $this -> get_field_id('need_progress_style'); ?>Bar"><?php _e('Progress Bar', 'BetterPress'); ?></label>
		</div>
		</li>
		<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('need_show_complete_amount'); ?>"><?php _e('Show Complete Requested Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('need_show_complete_amount'); ?>" name="<?php echo $this -> get_field_name('need_show_complete_amount'); ?>" <?php
		if ($instance['need_show_complete_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('need_complete_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('need_complete_amount_title'); ?>" name="<?php echo $this -> get_field_name('need_complete_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['need_complete_amount_title']); ?>" />
		</div>
		</li>
		<li>
		<div class="checkBox">
			<label for="<?php echo $this -> get_field_id('need_show_donated_amount'); ?>"><?php _e('Show Donated Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('need_show_donated_amount'); ?>" name="<?php echo $this -> get_field_name('need_show_donated_amount'); ?>" <?php
		if ($instance['need_show_donated_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('need_donated_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('donated_amount_title'); ?>" name="<?php echo $this -> get_field_name('need_donated_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['need_donated_amount_title']); ?>" />
		</div>
		</li>
		<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('need_show_open_amount'); ?>"><?php _e('Show Open Amount', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('need_show_open_amount'); ?>" name="<?php echo $this -> get_field_name('need_show_open_amount'); ?>" <?php
		if ($instance['need_show_open_amount']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('need_open_amount_title'); ?>"><?php _e('Title:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('need_open_amount_title'); ?>" name="<?php echo $this -> get_field_name('need_open_amount_title'); ?>" type="text" value="<?php echo esc_attr($instance['need_open_amount_title']); ?>" />
		</div>
		</li>
 			<li>
			<div class="checkBox">
		<label for="<?php echo $this -> get_field_id('need_donate_button'); ?>"><?php _e('Show Need Donate Button', 'BetterPress'); ?></label> 
		<input type="checkbox" id="<?php echo $this -> get_field_id('need_donate_button'); ?>" name="<?php echo $this -> get_field_name('need_donate_button'); ?>" <?php
		if ($instance['need_donate_button']) { echo "checked";
		}
 ?> /></div>
 <div class="hiddenbox">
			<label for="<?php echo $this -> get_field_id('need_button_label'); ?>"><?php _e('Label:', 'BetterPress'); ?></label> 
		<input id="<?php echo $this -> get_field_id('need_button_label'); ?>" name="<?php echo $this -> get_field_name('need_button_label'); ?>" type="text" value="<?php echo esc_attr($instance['need_button_label']); ?>" />
		</div>
		</li>
		</ul>
		
	</div>
		