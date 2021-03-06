<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

# Load phpdotenv
$hook['pre_system'] = function () {
  $dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
  $dotenv->load();
};

$hook['post_controller_constructor'][] = array(
  'class'    => 'CheckLogin',
  'function' => 'login_check',
  'filename' => 'checklogin.php',
  'filepath' => 'hooks'
);
