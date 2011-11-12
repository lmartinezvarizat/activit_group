<?php

class Controller_Admin_Actualite extends Controller_Template {

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
        $news = Model_Actualite::find('all');
        foreach($news as $new) {
            $data['news'][]= $new;
        }
        $this->template->title = 'Liste des actualites';
        $this->template->content = View::factory('admin/actualite/index', $data);
        $this->template->menu = View::factory('admin/index', $data);
    }

    public function action_add() {
        $data = array();
        $data['links'] = AdminMenu::getAdminMenu();
        if (isset($_POST['todo'])) {
            if ($_POST['todo'] == 'add_actu') {
                $save = array();
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo') {
                        $save[$id] = $value;
                    }
                }
                $new_actu = new Model_Actualite($save);
                $new_actu->save();
                Response::redirect('admin/actualite');
            } else if ($_POST['todo'] == 'modif_actu') {
                $actu = Model_Actualite::find($_POST['actu_id']);
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo' && $id != 'actu_id' && $id != 'submit') {
                        $actu->{$id} = $value;
                    }
                }

                $actu->save();
                Response::redirect('admin/actualite');
            }
        } else {
            $data['news'] = '';
            if (isset($_GET['todo']) && $_GET['todo'] == 'modif' && isset($_GET['actu_id'])) {
                $data['news'] = Model_Actualite::find($_GET['actu_id']);
            }
            $this->template->title = 'Ajouter/modifier une actualite';
            $this->template->content = View::factory('admin/actualite/add', $data);
            $this->template->menu = View::factory('admin/index', $data);
        }
    }

    public function action_delete() {
        $data = array();
        if (isset($_GET['todo']) && $_GET['todo'] == 'delete' && isset($_GET['actu_id'])) {
            $delete = Model_Actualite::find($_GET['actu_id']);
            $delete->delete();
            Response::redirect('admin/actualite');
        }
    }
}