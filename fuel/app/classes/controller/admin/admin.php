<?php

class Controller_Admin_Admin extends Controller_Template {

    public $template = 'template/admin/admin';

    public function before() {
        $login_session = Session::get('login');
        if (!$login_session) {
            Response::redirect('admin/login');
        }
        parent::before(); // toujours le laisser dans le cas d'un controleur_template

    }

    public function action_index() {
        $data = array();
        $data['links'] = AdminMenu::getAdminMenu();
        $this->template->title = "Bienvenue dans l'admin";
        $this->template->menu = View::factory('admin/index', $data);
        $this->template->content = htmlentities("Bon je sais, pour l'instant c'est pas très beau mais bon en attendant ça va bien comme ça !!");
    }

    public function action_404() {
        $messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
        $data['title'] = $messages[array_rand($messages)];
        $this->response->status = 404;
        $this->response->body = View::factory('error/404', $data);
    }
}
