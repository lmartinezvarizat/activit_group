<?php

class Controller_Admin_User extends Controller_Template {

    public $template = 'template/admin/admin';

    public function before() {
        $login_session = Session::get('login');
        if (!$login_session) {
            Response::redirect('admin/login');
        }
        parent::before();
    }

    public function action_index() {
        $data = array();
        $data['links'] = AdminMenu::getAdminMenu();
        $users = Model_User::find('all');
        foreach($users as $user) {
            $data['users'][]= $user;
        }
        $this->template->title = 'Liste des users';
        $this->template->content = View::factory('admin/user/index', $data);
        $this->template->menu = View::factory('admin/index', $data);
    }

    public function action_add() {
        $data = array();
        $data['links'] = AdminMenu::getAdminMenu();
        if (isset($_POST['todo'])) {
            if ($_POST['todo'] == 'add_user') {
                $save = array();
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo') {
                        $save[$id] = $value;
                    }
                }
                $user = new Model_User($save);
                $user->save();
                Response::redirect('admin/user');
            } else if ($_POST['todo'] == 'modif_user') {
                $user = Model_User::find($_POST['user_id']);
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo' && $id != 'user_id' && $id != 'submit') {
                        $user->{$id} = $value;
                    }
                }

                $user->save();
                Response::redirect('admin/user');
            }
        } else {
            $data['users'] = '';
            if (isset($_GET['todo']) && $_GET['todo'] == 'modif' && isset($_GET['user_id'])) {
                $data['users'] = Model_User::find($_GET['user_id']);
            }
            $this->template->title = 'Ajouter/modifier un user';
            $this->template->content = View::factory('admin/user/add', $data);
            $this->template->menu = View::factory('admin/index', $data);
        }
    }

    public function action_delete() {
        $data = array();
        if (isset($_GET['todo']) && $_GET['todo'] == 'delete' && isset($_GET['user_id'])) {
            $delete = Model_User::find($_GET['user_id']);
            $delete->delete();
            Response::redirect('admin/user');
        }
    }
}