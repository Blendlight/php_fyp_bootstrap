<?php
/*
settings file for site
code in { ... } block will not affect anything
only used for seprating code
*/

/*site CONSTANTS*/
{
    //define constant BASE_DIR to currentWorkingDirectroy
    define("BASE_DIR", getcwd());

    // define constant BASE_URL for root address of site like
    // https://site.com, http://localhost/finder
    //use this constant when including css js or creating links in site
    define("BASE_URL", "http://localhost/finder");
}

/*basic site config*/
{
    //start session
    session_start();

    //output buffer start
    //for header(location) problems
    ob_start();

    include BASE_DIR.'/includes/functions.php';
}

/*PAGE REWRITE LOGIC COMES HERE*/
{
    //currently ingoring rewrite rules logic
}

/*database*/
{
    //define database variables
    //$DB_HOST, $DB_USER, $DB_PASS, $DB_NAME
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "finder";
    include BASE_DIR.'/includes/conx.php';
}

/* user logic here */
{
    $is_admin = false;
    $is_login = false;


}

/*page links*/
{
    include 'links.php';
}

/*page url logic*/
{
    //set p to home.php by default
    $page = "home";
    //if we have p(page) in url use that
    $page = isset($_GET['page'])?$_GET['page']:$page;
    //set page variable
    $page_include = 'pages/'.$page.'.php';
    //check if page doesn't exists 
    //set page to 404
    if(!is_file($page_include))
    {
        $page_include = 'pages/404.php';
    }elseif(!user_have_page_access($page))//check page is only for admin or for login user
    {
        $page_include = 'pages/access_denied.php';
    }
    
    
}

/*Page setting here*/
{
    //default title of page
    //change at top of template
    $title = "Item finder";
}


