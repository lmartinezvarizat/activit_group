<?php

class Controller_Index extends Controller_Template {

    public $template = 'template/front/page';

    public function action_index() {
        $data = array();
        if (isset($_POST['todo']) && ($_POST['todo'] == 'create_user' || $_POST['todo'] == 'login')) {
            self::action_login();
        }
        if (substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/') + 1), (strpos($_SERVER['REQUEST_URI'], '.html') - (strrpos($_SERVER['REQUEST_URI'], '/') + 1))) != '' && !strpos($_SERVER['REQUEST_URI'], '.html') === false) {
            $url_virtuel = substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/') + 1), (strpos($_SERVER['REQUEST_URI'], '.html') - (strrpos($_SERVER['REQUEST_URI'], '/') + 1)));
            $where = array(
                'where'    => array('page_titre_virtuel' => $url_virtuel)
            );
            $pages = Model_Page::find('all',$where);           
            if (count($pages) == 1) {
                foreach ($pages as $page) {
                    $data['page'] = $page;
                }
                $this->template->title = $data['page']['page_titre'];
                $this->template->content = View::factory('front/'.$data['page']['page_view'], $data);
            } else {
                Response::redirect('');
            }
        } else {
            //en attendant on met la page de construction
            $this->template->title = 'Site en construction';
            $this->template->content = View::factory('front/construction');
        }
    }

    public function action_login() {
        $save = array();
        if (isset($_POST['todo']) && $_POST['todo'] == 'create_user') {
            foreach ($_POST as $id => $value) {
                if ($id != 'todo') {
                    $save[$id] = $value;
                }
            }
            $user = new Model_User($save);
            $user->save();
            Session::set('front_loggue', $user);
            Response::redirect('profil.html');
        } else if (isset($_POST['todo']) && $_POST['todo'] == 'login') {
            $array_where = array(
                'user_password'  => $_POST['user_password'],
                'user_login'     => $_POST['user_login'],
            );
            $query = Model_User::find()->where($array_where);
            $nb_response = $query->count();
            if ($nb_response) {
                $data_user = $query->get_one();
                Session::set('front_loggue',$data_user);
                Response::redirect('profil.html');
            }
        }

    }

    public function action_404() {
        $messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
        $data['title'] = $messages[array_rand($messages)];
        $this->response->status = 404;
        $this->response->body = View::factory('error/404', $data);
    }
}
