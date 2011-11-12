<?php

class Controller_Admin_Login extends Controller {

    public function action_index() {
        $data = array();
        if (isset($_POST['todo']) && $_POST['todo'] == 'verif_login') {
            $array_where = array(
                'admi_login'    => $_POST['admi_login'],
                'admi_password' => $_POST['admi_password'],
            );
            $query = Model_Admin::find()->where($array_where);
            $nb_response = $query->count();
            if ($nb_response) {
                $data_user = $query->get_one();
                Session::set('login', md5($data_user['admi_id']));
                Response::redirect('admin/admin');
            } else {
                $data['response'] = 'Pb de connexion';
                $this->response->body = View::factory('login/index', $data);
            }
        } else {
            $login_session = Session::get('login');
            if (!$login_session) {
                $this->response->body = View::factory('login/index',$data);
            } else {
                Response::redirect('admin/admin');
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
