<?php 

$config = include __DIR__ .'/../config/config.php';
require_once __DIR__ .'/../model/User.php';

Logout();
session_write_close();

//send specific header to the client 
header('Location: /');
// header = is composed of header key (Location:) + header value (/), with each header we have a constraint, eah header must be sent to the client before an output
// DO never pu tspace after <?php tag, j PHP file is not made for output ! SO YOU NEVER CLOSE </ php tag!!!!!!
