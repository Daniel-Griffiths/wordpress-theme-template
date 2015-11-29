# Wordpress Theme Template
A Basic Wordpress Theme

## Upcoming Features
- Replace CSS with SASS
- Create Grunt task to compile and minify all assets

##Sidebar
By default the theme uses a full width view with no sidebar. There are 3 templates which allow a sidebar to be added either to the left, the right, or below the main content area. This can be changed by editing a page and choosing the template dropdown.

##Footer
The footer comes with 4 columns as standard. Columns 1-3 can be edited via the widgets page in Wordpress, Column 4 displays the company address.

##Settings
The theme includes a new "Website Settings" option that is added in the admin dashboard of Wordpress. By default this has a few basic option such as company details and social media URL's. 

To add more options open up the `/includes/theme-options.php` file and add a new array into the main `website_settings` array. See the example below:-
```
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

array(
    'Title' => 'My New Website Setting',
    'Name'  => 'website_new_setting',
    'Type'  => 'text',
    'Placeholder' => 'Please enter some text here'
)
```
