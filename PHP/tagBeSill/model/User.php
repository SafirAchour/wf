<?php 

require_once __DIR__ .'/connection.php';

/**
 * Create a new user
 * 
 * THIS FUNCTION CREATES A NEW ENTRY IN THE DATABASE AND RETURN THE ID OF THE INSERTED ELEMENT.
 * 
 * @param string $nickname The new entry nickname
 * @param string $password The new entry password
 * 
 * @return int
 */

function createUser(string $nickname, string $password, int $roleId=1) : int {
    /**
     *  @var PDO $connection
     */
    global $connection;
    
    $query = 'INSERT INTO User(nickname, `password`, roleId) VALUE ("'.$nickname.'", "'.$password.'","'.$roleId.'")';
    //ROLEID GO CHECK --> UNDEFINED
    $result = $connection->exec($query);
    
    if (!$result) {
        throw new RuntimeException($connection->errorCode());
    }
    
    return $connection->lastInsertId();
}

function findOneUserByNickname(string $nickname) : ?array {
    global $connection;
    
    $query = 'SELECT * FROM User WHERE nickname = "'.$nickname.'"';
    $result = $connection->$query($query);
    
    if ($result === false) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    $result = $result->fetch();
    if ($result) {
        return $result;
    }
    return null; 
}
?>