<?php

// Define o namespace correto para o renderer de curso
namespace theme_alfa\output\core;

// Garante que o arquivo só seja executado dentro do ambiente Moodle.
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/renderer.php');

/**
 * Renderizador de curso customizado para o tema 'Alfa'.
 * Esta classe estende o renderizador de curso padrão do Moodle (\core_course_renderer),
 * permitindo que você altere como os cursos são exibidos.
 */
class course_renderer extends \core_course_renderer {

    /**
     * Sobrescreve a função original `coursecat_coursebox()` que está em
     * [Moodle Root]/course/renderer.php.
     *
     * Esta versão fará com que os cursos sejam renderizados usando o seu
     * template Mustache `theme/alfa/templates/core_course/course_card.mustache`,
     * com o design que discutimos.
     *
     * @param \coursecat_helper $chelper Helper da categoria de curso.
     * @param \stdClass $course O objeto do curso a ser renderizado.
     * @param string $additionalclasses Classes CSS adicionais passadas para o box.
     * @return string O HTML renderizado do card do curso customizado.
     */
    protected function coursecat_coursebox(\coursecat_helper $chelper, $course, $additionalclasses = '') {
        global $CFG, $DB, $OUTPUT;
        
        // Dados para o template
        $context = [
            'course' => $course,
            'courseid' => $course->id,
            'fullname' => format_string($course->fullname),
            'shortname' => format_string($course->shortname),
            'summary' => format_text($course->summary, $course->summaryformat),
            'courseurl' => (new \moodle_url('/course/view.php', ['id' => $course->id]))->out(false),
            'additionalclasses' => $additionalclasses,
            'searchbox' => $this->searchbox()
        ];
        
        // Imagem do curso
        $courseimage = \core_course\external\course_summary_exporter::get_course_image($course);
        if (!$courseimage) {
            // Imagem padrão se não houver
            $courseimage = $this->output->image_url('course-default', 'core')->out(false);
        }
        $context['courseimage'] = $courseimage;
        
        // Informações do professor/autor
        $context['instructors'] = $this->get_course_instructors($course);
        
        // Nome da categoria do curso
        $category = $DB->get_record('course_categories', ['id' => $course->category]);
        $context['categoryname'] = $category ? format_string($category->name) : '';
        
        // Informações adicionais (duração, certificado, etc.)
        $context['courseinfo'] = $this->get_course_additional_info($course);
        
        // Número de estudantes matriculados
        $context['enrolledcount'] = $this->get_enrolled_count($course);
        
        // Renderiza usando o template customizado
        return $this->render_from_template('theme_alfa/core_course/course_card', $context);
    }
    
    /**
     * Obtém informações adicionais do curso
     */
    private function get_course_additional_info($course) {
        global $DB;
        
        $info = [];
        
        // Duração do curso (pode ser calculada ou vir de campo customizado)
        $info['duration'] = $this->get_course_duration($course);
        
        // Certificado disponível
        $info['certificate'] = $this->has_certificate($course);
        
        // Nível do curso
        $info['level'] = $this->get_course_level($course);
        
        return $info;
    }
    
    /**
     * Obtém a duração do curso
     */
    private function get_course_duration($course) {
        // Implementar lógica para calcular duração
        return '60 horas'; 
    }
    
    /**
     * Verifica se o curso tem certificado
     */
    private function has_certificate($course) {
        // Verificar se existe módulo de certificado no curso
        global $DB;
        
        $certificate = $DB->get_record('modules', ['name' => 'certificate']);
        if ($certificate) {
            return $DB->record_exists('course_modules', [
                'course' => $course->id,
                'module' => $certificate->id
            ]);
        }
        
        return false;
    }

    // Ainda não está funcionando
    private function get_course_instructors($course) {
        global $DB, $OUTPUT;
    
        $context = \context_course::instance($course->id);
        $roleshortnames = ['noneditingteacher'];
        $instructors = [];
    
        foreach ($roleshortnames as $shortname) {
            if ($role = $DB->get_record('role', ['shortname' => $shortname])) {
                $users = get_role_users(
                    $role->id,
                    $context,
                    false,
                    'u.id, u.firstname, u.lastname, u.picture, u.imagealt'
                );
                foreach ($users as $u) {
                    // monta a URL do avatar
                    $pic = new \user_picture($u);
                    $pic->size = 40;
                    $avatar = $pic->get_url($OUTPUT)->out(false);
    
                    $instructors[] = [
                        'fullname'   => fullname($u),
                        'profileurl' => (new \moodle_url('/user/profile.php', ['id' => $u->id]))->out(false),
                        'avatar'     => $avatar,
                    ];
                }
            }
        }
    
        return $instructors;
    }
    
    
    /**
     * Obtém o nível do curso
     */
    private function get_course_level($course) {
        // Implementar lógica para determinar nível
        return 'Iniciante';
    }
    
    /**
     * Obtém o número de estudantes matriculados
     */
    private function get_enrolled_count($course) {
        global $DB;
        
        $context = \context_course::instance($course->id);
        $enrolled = get_enrolled_users($context, '', 0, 'u.id');
        
        return count($enrolled);
    }
   
    /**
     * Retorna o HTML da caixa de busca de cursos.
     */
    public function searchbox($value = '') {
        return $this->course_search_form($value);
    }
}