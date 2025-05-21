<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Cria a estrutura de abas, assim como no Boost.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingalfa', get_string('configtitle', 'theme_alfa'));

    // 🔹 Página: Geral
    $page = new admin_settingpage('theme_alfa_general', get_string('navbar', 'theme_alfa'));

    $page->add(new admin_setting_configtext(
        'theme_alfa/loginwelcome',
        get_string('loginwelcome', 'theme_alfa'),
        get_string('loginwelcome_desc', 'theme_alfa'),
        'Bem-vindo ao Moodle'
    ));

    $page->add(new admin_setting_configtext(
        'theme_alfa/navcolor',
        get_string('navcolor', 'theme_alfa'),
        get_string('navcolor_desc', 'theme_alfa'),
        '#008843'
    ));

    $settings->add($page);

    // 🔹 Página: Página Inicial
    $page = new admin_settingpage('theme_alfa_homepage', get_string('homepage', 'theme_alfa'));

    $page->add(new admin_setting_configtextarea(
        'theme_alfa/homecontent',
        get_string('homecontent', 'theme_alfa'),
        get_string('homecontent_desc', 'theme_alfa'),
        ''
    ));

    $settings->add($page);

    // 🔹 Página: Cadastro
    $page = new admin_settingpage('theme_alfa_register', get_string('register', 'theme_alfa'));

    $page->add(new admin_setting_configtextarea(
        'theme_alfa/registerinfo',
        get_string('registerinfo', 'theme_alfa'),
        get_string('registerinfo_desc', 'theme_alfa'),
        ''
    ));

    $settings->add($page);

    // 🔹 Página: Rodapé
    $page = new admin_settingpage('theme_alfa_footer', get_string('footer', 'theme_alfa'));

    $page->add(new admin_setting_configtextarea(
        'theme_alfa/footertext',
        get_string('footertext', 'theme_alfa'),
        get_string('footertext_desc', 'theme_alfa'),
        '© 2025 - Minha Instituição'
    ));

    $settings->add($page);

    // 🔹 Página: Extras
    $page = new admin_settingpage('theme_alfa_extra', get_string('extra', 'theme_alfa'));

    $page->add(new admin_setting_configcheckbox(
        'theme_alfa/enablebacktotop',
        get_string('enablebacktotop', 'theme_alfa'),
        get_string('enablebacktotop_desc', 'theme_alfa'),
        1
    ));

    $settings->add($page);
}
