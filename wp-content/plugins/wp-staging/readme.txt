=== WP Staging - DB & File Duplicator & Migration  === 

Author URL: https://wordpress.org/plugins/wp-staging
Plugin URL: https://wordpress.org/plugins/wp-staging
Contributors: ReneHermi, WP-Staging
Donate link: https://wordpress.org/plugins/wp-staging
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: backup, staging, duplication, clone, migration
Requires at least: 3.6+
Tested up to: 5.5
Stable tag: 2.7.5
Requires PHP: 5.5

A duplicator plugin - clone/move, duplicate & migrate live websites to independent staging and development sites that are accessible​ by authorized users only.

== Description == 

<h3>WP Staging for WordPress Migration & Cloning </h3>
This duplicator plugin allows you to create an exact copy of your entire website for staging, backup or development purposes in seconds.
(Exact backup time depends on the size of your website)<br /><br />
It creates a clone of your website into a subfolder of your main WordPress installation including an entire copy of your database. 
 <br /> <br />
<strong>Note: </strong> For pushing & migrating plugins and theme files to production site, check out the pro edition [https://wp-staging.com/](https://wp-staging.com/ "WP Staging Pro")
<br /><br />
All the time-consumptive database and file copying operations are done in the background. The plugin even automatically does an entire search & replace of all serialized links and paths.
 <br /><br />
This staging and backup plugin works even on the smallest shared hosting servers.
 <br /><br />
 <br /><br />
WP Staging can protect your website from being broken or unavailable because of installing untested plugin updates! 

[youtube https://www.youtube.com/watch?v=Ye3fC6cdB3A]

<p>Note: WordPress 5.x has been shipped with a new visual editor called Gutenberg. Use WP Staging to check if Gutenberg editor is working as intended on your website and that all used plugins are compatible with that new editor.</p>

= Main Features =

* WP STAGING creates the staging website into a subfolder of your production site like example.com/staging-site.
* No SASS service. All data belongs to you and stays on your server.
* Easy to use! Create a clone of your site by clicking one button "CREATE NEW STAGING SITE".
* No server timeouts on huge websites or/and small hosting servers
* Very fast - Migration process takes only a few seconds or minutes, depending on the website's size and server I/O power.
* Only administrators can access the staging website. (Login with the same credentials you use on your production site)
* SEO friendly: The staging website is unavailable to search engines due to a custom login prompt and no-index header.
* The admin bar on the staging website is orange colored and shows clearly when you work on the staging site.
* All duplicated database tables get a new prefix beginning with wpstg(int)_.
* Extensive logging features
* Supports all main web servers including Apache, Nginx, and Microsoft IIS
* <strong>[Premium]: </strong>Choose a separate database and select a custom directory for cloning
* <strong>[Premium]: </strong>Make the staging website available from a subdomain like dev.example.com
* <strong>[Premium]: </strong>Push & migrate entire staging site inc. all plugins, themes, and media files to production website.
* <strong>[Premium]: </strong>Define user roles that get access to the staging site only. For instance, clients or external developers.
* <strong>[Premium]: </strong>Migration and cloning of WordPress multisites

> Note: Some features are Premium. Which means you need WP Staging Pro to use those features. You can [get WP Staging Premium here](https://wp-staging.com)!

* New: Compatible with WordFence & All In One WP Security & Firewall

= Additional Features WP STAGING PRO Edition  =

* Cloning and migration of WordPress multisites
* Define a separate database and a custom directory for cloning
* Clone your website into a subdomain
* Specify certain user roles for accessing the staging site
* Copy all modifications from staging site to the production website

<strong>Change your workflow of updating themes and plugins data:</strong>

1. Use WP Staging to clone a production website for staging, testing or backup purposes
2. Create a backup of your website
3. Customize theme, configuration, update or install new plugins
4. Test everything on your staging site and keep a backup of the original site
5. If everything works on the staging site start the migration and copy all modifications to your production site!

<h3> Why should I Use a Staging Website? </h3>

Plugin updates and theme customizations should be tested on a staging platform first before they are done on your production website. 
It's recommended having the staging platform on the same server where the production website is located to use the same hardware and software environment for your test website and to catch all possible errors during testing.

Before you update a plugin or going to install a new one, it is highly recommended to check out the modifications on a clone of your production website.
This makes sure that any modifications work on your production website without throwing unexpected errors or preventing your site from loading. Better known as the "WordPress blank page error".

Testing a plugin update before installing it in a production environment isn´t done very often by most users because existing staging solutions are too complex and need a lot of time to create a 
an up-to-date copy of your website.

Some of you might be afraid of installing plugins updates because Your follow the rule "never touch a running system" with having in mind that untested updates are increasing the risk of breaking Your site.
This is one of the main reasons why WordPress installations are often outdated, not updated at all and insecure because of this non-update behavior.

<strong> It's time to change this, so use "WP Staging" for cloning, backup and migration of WordPress websites</strong>

<h3> Can´t I just use my local wordpress development system like xampp / lampp for testing and backup purposes? </h3>

You can test your website locally but if your local hardware and software environment is not a 100% exact clone of your production server there is NO guarantee that every aspect of your local copy is working on your production website exactly as you expect it. 
There are some obvious things like differences in the config of PHP and the server you are running but even such non-obvious settings like the amount of RAM or the CPU performance can lead to unexpected results on your production website. 
There are dozens of other possible cause of failure which can not be handled well when you are testing your changes on a local platform only without creating a backup staging site.

This is were WP Staging jumps in... Site cloning, backup and staging site creation simplified!

<h3>I just want to migrate the database from one installation to another</h3>
If you want to migrate your local database to an already existing production site you can use a tool like WP Migrate DB.
WP Staging is intended for creating a staging site with latest data from your production site or creating a backup of it. So it goes the opposite way of WP Migrate DB.
Both tools are excellent cooperating each other.

<h3>What are the benefits compared to a plugin like Duplicator?</h3>
I really the Duplicator plugin. It is a great tool for migrating from a development site to production one or from production site to development one and a good tool to create a backup of your WordPress website. 
The downside is that before you can even create an export or backup file with Duplicator a lot of adjustments, manually interventions and requirements are needed before you can start the backup process.
Duplicator also needs some skills to be able to create a backup and development/staging site, where WP Staging does not need more than a click from you.
Duplicator is best placed to be a tool for first-time creation of your production site. This is something where it is very handy and powerful.

If you have created a local or web-hosted development site and you need to migrate this site the first time to your production domain than you are doing nothing wrong with using
the Duplicator plugin! If you need all your latest production data like posts, updated plugins, theme data and styles in a testing environment or want to create a quick backup before testing out omething than I recommend to use WP STAGING instead!

= Can I give You some Feedback? =
This plugin has been created in thousands of hours and works even with the smallest shared web hosting package. 
We also use enterprise level approved testing coding structures to make sure that the plugin runs rock solid on your system. 
If you are a developer you will probably like to hear that we use Codeception and PHPUnit for our software.

As there are infinite numbers of possible server constellations it still might happen that something does not work for you 100%. In that case, 
please open a [support request](https://wp-staging.com/support/ "support request") and describe your issue.


= Important =

Permalinks are disabled on the staging / backup site after first time cloning / backup creation
[Read here](https://wp-staging.com/docs/activate-permalinks-staging-site/ "activate permalinks on staging site") how to activate permalinks on the staging site.


 
= How to install and setup? =
Install it via the admin dashboard and to 'Plugins', click 'Add New' and search the plugins for 'WP STAGING'. Install the plugin with 'Install Now'.
After installation, go to the settings page 'Staging' and do your adjustments there.


== Frequently Asked Questions ==

* I can not log in to the staging / backup site
If you are using a security plugin like All In One WP Security & Firewall you need to install the latest version of WP STAGING to access your cloned backup site.
Go to WP Staging > Settings and add the slug to the custom login page which you set up in All In One WP Security & Firewall plugin.



== Official Site ==
https://wp-staging.com

== Installation ==
1. Download the file "wp-staging.zip":
2. Upload and install it via the WordPress plugin backend wp-admin > plugins > add new > uploads
3. Activate the plugin through the 'Plugins' menu in WordPress.

== Screenshots ==

1. Step 1. Create a new WordPress staging / backup site
2. Step 2. Scanning your website for files and database tables
3. Step 3. Wordpress staging site creation in progress
4. Finish - Access your backup / staging site

== Changelog ==

= 2.7.5 =
* New: Compatible up to WordPress 5.4.2
* Fix: Remove beta notice
* Fix: Error if views are cloned
* Fix: Fatal error if WordPress is older than 4.5
* Fix: Merge pro/free version
* Fix: Step switching logic does not work properly
* Fix: Fix progress bar when certains steps are skipped
* Fix: Change german translation for REPORT ISSUE

= 2.7.4 =
SKIP VERSION

= 2.7.3 =
* New: Compatible up to WordPress 5.4.1
* New: Allow filtering of staging site title
* Fix: Since WordPress WP 5.4 cloning fails if WordPress is installed in subfolder
* Fix: Loading icon not shown when disk space is checked
* Fix: Can not copy tables if prefix is capitalized & has no underscore

= 2.7.2 =
* New: Compatible up to WordPress 5.4
* Fix: Fatal error on WordPress 4.6 and older

= 2.7.1 =
* HotFix: Prefix hotfix failed

= 2.7.0 =
* HotFix: Fix fatal error in step 6 after updating to WordPress 5.4

= 2.6.9 =
* Fix: Can not login to staging site under certain circumstances
* Fix: Use user selected language setting instead global site based one
* Fix: Fatal Error: curl_version() not defined in SystemInfo.php
* New: Refactored structure for easier maintenance
* New: Core support for WP Staging snapshots
* New: Implementing of UnitTests

= 2.6.8 =
* Fix: If server is windows it will result in missing files after cloning and can lead to fatal errors of the staging site

= 2.6.7 =
* Fix: Update function adds duplicate string to internal urls like https://example.com/staging/staging/wp-content/*
* New: Support for WP 5.3.2

= 2.6.6 =
* Fix: Fatal error: Cannot redeclare wpstgpro_overwrite_nonce() and wpstg_overwrite_nonce() after activating pro version on top of this free one
* Fix: wpdb->prepare() warning after initial cloning

= 2.6.5 =
* New: Support for WordPress 5.3.1
* New: Refactoring code base and remove app folder
* New: Add french language files
* New: Add WP Staging logo to login form
* New: Set 24 hours expiration date to process lock
* New: Add link URL to staging site title
* Fix: Fatal error: Invalid serialization data for DateTime object #91
* Fix: Add missing string language location
* Fix: Function fnmatch() not available in all systems
* Fix: Warning in staging site after initial cloning in db row rewrite_rules
* Fix: Wrong staging site is selected when delete function is executed and there are more then 10 staging sites

= 2.6.4 =
* Fix: Broken image folder with duplicate leading slash after cloning

= 2.6.3 =
* New Support for WordPress 5.2.4
* New: Allow wildcards for excluding files
* New: Add hook "wpstg_clone_action_staging" to execute code on staging site after cloning 
* Tweak: Improved support for custom uploads folder if user customized UPLOADS constant or upload_path in DB
* Fix: Better compatibility with Windows IIS server
* Fix: External links are broken after cloning if ABSPATH is equal to /www/
* Fix: use an alternative method for file_put_contents as it is not supported on all systems due to file permission issues
* Fix: Redundant and duplicated update comments in wp-config.php in staging site


= 2.6.2 =
* Fix: Do not show warning "Preparing Data Step3: Failed to update rewrite_rules in wpstg0_options"
* Fix: Change error "Table wpstgtmp_options does not exist" to warning
* New: Add arguments for hook wpstg_cloning_complete
* New: Setup server environment variables per process and not globally (e.g. set_time_limit)
* New: Add support for custom uploads folder if user customized UPLOADS constant or upload_path in DB


= 2.6.1 =
* New: Improve styling of login form. Thanks to Andy Kennan (Screaming Frog)
* New: Add 'password lost' button to login form
* New: Change welcome page CTA
* New: Add feedback option when plugin is disabled
* Fix: PDO instances can not be serialized or unserialized
* Fix: Can not update staging site db table if there are constraints in it



= 2.6.0 =
* New: Compatible up to WordPress 5.2.2
* New: Performance improvement for directory iterator using less server ressources
* New: Add filter wpstg_folder_permission to set a custom folder permission like 0755, allows to overwrite FS_CHMOD_DIR if it has been defined.
* Fix: Error conditions in class Data does not compare type strict (== vs. ==)  resulting in interruption of clone process
* Fix: Excluded folders under wp-content level are not take into account on microsoft IIS servers

= 2.5.9 =
* New: Update for WP 5.2.1
* New: Better corporate identity and more friendly UI colors for staging sites listings and button
* New: Better warning notices before updating process is executed
* New: Add tooltips for explaining navigation buttons
* New: Check if UPLOAD constant is defined and use this value for uploads folder destination
* New: Show notice if user tries to clone a staging website.
* Fix: Staging sites listing entries appeared on the cloned website.
* Fix: Do not search & replace through "__PHP_Incomplete_Class_Name" definitions
* Fix: Prevent wordfence firewall rule interrupting the clone deletion method
* Fix: Excluded wp staging directory from deleting process is ignored and will be deleted either way
* Fix: Strip whitespaces in cloning site internal names

Complete changelog: [https://wp-staging.com/wp-staging-changelog](https://wp-staging.com/wp-staging-changelog)

== Upgrade Notice ==
* New: Compatible up to WordPress 5.4.2
* Fix: Remove beta notice
* Fix: Error if views are cloned
* Fix: Fatal error if WordPress is older than 4.5
* Fix: Merge pro/free version
* Fix: Step switching logic does not work properly
* Fix: Fix progress bar when certains steps are skipped
* Fix: Change german translation for REPORT ISSUE
