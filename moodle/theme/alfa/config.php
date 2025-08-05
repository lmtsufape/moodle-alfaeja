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

// Define os layouts e em qual arquivo PHP eles vivem (em theme/alfa/layout/).
$THEME->layouts = [
    // Página inicial do site.
    'frontpage' => [
        'file' => 'frontpage.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    // Página de curso padrão.
    'course' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    // Página de administração.
    'admin' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    // Página de login.
    'login' => [
        'file' => 'login.php',
        'regions' => [],
        'options' => ['nonavbar' => true],
    ],
    // Página de popup.
    'popup' => [
        'file' => 'popup.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    // Página de manutenção.
    'maintenance' => [
        'file' => 'maintenance.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    // Página de incorporação (embed).
    'embedded' => [
        'file' => 'embedded.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    // Página de impressão.
    'print' => [
        'file' => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    // Página de relatório.
    'report' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    // Página de painel do usuário.
    'mydashboard' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    // Página de perfil do usuário.
    'mypublic' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
    // Página de edição de curso.
    'coursecategory' => [
        'file' => 'columns1.php',
        'regions' => [],
    ],
    // Layout básico sem blocos (fallback).
    'base' => [
        'file' => 'columns1.php',
        'regions' => [],
    ],
    // Layout padrão com blocos laterais (fallback).
    'standard' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-pre',
    ],
];

// $THEME->javascripts = ['alfa-script'];

// Se tiver pré/post SCSS, também:
// $THEME->prescsscallback  = 'theme_alfa_get_pre_scss';
// $THEME->extrascsscallback = 'theme_alfa_get_extra_scss';

// Suporte a blocos:
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$CFG->themedesignermode = true;
$THEME->supportscssoptimisation = false;

// Suporte a editor TinyMCE:
// $THEME->editor_sheets = ['editor'];

// Suporte a ícones FontAwesome:
// $THEME->iconsystem = '\theme_boost\output\icon_system_fontawesome';

// Outras opções úteis:
// $THEME->doctype = 'html5';
// $THEME->yuicssmodules = array();
// $THEME->requiredblocks = '';
// $THEME->hidefromselector = false;
// $THEME->csspostprocess = 'theme_alfa_process_css';
// $THEME->supportscssoptimisation = true;

