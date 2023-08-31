<?php 
/**
 * Bootstrap page
 * Require file autoload from vendor
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/dbConfig.php';

use Controllers\UserController;


define("BASE_URL", basename(__DIR__));

/**
 * Create an object of class UserController
 */
$controller = new UserController();


//specify how the page will be loaded
if(!isset($_GET['act']))
{
	//calling the method to be run
	$controller->index();
}
else
{
	switch($_GET['act'])
	{
		case 'save-user' :
			$controller->saveUser();
			break;

		case 'all-users' :
			$controller->allUsers();
			break;

		case 'delete-user' :
			$controller->deleteUser();
			break;

		default : 
			$controller->index();
			break;
	}
}
