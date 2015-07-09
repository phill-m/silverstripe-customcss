<?php

class SiteConfigExtension extends DataExtension {

    private static $db = array(
        'CustomCSS' => 'Text'
    );


    public function updateCMSFields(FieldList $fields) {
        $codeField = CodeEditorField::create('CustomCSS');

        $codeField->setRows(Config::inst()->get('CustomCSS', 'Rows'));
        $codeField->setMode('css');

        if (Config::inst()->get('CustomCSS', 'Stacked'))
            $codeField->addExtraClass('stacked');

        $fields->addFieldToTab("Root.Main", $codeField);
    }


    public function onBeforeWrite() {
        if ($this->owner->isChanged('CustomCSS'))
            $this->createCustomCSSFile();
    }


    public function createCustomCSSFile() {
        $dir = ASSETS_PATH .'/_customcss/';

        if (!is_dir($dir))
            mkdir($dir);

        file_put_contents($dir . 'custom-css.css', $this->owner->CustomCSS);
    }

}