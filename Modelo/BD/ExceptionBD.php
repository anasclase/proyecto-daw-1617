<?php
namespace Modelo\BD;

// user defined. corresponding MySQL errno for duplicate key entry
const MYSQL_DUPLICATE_KEY_ENTRY = 1062;

// user defined MySQL exceptions
class MySQLException extends \Exception {}
class MySQLDuplicateKeyException extends MySQLException {}
?>