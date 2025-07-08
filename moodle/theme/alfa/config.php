<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'alfa';
$THEME->sheets = [];
$THEME->scss = function($theme) {
    return theme_alfa_get_main_scss_content($theme);
};
$THEME->editor_scss = [];
$THEME->parents = ['boost'];
$THEME->enable_dock = false;
$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_boost_csspostprocess';
