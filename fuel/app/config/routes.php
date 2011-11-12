<?php
return array(
    '_root_'  => 'index',  // The default route
    '_404_'   => 'error/404',    // The main 404 route
    'admin'   => 'admin/admin',
	'index/login' => 'index/login'

    /**
     * This is an example of a BASIC named route (used in reverse routing).
     * The translated route MUST come first, and the 'name' element must come
     * after it.
     */
    // 'foo/bar' => array('welcome/foo', 'name' => 'foo'),
);