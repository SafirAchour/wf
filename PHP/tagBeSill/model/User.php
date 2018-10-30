<?php

require_once __DIR__ . '/connection.php';

/**
 * Create a new user
 * 
 * This function create a new entry in the database and return the id
 * of the inserted element.
 * 
 * @param string $nickname The new entry nickname
 * @param string $password The new entry password

 * @return int
 */
function createUser(string $nickname, string $password, int $roleId = 1) : int {
    global $connection;

    $query = 'INSERT INTO User(nickname, `password`, roleId) VALUE ("'.$nickname.'", "'.$password.'", '.$roleId.')';
    $result = $connection->exec($query);

    if (!$result) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }

    return $connection->lastInsertId();
}


function findOneUserByNickname(string $nickname) : ?array {
    global $connection;
    
    $query = sprintf(
        'SELECT * FROM User WHERE nickname = "%s"',
        $nickname
    );
    
    $result = $connection->query($query);

    if ($result === false) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    $result = $result->fetch();
    if ($result) {
        return $result;
    }
    return null;
}


/**
 * Log the user with session
 * 
 * Will store the user information in the session superglobal. Return true on success, false on failure.
 * 
 * @param array $user The user to log
 * @return bool
 */
function LogInUser(array $user) : bool {
    $_SESSION['USER'] = $user;
    
    return true;
}


/**
 * Get current user
 * 
 *Return the current logged user if exist in the session. If not, return null.
 *
 * @return array|null
 */
function getCurrentUser() : ?array {
    return $_SESSION['USER'] ?? null;
}


/**
 * Logout
 * 
 * Remove the session storage. Return true on success, false on failure.
 * 
 * @return bool
 */
function Logout() : bool {
    $_SESSION = [];
    session_destroy();
    
    return true;
}








