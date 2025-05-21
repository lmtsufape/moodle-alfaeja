<?php

namespace theme_alfa\output;

use theme_boost\output\core_renderer as boost_core_renderer;
defined('MOODLE_INTERNAL') || die();
class core_renderer extends boost_core_renderer {
    public function footer() {
        // Adiciona conteúdo no lugar de {{{ output.footer }}}
        return parent::footer() . $this->render_page_footer();
    }

    public function render_page_footer() {
        $logo = [   'site' => $this->image_url('logo_rodape_alfa_eja_brasil', 'theme_alfa')->out(false),
                    'ipf' => $this->image_url('logo_rodape_ipf', 'theme_alfa')->out(false),
                    'petrobras' =>  $this->image_url('logo_rodape_petrobras', 'theme_alfa')->out(false),        
                    'linhas' => $this->image_url('linhas', 'theme_alfa')->out(false),
                ];
        $frase = get_config('theme_alfa', 'footertext');

        return $this->render_from_template('theme_alfa/core/footer', ['logo' => $logo, 'footertext' => $frase]);
    }
    
    public function navbar(): string {
        $context = [
            'sitename' => format_string($this->page->course->fullname ?? 'Site'),
            'get_items' => [
            
            ]
        ];
    
        return $this->render_from_template('theme_alfa/core/navbar', $context);
    }

    public function frontpage_content() {
        $logo = [   'site' => $this->image_url('logo_rodape_alfa_eja_brasil', 'theme_alfa')->out(false),
                    'ipf' => $this->image_url('logo_rodape_ipf', 'theme_alfa')->out(false),
                    'petrobras' =>  $this->image_url('logo_rodape_petrobras', 'theme_alfa')->out(false),        
                    'linhas' => $this->image_url('linhas', 'theme_alfa')->out(false),
                ];
        return $this->render_from_template('theme_alfa/frontpage-content', ['logo' => $logo]);

    }


    
    
    
    
}