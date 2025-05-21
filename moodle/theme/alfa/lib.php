<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Retorna o conteúdo principal do SCSS para o tema.
 *
 * @param theme_config $theme O tema.
 * @return string Conteúdo SCSS.
 */
function theme_alfa_get_main_scss_content($theme) {
    global $CFG;

    $pre = file_get_contents($CFG->dirroot . '/theme/alfa/scss/pre.scss');
    $boost = file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    $custom = file_get_contents($CFG->dirroot . '/theme/alfa/scss/custom.scss');

    return $pre . "\n" . $boost . "\n" . $custom;
}
