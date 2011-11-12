<?php

class AdminMenu {

    static function getAdminMenu() {
        $data = array();
        $data['actualite'] = array(
            'link' => Uri::create('admin/actualite'),
            'title' => 'Les Actualites',
        );
        $data['page'] = array(
            'link' => Uri::create('admin/page'),
            'title' => 'Les Pages',
        );
        $data['user'] = array(
            'link' => Uri::create('admin/user'),
            'title' => 'Les Users',
        );
        return $data;
    }
}