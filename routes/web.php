<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admins', 'AdminController@g_index');
Route::get('/admins/', 'AdminController@g_index');
Route::get('/admins', 'AdminController@g_index');

//ticket

Route::get('/admin/ticket_category', 'TicketCategoryController@g_ticket_category');

Route::get('/admin/ticket_category/{id}', 'TicketCategoryController@g_ticket_category');

Route::post('/admin/add_ticket_category', 'TicketCategoryController@p_add_ticket_category');

Route::post('/admin/delete_ticket_category', 'TicketCategoryController@p_delete_ticket_category');

Route::get('/admin/tickets', 'TicketController@g_admin_ticket_category');

Route::get('/admin/tickets/{id}', 'TicketController@g_admin_ticket_category');

Route::get('/admin/tickets_single', 'TicketController@g_admin_ticket_single_category');

Route::get('/admin/tickets_single/{id}', 'TicketController@g_admin_ticket_single_category');

Route::post('/admin/add_issue  ', 'TicketController@p_admin_add_issue');

Route::post('/admin/close_ticket  ', 'TicketController@p_admin_close_ticket');

//inbox

Route::get('/admin/inbox', 'InboxController@g_a_inbox');

Route::get('/admin/inbox/{id}', 'InboxController@g_a_inbox');

Route::post('/admin/add_inbox', 'InboxController@p_a_add_inbox');

Route::post('/admin/delete_inbox', 'InboxController@p_a_delete_inbox');

Route::post('/admin/update_inbox', 'InboxController@p_a_update_inbox');

Route::get('/admin/add_inbox', 'InboxController@g_a_add_inbox');

Route::get('/admin/edit_inbox/{id}', 'InboxController@g_a_edit_inbox');

Route::get('/admin/edit_inbox', 'InboxController@g_a_edit_inbox');

//withdrawal

Route::get('/admin/withTable/{id}', 'TransactionController@g_with_table');

Route::get('/admin/withTable', 'TransactionController@g_with_table');

//users

Route::get('/admin/customers/{id}', 'CustomersController@g_users_virtual');

Route::get('/admin/customers', 'CustomersController@g_users_virtual');

Route::get('/admin/users_old/{id}', 'CustomersController@g_users_old');

Route::get('/admin/users_old', 'CustomersController@g_users_old');

Route::post('admin/p_add_unit', 'AdminController@p_add_Unit');

Route::post('admin/delete_unit', 'AdminController@g_deleteUnit');

Route::post('admin/update_unit', 'AdminController@g_updateUnit');

Route::get('/admin/units/{id}', 'AdminController@g_units');

Route::get('/admin/units', 'AdminController@g_units');

//Social link view

Route::get('/admin/social/{id}', 'SocialController@g_social');

Route::get('/admin/social', 'SocialController@g_social');

//change password

Route::get('admin/change_password', 'AdminController@g_change_password');

Route::post('admin/change_password', 'AdminController@p_change_password');

//Register page

Route::get('admin/register', 'AdminController@g_register');
Route::post('admin/register', 'AdminController@p_register');

//Login page

Route::get('admin/login', 'AdminController@g_login');
Route::post('admin/login', 'AdminController@p_login');

//regional office get page

Route::get('/admin/regional_office/{id}', 'BranchController@g_regional_office');

Route::get('/admin/regional_office', 'BranchController@g_regional_office');

Route::post('admin/delete_staff', 'AdminController@p_deletestaff');

Route::post('admin/update_staff', 'AdminController@p_updatestaff');

//manage admin get page

Route::get('/admin/madmin/{id}', 'AdminController@g_madmin');

Route::get('/admin/madmin', 'AdminController@g_madmin');

//hub 2 get page

Route::get('/admin/hub2_office/{id}', 'BranchController@g_hub2_office');

Route::get('/admin/hub2_office', 'BranchController@g_hub2_office');

//hub 1 get page

Route::get('/admin/hub1_office/{id}', 'BranchController@g_hub1_office');

Route::get('/admin/hub1_office', 'BranchController@g_hub1_office');

Route::get('/admin/howto/{id}', 'SocialController@g_how_to');

Route::get('/admin/howto', 'SocialController@g_how_to');

//head office page

Route::get('/admin/head_office/{id}', 'BranchController@g_head_office');

Route::get('/admin/head_office', 'BranchController@g_head_office');

//fundtable

Route::get('/admin/fundTable/{id}', 'TransactionController@g_fund_table');

Route::get('/admin/fundTable', 'TransactionController@g_fund_table');

//Faq

Route::get('/admin/FAQ/{id}', 'FaqController@g_a_faq');

Route::get('/admin/FAQ', 'FaqController@g_a_faq');

Route::get('/admin/edituser', function () {
    return view('admin/edituser');
});

//Edit social

Route::post('/admin/editsocial', 'SocialController@p_editsocial');

Route::get('/admin/editsocial', 'SocialController@g_editsocial');

//Edit madmin

Route::get('admin/editmadmin/{id}', 'AdminController@g_editmadmin');

Route::get('admin/editmadmin', 'AdminController@g_editmadmin');

//Edit how to

Route::post('admin/edithowto', 'SocialController@p_edit_how_to');

Route::get('admin/edithowto/{id}', 'SocialController@g_edit_how_to');

Route::get('admin/edithowto', 'SocialController@g_edit_how_to');

//Edit Faq

Route::post('/admin/editFAQ', "FaqController@p_editfaq");

Route::post('/admin/remove_faq', "FaqController@p_deletefaq");

Route::get('/admin/editFAQ/{id}', "FaqController@g_editfaq");

Route::get('/admin/editFAQ', "FaqController@g_editfaq");

//Edit Contact

Route::post('admin/delete_contact', 'ContactController@p_delete_contact');

Route::post('admin/update_contact', 'ContactController@p_update_contact');

Route::get('admin/editcontact/{id}', 'ContactController@g_editcontact');

Route::get('/admin/editcontact', 'ContactController@g_editcontact');

// blog view

Route::get('/admin/editblog', 'PostController@g_editblog');

Route::get('/admin/editblog/{id}', 'PostController@g_editblog');

//edit hub 2 office

Route::post('admin/delete_hub2office', 'BranchController@p_delete_hub2_office');

Route::post('admin/update_hub2office', 'BranchController@p_update_hub2_office');

Route::get('admin/edithub2office/{id}', 'BranchController@g_edithub2office');

Route::get('admin/edithub2office', 'BranchController@g_edithub2office');

//edit hub 1 office

Route::post('admin/delete_hub1office', 'BranchController@p_delete_hub1_office');

Route::post('admin/update_hub1office', 'BranchController@p_update_hub1_office');

Route::get('admin/edithub1office/{id}', 'BranchController@g_edithub1office');

Route::get('admin/edithub1office', 'BranchController@g_edithub1office');

//edit regional office

Route::post('admin/delete_regionaloffice', 'BranchController@p_delete_regional_office');

Route::post('admin/update_regionaloffice', 'BranchController@p_update_regional_office');

Route::get('admin/editregionaloffice/{id}', 'BranchController@g_editregionaloffice');

Route::get('admin/editregionaloffice', 'BranchController@g_editregionaloffice');

//edit head office

Route::post('admin/delete_headoffice', 'BranchController@p_delete_head_office');

Route::post('admin/update_headoffice', 'BranchController@p_update_head_office');

Route::get('admin/editheadoffice/{id}', 'BranchController@g_editheadoffice');

Route::get('admin/editheadoffice', 'BranchController@g_editheadoffice');

//edit Branch office

Route::post('admin/delete_branchoffice', 'BranchController@p_delete_branch_office');

Route::post('admin/update_branchoffice', 'BranchController@p_update_branch_office');

Route::get('admin/editbranchoffice/{id}', 'BranchController@g_editbranchoffice');

Route::get('admin/editbranchoffice', 'BranchController@g_editbranchoffice');

//edit area office

Route::post('admin/delete_areaoffice', 'BranchController@p_delete_area_office');

Route::post('admin/update_areaoffice', 'BranchController@p_update_area_office');

Route::get('admin/editareaoffice/{id}', 'BranchController@g_editareaoffice');

Route::get('admin/editareaoffice', 'BranchController@g_editareaoffice');

Route::get('/admin/customerdatabase', function () {
    return view('admin/customerdatabase');
});

//contact us page admin

Route::get('/admin/contact/{id}', 'ContactController@g_a_contact');

Route::get('/admin/contact', 'ContactController@g_a_contact');

//branch office

Route::get('/admin/branch_office/{id}', 'BranchController@g_branch_office');

Route::get('/admin/branch_office', 'BranchController@g_branch_office');

//blog admin

Route::post('admin/remove_blog', 'PostController@p_delete_blog');

Route::post('admin/update_blog', 'PostController@p_update_blog');

Route::post('admin/addblog', 'PostController@p_add_blog');

Route::get('admin/blog/{id}', 'PostController@g_blog');

Route::get('admin/blog', 'PostController@g_blog');

// assign staff

Route::post('admin/assign_staff', 'AdminController@p_assign_staff');

Route::get('/admin/assign_branch_and_unit/{id}', 'AdminController@g_assign_branch_and_unit');

Route::get('/admin/assign_branch_and_unit', 'AdminController@g_assign_branch_and_unit');

//area office view

Route::get('/admin/area_office/{id}', 'BranchController@g_area_office');

Route::get('/admin/area_office', 'BranchController@g_area_office');

//approve customers

Route::post('/admin/deny_account', 'CustomersController@p_deny_account');

Route::post('/admin/approve_account', 'CustomersController@p_approve_account');

Route::get('/admin/approvereg/{id}', 'CustomersController@g_approvereg');

Route::get('/admin/approvereg', 'CustomersController@g_approvereg');

// Approve Account details

Route::get('/admin/account_number/{id}', 'CustomersController@g_account_number');

Route::get('/admin/account_number', 'CustomersController@g_account_number');

Route::post('/admin/account_number', 'CustomersController@p_account_number');

Route::post('/admin/account_numbers', 'CustomersController@p_account_numbers');

// edit users

Route::post('/admin/delete_user', 'CustomersController@p_delete_user');

Route::post('/admin/editusers', 'CustomersController@p_editusers2_app');

Route::post('/admin/editusers2', 'CustomersController@p_editusers_app');

Route::get('/admin/editusers2/{id}', 'CustomersController@g_editusers_app');

Route::get('/admin/editusers2', 'CustomersController@g_editusers_app');

Route::get('/admin/editusers/{id}', 'CustomersController@g_editusers_virtual');

Route::get('/admin/editusers', 'CustomersController@g_editusers_virtual');

Route::get('/admin/editusers_old/{id}', 'CustomersController@g_editusers_old');

Route::get('/admin/editusers_old', 'CustomersController@g_editusers_old');

//admin role view

Route::get('admin/adminrole/{id}', 'AdminController@g_adminrole');

Route::get('admin/adminrole', 'AdminController@g_adminrole');

//add faq

Route::post('/admin/addFAQ', 'FaqController@p_addfaq');

Route::get('/admin/addFAQ', 'FaqController@g_addfaq');

//addblog

Route::get('admin/addblog', 'PostController@g_addblog');

//add admin role

Route::get('/admin/addadminrole', 'AdminController@g_addadminrole');


Route::post('admin/add_regionaloffice', 'BranchController@p_add_regional_office');

Route::get('/admin/add_regionaloffice', 'BranchController@g_add_regional_office');

//hub 2 add page

Route::post('admin/add_hub2office', 'BranchController@p_add_hub2_office');

Route::get('/admin/add_hub2office', 'BranchController@g_add_hub2_office');

//hub 1 add page

Route::post('admin/add_hub1office', 'BranchController@p_add_hub1_office');

Route::get('/admin/add_hub1office', 'BranchController@g_add_hub1_office');

//head office add page

Route::post('admin/add_headoffice', 'BranchController@p_add_headoffice');

Route::get('/admin/add_headoffice', 'BranchController@g_add_head_office');

//branch office add page

Route::post('admin/add_branchoffice', 'BranchController@p_add_branchoffice');

Route::get('/admin/add_branchoffice', 'BranchController@g_add_branch_office');

//area office add page

Route::post('admin/add_areaoffice', 'BranchController@p_add_areaoffice');

Route::get('/admin/add_areaoffice', 'BranchController@g_add_area_office');


Route::get('admin/index', 'AdminController@g_index');

Route::get('/admin/', 'AdminController@g_index');

Route::get('/admin', 'AdminController@g_index');

//ticket

Route::get('/betabet/ticket', 'TicketController@g_ticket');

Route::get('/betabet/ticket_single', 'TicketController@g_ticket_single');

Route::get('/betabet/ticket_single/{id}', 'TicketController@g_ticket_single');

Route::get('/betabet/ticket', 'TicketController@g_ticket');

Route::get('/betabet/ticket/{id}', 'TicketController@g_ticket');

Route::get('/betabet/ticket/{id}', 'TicketController@g_ticket');

Route::post('/betabet/create_ticket', 'TicketController@p_create_ticket');

Route::post('/betabet/fetch_ticket ', 'TicketController@p_fetch_ticket');

Route::post('/betabet/add_issue  ', 'TicketController@p_add_issue');

Route::post('/betabet/close_ticket  ', 'TicketController@p_close_ticket');

//withdraw bank us page

Route::post('/betabet/withdraw', 'TransactionController@p_withdraw');

Route::get('/betabet/withdraw', 'TransactionController@g_withdraw');

//with bank us page

Route::get('/betabet/with', 'TransactionController@g_with');

//register bank us page

Route::get('/betabet/register', 'CustomersController@g_register');

Route::post('/betabet/register', 'CustomersController@p_register');

Route::post('/betabet/register2', 'CustomersController@p_register2');

//logout bank us page

Route::get('/admin/logout', 'AdminController@p_logout');


//logout bank us page

Route::get('/betabet/logout', 'CustomersController@g_logout');

Route::post('/betabet/logout', 'CustomersController@p_logout');

Route::get('/betabet/login', 'CustomersController@g_login');

Route::post('/betabet/login', 'CustomersController@p_login');

//login bank us page

Route::get('/betabet/login', function () {
    return view('betabet/login');
});

//fund bank us page

Route::post('/betabet/fund', 'TransactionController@p_fund');

Route::get('/betabet/fund', 'TransactionController@g_fund');

//forget bank us page

Route::get('/betabet/forget', function () {
    return view('betabet/forget');
});

Route::get('/betabet/confirm', function () {
    return view('betabet/confirm');
});
//faq bank us page

Route::get('/betabet/faq', 'FaqController@g_faq');

//forgot password

Route::post('/betabet/forgot', 'CustomersController@p_forgot');

Route::post('/betabet/confirm', 'CustomersController@p_confirm');

//setting page

Route::get('/admin/options', 'OptionController@g_index');

Route::get('/admin/options/{id}', 'OptionController@g_index');

Route::post('/admin/edit_option', 'OptionController@p_edit_option');

Route::get('/admin/options2', 'Option2Controller@g_index');

Route::get('/admin/options2/{id}', 'Option2Controller@g_index');

Route::post('/admin/edit_option2', 'Option2Controller@p_edit_option');

//edit bank page

Route::post('/betabet/delete_bank_details', 'BanksController@p_delete_bank');

Route::get('/betabet/editbank/{id}', 'BanksController@g_editbank');

Route::get('/betabet/editbank', 'BanksController@g_editbank');

//add bank us page

Route::post('/betabet/addbank', 'BanksController@p_addbank');

Route::get('/betabet/addbank', 'BanksController@g_addbank');

//edit profile

Route::post('betabet/edit_profile', 'CustomersController@p_edit_profile');

//change password

Route::post('/betabet/change_password', 'CustomersController@p_change_password');

Route::get('/betabet/change_password', 'CustomersController@g_change_password');

//inbox

Route::post('/betabet/read_message', 'InboxController@p_read_message');

Route::get('/betabet/inbox', 'InboxController@g_inbox');

Route::get('/betabet/inbox', 'InboxController@g_inbox');

//betabet us page

Route::get('betabet/index/{id}', 'CustomersController@g_index');

Route::get('/betabet/{id}', 'CustomersController@g_index');

Route::get('betabet/index', 'CustomersController@g_index');

Route::get('/betabet', 'CustomersController@g_index');

//why us page

Route::get('/why', function () {
    return view('why');
});

//contact us page

Route::post('/contact', 'ContactController@p_contact');

Route::get('/contact', 'ContactController@contact');

//Branches page

Route::get('/branches', 'BranchController@branch');

//returns fund

Route::get('/services', function () {
    return view('services');
});

//returns news page

Route::get('/news', 'PostController@g_news');

Route::get('/news_single/{id}', 'PostController@g_news_single');



//return homepage

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

//Route::get('login', array('as' => 'login', function () {
//    return view('login');
//}));

//Route::post('login','UserController@login');

// Route::get('admin/admin', 'AdminController@index');

// Route::post('admin/create_admin','AdminController@create');

//});	
