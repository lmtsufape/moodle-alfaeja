<?php

// Define o namespace da sua classe. Deve corresponder à estrutura de pastas do seu tema.
namespace theme_alfa\output;

// Garante que o arquivo só seja executado dentro do ambiente Moodle.
defined('MOODLE_INTERNAL') || die();

/**
 * Renderizador de curso customizado para o tema 'Alfa'.
 * Esta classe estende o renderizador de curso padrão do Moodle (\core_course_renderer),
 * permitindo que você altere como os cursos são exibidos.
 */
class core_course_renderer extends \core_course_renderer {

    /**
     * Sobrescreve a função original `coursecat_coursebox()` que está em
     * [Moodle Root]/course/renderer.php.
     *
     * Esta versão fará com que os cursos sejam renderizados usando o seu
     * template Mustache `theme/alfa/templates/core_course/course_overview_card.mustache`,
     * com o design que discutimos.
     *
     * @param \coursecat_helper $chelper Helper da categoria de curso.
     * @param \stdClass $course O objeto do curso a ser renderizado.
     * @param string $additionalclasses Classes CSS adicionais passadas para o box.
     * @return string O HTML renderizado do card do curso customizado.
     */
   
}