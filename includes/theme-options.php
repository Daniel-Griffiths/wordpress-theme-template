<?php
/*
|-------------------------------------------------------
| Theme Settings
|-------------------------------------------------------
| Key:-
|   Title - Title displayed on the input form
|   Name  - The name of the entry inserted into the DB
|   Type  - Input type used for form validation
|   Placeholder - Placeholder text for the input field
|
|*/

/* add new arrays to add more options to the theme form */
$website_settings = array(
    array(
        'Title' => 'Company Name',
        'Name'  => 'website_company_name',
        'Type'  => 'text',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Telephone Number 1',
        'Name'  => 'website_tel_1',
        'Type'  => 'tel',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Telephone Number 2',
        'Name'  => 'website_tel_2',
        'Type'  => 'tel',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Email Address',
        'Name'  => 'website_email',
        'Type'  => 'email',
        'Placeholder' => ''
    ),    
    array(
        'Title' => 'Company Address',
        'Name'  => 'website_company_address',
        'Type'  => 'textarea',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Twitter URL',
        'Name'  => 'website_twitter_url',
        'Type'  => 'url',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Facebook URL',
        'Name'  => 'website_facebook_url',
        'Type'  => 'url',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Linkedin URL',
        'Name'  => 'website_linkedin_url',
        'Type'  => 'url',
        'Placeholder' => ''
    ),
    array(
        'Title' => 'Disqus Username (used for blog comments)',
        'Name'  => 'website_disqus_username',
        'Type'  => 'text',
        'Placeholder' => ''
    )
);

/*
|-------------------------------------------------------
| Begin Options Functions
|-------------------------------------------------------
*/

// create custom plugin settings menu
add_action('admin_menu', 'website_options_menu');

function website_options_menu() {

    //create new top-level menu
    add_menu_page('Website Settings', 'Website Settings', 'administrator', __FILE__, 'website_options_page' , null );

    //call register settings function
    add_action( 'admin_init', 'register_website_options' );
}

function register_website_options() {
    //register settings
    global $website_settings;

    foreach($website_settings as $key => $value){
        register_setting('website-options-group', $value['Name']);   
    }

}

function website_options_page() {

    global $website_settings;
?>
<div class="wrap">
<h2>Website Options</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'website-options-group' ); ?>
    <?php do_settings_sections( 'website-options-group' ); ?>
    <table class="form-table">
        <?php 
        foreach($website_settings as $key => $value){

            echo '
                <tr valign="top">
                <th scope="row">' . $value['Title'] . '</th>
                    <td>';
            
                if($value['Type'] == 'textarea'){
                    echo '<textarea style="min-height: 110px;" name="' . $value['Name'] . '">' . esc_attr(get_option($value['Name'])) . '</textarea>';
                } else {
                    echo '<input type="' . $value['Type'] . '" name="' . $value['Name'] . '" value="' . esc_attr(get_option($value['Name'])) . '" placeholder="' . $value['Placeholder'] .'" />';
                }
            
            echo '
                    </td>
                </tr>
                ';
        }
        ?>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>