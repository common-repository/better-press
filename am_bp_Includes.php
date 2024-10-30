<?php

/*
 * All necessary includes are listed here
 */
 
 /*
  * Abstract Classes
  */
  set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Abstract');
 include "am_bp_OneInstanceObject.class.php";
include "am_bp_InfoObject.class.php";
include "am_bp_ListObject.class.php";
   

/*
 * Widget
 */

 set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Widget');
include "am_bp_Widget.class.php";



/*
 *  Controllers
 */
 
 set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Controller');
include "am_bp_ProjectController.class.php";
include "am_bp_PluginFunctions.class.php";


/*
 *  Model
 */ 

 
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Model');
include "am_bp_Need.class.php";
include "am_bp_NeedList.class.php";
include "am_bp_Project.class.php";
include "am_bp_ProjectList.class.php";
include "am_bp_DashboardProjectMenu.class.php";


/*
 * Config
 */

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Config');
include "am_bp_ConfigFunctions.php";

/*
 * Debug
 */
 
 include 'am_bp_Debug.php';
