=== Plugin Name ===
Contributors: 
Donate link: http://example.com/
Tags: better place, widget, donate, spenden, charity, gemeinnutzig, betterplace, betterplace.org, paypal, credit card, donating, widget, easy to use
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 0.95.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a Plugin for integrationing a charity project of the platform betterplace.org to a Wordpress site. 

== Description ==

This is a Plugin for integrationing a charity project of the platform [betterplace.org](www.betterplace.org) to a Wordpress site. 

The plugin includes a Widget for displaying different project data. 
You can choose the static mode to display one betterplace.org project on every page that displays the choosen widget area.
Also the widget comes along with a dynamic mode in order to display different projects on different pages in the same widget area. 

There are sereval display options. It is posible to display just the project and a link to the donation screen or you can display a list of all or a number of needs that belong to the project.

### Feature List
* Display project and project need details of betterplace.org projects
* Output project and project need progress in sereval ways
* Add direct links to the donate screen of the project on betterplace.org
* Easy to use widget
* Use one widget to display different projects on different pages
* Progress display (per cent & progress bar)

### Upcoming Features
* Shortcode support
* Picture display of betterplace.org pictures
* Multi language support

== Installation ==

1. Upload all files to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the Widget to a widget area and choose your options, or use the project object in your template files in order to display betterplace.org data.

== Frequently Asked Questions ==

= How I get the betterplace.org ID? =

Go to the project page on betterplace.org and look on the URI. 
The betterplace.org ID is the number after "projects/".
For example:
http://www.betterplace.org/de/projects/632-kinderhospiz-barenherz-leipzig-e-v
This project has the ID 632.

= Are there any shortcode options =

Actualy no. A shortcode feature is planed for the upcoming version. 

= How can I display different projects on specific Wordpress pages or posts =

Just use the dynamic mode of the widget. You have to add a widget area to the template of those pages or use the standart widget area of your Wordpress theme.
Then go to the page or post screen in dashboard and enter the corect betterplace.org ID of the project you want display into the box on the right side. May you have to activate this box on the screen options if it is not displayed.
After that go to the widget screen and drag and drop the widget area. Then set the widget to dynamic mode and choose display options of favor.

== Screenshots ==


== Changelog ==

= 9.5.1 =
* small widget bugfix. 

= 9.5.1 =
* Important bugfixes. 
* Widget display scripts fixed.

= 9.5 =
* First version that was released.

== Upgrade Notice ==

= 9.5.1 =
Important bugfixes, please upgrade.


== Arbitrary section ==

## Better Press API Documentation

#### am_bpProjectController

The `am_bpProjectController` is the main Object for displaying betterplace.org data. To use it in custom template files just create a new instance, add a betterplace.org ID and use the get methods.

Example:
`$bp_projectObject = new am_bpProjectController();`
`$bp_projectObject->addProject(7910);`
`echo $bp_projectObject->getProjectTitle();`

This will display the Title of the project that has the ID 7910.

You are able to display project needs in the same way.

Example:
`$bp_projectObject = new am_bpProjectController();`
`$bp_projectObject->addProject(7910);`
`echo $bp_projectObject->getNeedTitle()`

This will display the title of the first need of the project that have the ID 7910.

In order to display more than one need you can use the `nextProject()` method to switch needs. It returns `false` when no more needs are left:

Example:
`$bp_projectObject = new am_bpProjectController();`
`$bp_projectObject->addProject(7910);`
`echo '<h3>'.$bp_projectObject->getNeedTitle().'</h3>'`
`do{
`echo '<h4>'.$bp_projectObject->getNeedTitle().'</h4>';`
`}while($bp_projectObject->nextProject());` 

This will display all titles of needs of the project that have the ID 7910.

In order to display more than one project use the method `nextProject()` in the same way. First you have to add all projects and after that you are able to switch projects:

Example:
`$bp_projectObject = new am_bpProjectController();`
`$bp_projectObject->addProject(7910);`
`$bp_projectObject->addProject(932);`
`$bp_projectObject->addProject(1032);`
`do{
`echo '<h3>'.$bp_projectObject->getProjectTitle().'<h3>';`
`}while($bp_projectObject->nextProject());` 

This will display the titles of the Projects that got the ID 768, 932, 1032.

### All methods of am_bpProjectController

#### addProject($id)

Add a betterplace.org project to the stack.

#### nextProject()

Moves the project pointer to the next project. Returns *false* if no more projects are on stack.

####  nextNeed()

Moves the need pointer of the pointed project to the next need. Returns *false* if no more projects are on stack.
	
#### firstProject()

Moves the pointer to the first project on the stack.
	
#### getProjectID()

Returns the betterplace.org ID of the project that is pointed.
	
#### getProjectTitle() 

Returns the title of the pointed project.
	 
### getProjectDescription($maxnumber, $option) 

Returns the description of the project that is pointed. It acepts two arguments to limitade the description. `$option = 0` will limit count of letters that is specified in `$maxnumber`, `$option = 1` limits `$maxnumber` words.
 	 
#### getProjectAmount($option, $format)

Returns money amounts of the project. If `$option = 0` it returns the amount of money that is still needed to fulfil the project. `$option = 1` returns the monay that is already donated and `$option = 2` is the complete amount that has been requested. The argument `$format` specified the display of the amount. `$format = 1` returns the amount in Euro formated as usual in Europe. If `$format=0` the method returns the complete amount unformated in Cents. $format = 2` returns only the amount of Euros without cent amounts. `$format = 3` returns only the amount of Cents like if you would cut the full Euro amounts away.    	  

#### getProjectProgress() 

Returns the progress of the project in per cent.

#### getProjectLink($option)

Returns links belonging to the project that is pointed. `$option = 0` will return the link to the project page. `$option = 1` will the link that leds directly to the donation page of the project.

#### getProjectOpinions($option)

Returns the number of opinions about the project on betterplace.org. If the argument is set to `$option = 0` you will get the total number of opinions. If `$option` is set to 1 you'll get the number of positive opions, if it is set to `2` you'll get the count of negative opinions. 
	  
#### getProjectDonors()

Returns the total number of donors which have already donated the pointed project.

#### getProjectNeedCount() 

Returns the number of needs of the project that is pointed. 

#### getNeedID() 

Returns the ID of the need that is pointed.

#### getNeedDate($option) 

If `$option = 0` this method will return the date of creation of the need. If `$option = 1` it will return the date of the last update of the need.
 
#### getNeedTitle() 

This method returns the title of the pointed need.

#### getNeedDescription($maxnumber, $option)

Returns the description of the need that is pointed. It acepts two arguments to limitade the description. `$option=0` will limit count of letters that is specified in `$maxnumber`, `$option=1` limits `$maxnumber` words of the need.

#### getNeedProgress()

Returns the progress of the pointed need in per cent.

#### getNeedAmount($option, $format)

Returns money amounts of the need. If `$option = 0` it returns the amount of money that is still needed to fulfil the need. `$option = 1` returns the monay that is already donated and `$option = 2` is the complete amount that has been requested. The argument `$format` specified the display of the amount. `$format = 1` returns the amount in Euro formated as usual in Europe. If `$format=0` the method returns the complete amount unformated in Cents. $format = 2` returns only the amount of Euros without cent amounts. `$format = 3` returns only the amount of Cents like if you would cut the full Euro amounts away.    	  

#### iscompletedNeed()

This method returns true, if the need is already completed. 