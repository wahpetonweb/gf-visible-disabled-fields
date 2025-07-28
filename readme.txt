=== GF Visible Disabled Fields ===
Contributors: wahpetonweb
Tags: gravity forms, conditional logic, disable fields, visible fields, visibility
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


Prevents Gravity Forms from hiding fields due to conditional logic if the field has the CSS class 'gf-visible-disabled'.

== Description ==

By default, Gravity Forms hides fields when conditional logic rules are not met. This plugin overrides that behavior **for specific fields only**.

If a field has the CSS class `gf-visible-disabled`, it will remain visible when conditional logic would normally hide it. Instead of disappearing, the inputs will be disabled, and a message is shown to the user explaining that the field is unavailable based on previous selections.

== Features ==

* Keeps selected fields visible even when logic says to hide them
* Disables the inputs for those fields instead
* Provides a visible message for accessibility and clarity
* Lightweight and easy to use
* Requires no form or JavaScript editing

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/` or install via the WordPress Plugin Directory.
2. Activate the plugin.
3. Edit any Gravity Form field you want to override.
4. Under **Appearance > Custom CSS Class**, add: `gf-visible-disabled`
5. Save and test the form.

== Frequently Asked Questions ==

= Will this override all hidden fields? =  
No. Only fields with the class `gf-visible-disabled` are affected.

= Does this affect field values on submission? =  
Yes, if a field is disabled, its value will not be submitted.
Note: Some fields that remain visible may still affect form functionality. For example, product fields that stay visible may still contribute to the total.

= Is this accessible for screen readers? =  
Yes. A visible message is added to explain that the field is disabled due to conditional logic.

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
Initial release of GF Visible Disabled Fields.