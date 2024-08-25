<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Dashboard
$route['dashboard'] = 'Dashboard';
$route['change-pass'] = 'Dashboard/change_pass';
$route['logout'] = 'Dashboard/logout';
$route['working'] = 'Dashboard/working'; 
$route['profile'] = 'Dashboard/profile';
$route['inactive'] = 'Dashboard/inactive';

//homepage
$route['testing/(:any)'] = 'Homepage/testing/$1';
$route['default_controller'] = 'Homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about'] = 'Homepage/about';
$route['user/(:any)'] = 'Homepage/user/$1';
$route['panduan'] = 'Homepage/panduan';
$route['vidios'] = 'Homepage/vidios';
$route['kontak'] = 'Homepage/kontak';
$route['login'] = 'Homepage/login';
$route['registrasi'] = 'Homepage/register';
$route['verification/(:any)'] = 'Homepage/verification/$1';
$route['laporan-pbl/(:any)'] = 'Homepage/laporan/$1';

// vidio 
$route['dashboard-vidio'] = 'Vidio';
$route['add-vidio'] = 'Vidio/addVidio';
$route['comment'] = 'Vidio/sendComment';
$route['display-chat'] = 'Vidio/showComment/';
$route['grading'] = 'Vidio/grading';
$route['pbl-edit/(:any)'] = 'Vidio/edit/$1';
$route['project-base-learning/(:any)'] = 'Homepage/pbl/$1';
$route['vidios/(:any)'] = 'Homepage/vidios/$1';

//reviewer
$route['pbl-review/(:any)'] = 'Vidio/review/$1';
$route['profile-reviewer'] = 'Reviewer/profile';
$route['change-pass-reviewer'] = 'Reviewer/change_pass';

//admin
$route['profile-admin'] = 'Admin/profile';
$route['add-user'] = 'Admin/addUser';
$route['edit-user/(:any)'] = 'Admin/editPengguna/$1';
$route['change-pass-admin'] = 'Admin/change_pass';

$route['contact'] = 'contact';
$route['contact/send'] = 'contact/send';
$route['kontak'] = 'Homepage/kontak';