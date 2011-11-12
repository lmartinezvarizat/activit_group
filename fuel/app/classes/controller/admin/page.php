<?php

class Controller_Admin_Page extends Controller_Template {

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
        $pages = Model_Page::find('all');
        foreach($pages as $page) {
            $data['pages'][]= $page;
        }
        $this->template->title = 'Liste des pages';
        $this->template->content = View::factory('admin/page/index', $data);
        $this->template->menu = View::factory('admin/index', $data);
    }

    public function action_add() {
        $data = array();
        $data['links'] = AdminMenu::getAdminMenu();
        if (isset($_POST['todo'])) {
            if ($_POST['todo'] == 'add_page') {
                $save = array();
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo') {
                        $save[$id] = $value;
                    }
                }
                if ($save['page_titre_virtuel'] == '') {
                	$save['page_titre_virtuel'] = str_replace(' ', '-', $save['page_titre']);
                }
                $page = new Model_Page($save);
                $page->save();
                Response::redirect('admin/page');
            } else if ($_POST['todo'] == 'modif_page') {
                $page = Model_Page::find($_POST['page_id']);
                foreach ($_POST as $id => $value) {
                    if ($id != 'todo' && $id != 'page_id' && $id != 'submit') {
                        $page->{$id} = $value;
                    }
                }

                $page->save();
                Response::redirect('admin/page');
            }
        } else {
            $data['pages'] = '';
            if (isset($_GET['todo']) && $_GET['todo'] == 'modif' && isset($_GET['page_id'])) {
                $data['pages'] = Model_Page::find($_GET['page_id']);
            }
            $this->template->title = 'Ajouter/modifier une page';
            $this->template->content = View::factory('admin/page/add', $data);
            $this->template->menu = View::factory('admin/index', $data);
        }
    }

    public function action_delete() {
        $data = array();
        if (isset($_GET['todo']) && $_GET['todo'] == 'delete' && isset($_GET['page_id'])) {
            $delete = Model_Page::find($_GET['page_id']);
            $delete->delete();
            Response::redirect('admin/page');
        }
    }
}