<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pdf');
class user{
 public $host   = DB_HOST;
 public $user   = DB_USER;
 public $pass   = DB_PASS;
 public $dbname = DB_NAME;

 public $link;
 public $error;

 function __construct()
 {
    $this->link = new mysqli($this->host, $this->user, $this->pass,$this->dbname);
    if (!$this->link)
    {
        $this->error = "Connection fail.".$this->link->connect_error; 
    }
}
public function insert($data)
{
$insert_row = $this->link->query($data);
if ($insert_row)
{
   return $insert_row;
}
else
{
   return false;
}
}
    
public function select($data)
{
    $result = $this->link->query($data);
    if ($result->num_rows > 0)
    {
        return $result;
    } 
    else
    {
        return false;
    }
}
public function delete($data)
{
    $deleteimg = $this->link->query($data);
    if ($deleteimg)
    {
        return $deleteimg;
    } 
    else
    {
        return false;
    }
}
    
}
?>
