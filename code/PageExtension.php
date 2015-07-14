<?php

/**
 * An extension that adds the generated custom css to the website using the standard Requirements
 *
 * @author  Phil Mobbs <phil@phillipmobbs.co.uk>
 * @package  silverstripe-customcss
 */
class PageExtension extends Extension {


    /**
     * Add the custom css file to the pages Requirements
     */
    public function onAfterInit() {
        Requirements::css('assets/_customcss/custom-css.css');
    }

}