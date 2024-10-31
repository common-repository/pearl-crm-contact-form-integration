<?php
/*
Plugin Name: Brightpearl CRM Contact Form
Plugin URI:  http://www.brightpearl.com/support/contacts-crm-and-email/wordpress-plugin-c-276_403_406_415_677.html
Description: Capture contacts direct to Brightpearl CRM. Go to <a href="options-general.php?page=pearlsmartformmanagepage">Settings -> Brightpearl</a> to configure and see example usage.
Version: 1.0.2
Author: John Blackmore, Chris Tanner
Author URI: http://www.brightpearl.com/
*/


/*
 * brightpearl_smartform_content
 * Insert Pearl SmartForm
 */
function brightpearl_smartform_content($content){
	
	$smartform_url    = get_option('brightpearl_smartform_domain');
	$smartform_code   = get_option('brightpearl_smartform_default');
	$smartform_client = get_option('brightpearl_smartform_client');
	
	$regex = '/\{brightpearl_smartform(.*?)}/i';
	preg_match_all( $regex, $content, $matches );
	
	$data = $_POST;

	$replace;
	$errors = array();
	
	for($x=0; $x<count($matches[0]); $x++){

		if(empty($smartform_url) || empty($smartform_code)){
			$replace = 'SmartForm not configured';
		} else {
			if(is_null($replace)){
				if(isset($matches[1][$x]) && !empty($matches[1][$x])){
					$form_override = trim($matches[1][$x]);
					$replace = brightpearl_smartform_form($form_override);
				} else {
					$replace = brightpearl_smartform_form();
				}
			}	
		}
		$content = str_replace($matches[0][$x],$replace,$content);
	}

	
	
	return $content;
	
}

/*
 * Construct SmartForm Code
 */
function brightpearl_smartform_form($form_override = ''){

	$form="";
	if(!empty($form_override)){
		$smartform_code = $form_override;
	} else {
		$smartform_code = get_option('brightpearl_smartform_default');
	}
    
    $smartform_client = get_option('brightpearl_smartform_client');
    $smartform_domain = get_option('brightpearl_smartform_domain');
	
	$form .=
	'<!-- Brightpearl CRM SmartForm -->'.
	'<script src="http://'.trim($smartform_domain).'/?c='.trim($smartform_client).'&smartform&~='.trim($smartform_code).'"></script>'.
	'<!-- End: Brightpearl CRM SmartForm -->';
	
	return $form;
	
}

function brightpearl_smartform_header(){
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/pearl-smartforms/style.css" />' . "\n";
}

function brightpearl_smartform_manage_page() {

    if(isset($_POST['brightpearl_smartform_domain']))
    {
       update_option('brightpearl_smartform_domain', $_POST['brightpearl_smartform_domain']);
       update_option('brightpearl_smartform_default', $_POST['brightpearl_smartform_default']);
       update_option('brightpearl_smartform_client', $_POST['brightpearl_smartform_client']);
    }
    
	brightpearl_smartform_preferences();
}



function brightpearl_smartform_preferences()
{?>
	<div class="wrap"><h2>Brightpearl CRM Preferences</h2>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
		<table class="edit-form">
		<tr>
			<td>Your Brightpearl account ID:</td>
			<td><input name="brightpearl_smartform_client" value="<?php echo stripslashes(get_option('brightpearl_smartform_client'));?>"/></td>
		</tr>
		<tr>
			<td>Brightpearl SmartForm Domain:</td>
			<td><input name="brightpearl_smartform_domain" value="<?php echo stripslashes(get_option('brightpearl_smartform_domain'));?>"/></td>
		</tr>
		<tr>
			<td>Default SmartForm Code:</td>
			<td><input name="brightpearl_smartform_default" value="<?php echo stripslashes(get_option('brightpearl_smartform_default'));?>"/></td>
		</tr>		
		<tr>
			<td></td>
			<td><input type="submit" value="Save"></td>
		</tr>
		</table>
		</form>
	</div>
	
	<div class="wrap">
	<h3>Brightpearl SmartForms</h3>
	<p>Save contacts that visit your Wordpress site directly to your Brightpearl CRM with Brightpearl SmartForms.</p>
	<p>To find the settings to configure this plugin.</p>
	<ol>
		<li>Log in to your Brightpearl account and in the "Contacts" zone go to "Setup -> SmartForms"</li>
		<li>Enter the domain name shown into the "Brightpearl SmartForm Domain" box above</li>
		<li>Click the pencil icon (edit) for the SmartForm you wish to set as your default</li>
		<li>Enter the SmartForm Code (External Link tab) in the box above.</li>
		<li>Save your changes to complete the setup</li>
	</ol>
	</div>
	<div class="wrap">
	<h3>Usage</h3>
	<p></p>
	<pre>
	# To use your default Brightpearl SmartForm just enter the following code in your post or page.
	{brightpearl_smartform}
	
	# To use another Brightpearl SmartForm use the code below
	{brightpearl_smartform SmartFormCode}
	# where SmartFormCode is the code shown on the "External Link" tab for that form.
	</pre>
	
	</div>
	
<?php }




function brightpearl_smartform_add_admin()
{
	add_options_page('Brightpearl CRM', 'Brightpearl', 8, 'pearlsmartformmanagepage', 'brightpearl_smartform_manage_page');
}

add_action('admin_menu', 'brightpearl_smartform_add_admin');
add_filter('the_content','brightpearl_smartform_content');
add_filter('wp_head','brightpearl_smartform_header');



?>
