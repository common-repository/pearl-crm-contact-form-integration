=== Brightpearl CRM Contact Form ===
Contributors: johnblackmore
Tags: CRM, contact, form, Brightpearl, SmartForm
Requires at least: 1.5
Tested up to: 2.8.6
Stable Tag: 1.0.2

Allows Brightpearl SmartForms to be easily included in WordPress

== Description ==

The Brightpearl SmartForms plugin for WordPress allows you to quickly and easily insert lead capture forms to your blog posts or pages. Once installed and configured you can drop your chosen contact form in to your blog simply by typing {Brightpearl_smartform}.

== Installation ==

Download the plugin and remember where you have put it, then follow these 3 easy steps.

   1. Log in to WordPress and select "Add New" from the Plugins menu.
   2. Select "Upload" as the plugin source
   3. Select the file you just downloaded and click "Install Now"

On the following screen after the plugin has installed click "Activate Plugin Now"

== Configuration ==

In Brightpearl:

   1. In the "Contacts" zone select "Setup -> SmartForms"
   2. Make a note of your Brightpearl SmartForm Domain shown below your list of SmartForms
   3. Choose which form you want to be your default SmartForm and click the edit (pencil) icon
   4. Make a note of the SmartForm Code shown on the "External Link" tab

In WordPress:

   1. From the settings menu on the left hand side select "Brightpearl CRM"
   2. Enter the Brightpearl SmartForm Domain and default SmartForm Code as noted in the previous steps
   3. Save your changes to complete the configuration process.

== Usage ==

You can use the Brightpearl SmartForms plugin from within the Posts section or the Pages section. To use the form you set as your default SmartForm all you need to enter within the body of your blog post or page is:

{Brightpearl_smartform}

If you want to use a SmartForm other than the one you set as your default you can do this by adding the SmartForm Code to the end of the Brightpearl SmartForms tag for example:

{Brightpearl_smartform VHhjUaitJj10iadDaOS9s_AZ4sdXncdKDRje72PoFFw,}

To make things easy you can find the WordPress code for any SmartForm in your Brightpearl account by looking on the "External Link" tab while editing the form.


== Frequently Asked Questions ==

= Can I change the form fields? =

Yes, the form fields can be changed by logging in to your Brightpearl account and editing the Brightpearl SmartForm you are linking to.

= Why don't I see the "Plugins" menu in my WordPress admin? =

You can only install and configure Brightpearl SmartForms if you are logged in as an administrator for your WordPress. Additionally you must be running your own WordPress install, you can not install Brightpearl SmartForms to a WordPress.com hosted account.

= Will Brightpearl SmartForms work with WordPress.com? =

No, at the moment you can not use the Brightpearl SmartForms plugin with WordPress.com. You need to have your own installation of WordPress to use Brightpearl SmartForms.

= Can I use Brightpearl SmartForms on my normal website? =

Yes, Brightpearl SmartForms can also be embedded in non-WordPress websites. There is more information and a video about this in our blog post Smartforms – saving you time and effort.

== Changelog ==

= 1.0.0 =
* First release

= 1.0.1 =
* Updated CSS issue in IE8 browsers affecting templates that have a right-nav column

= 1.0.2 =
* Updated branding and fixed a bug whereby form was not showing
