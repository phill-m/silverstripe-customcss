<?php
/**
 * Created by PhpStorm.
 * User: phil
 * Date: 04/07/15
 * Time: 17:59
 */
class PageExtension extends Extension {

    public function onAfterInit() {
        Requirements::css('assets/_customcss/custom-css.css');
    }

}