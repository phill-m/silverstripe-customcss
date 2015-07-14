<?php

/**
 * An extension that adds a code editor field to settings and generates a custom css file
 * when saving changes
 *
 * @author  Phil Mobbs <phil@phillipmobbs.co.uk>
 * @package  silverstripe-customcss
 */
class SiteConfigExtension extends DataExtension {

    /**
     * @var array
     */
    private static $db = array(
        'CustomCSS' => 'Text'
    );


    /**
     * Adds the CodeEditorField
     *
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields) {
        $codeField = CodeEditorField::create('CustomCSS');

        $codeField->setRows(Config::inst()->get('CustomCSS', 'Rows'));
        $codeField->setMode('css');

        if (Config::inst()->get('CustomCSS', 'Stacked'))
            $codeField->addExtraClass('stacked');

        $fields->addFieldToTab("Root.Main", $codeField);
    }


    /**
     * If the CustomCSS field has been changed then update the custom css file
     */
    public function onBeforeWrite() {
        if ($this->owner->isChanged('CustomCSS'))
            $this->createCustomCSSFile();
    }


    /**
     * Updates the custom css file
     */
    public function createCustomCSSFile() {
        $dir = ASSETS_PATH .'/_customcss/';

        if (!is_dir($dir))
            mkdir($dir);

        file_put_contents($dir . 'custom-css.css', $this->owner->CustomCSS);
    }

}