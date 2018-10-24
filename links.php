<?php

//make_menu_link(link, childs=[], login=false, admin=false)

define("LINK_ALL", 0);
define("LINK_LOGIN_ONLY", 1);
define("LINK_ADMIN_ONLY", 2);


$links = array(
    "Home"=>make_menu_link('/home'),
    "Dashboard"=>make_menu_link('/dashboard',[], LINK_LOGIN_ONLY),
    "Fahad"=>make_menu_link('#abc', array(
        "Category"=>make_menu_link('/category'),
        "Profile"=>make_menu_link('/profile', [], LINK_ADMIN_ONLY)
    ))
);