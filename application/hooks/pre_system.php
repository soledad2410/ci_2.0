<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

function set_controller()
{
    include_once APPPATH.'config/database.php'; //Gather the DB connection settings
    $link = mysql_connect($db[$active_group]['hostname'], $db[$active_group]['username'], $db[$active_group]['password']) or die('Could not connect to server.' ); //Connect to the DB server
    mysql_select_db($db[$active_group]['database'], $link) or die('Could not select database.'); //Select the DB
    $URI = explode('/',key($_GET)); //Break apart the URL variable
    $query = 'SELECT * FROM theDomainTable WHERE domainName = "'.$URI[1].'"'; //Query the DB with the URI segment
    if($results = mysql_fetch_array(mysql_query($query))){ //Only deal with controller requests that exist in the database
        $URI[1] = $results['controllerName']; //Replace the controller segment
        $_GET = array(implode('/',$URI)=>NULL); //Reconstruct and replace the GET variable
    }
    mysql_close($link); //Close the DB link
}
?>