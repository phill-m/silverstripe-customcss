# silverstripe-customcss


Description
-------------------------
This module adds a css code editor field to site config allowing users to add custom css to
their website through the admin system.

The custom css is saved into a physical file in the assets area and added to the website as a
standard css requirement.

The code editor field uses Ace Code Editor provided by nathancox/silverstripe-codeeditorfield CodeEditorField 



Installation Instructions
-------------------------
1. Install https://github.com/nathancox/silverstripe-codeeditorfield
2. Place the silverstripe-customcss directory in the root of your SilverStripe installation
3. Perform a /dev/build



Configuration Options
-------------------------
```
CustomCSS:
  Rows: 15          # The number of rows t obe displayed
  Stacked: true     # If true the field will be displayed below the fields label
```
