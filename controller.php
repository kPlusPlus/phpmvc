<?php
class Users extends DB {
  
  function get(){
    return $this->select("SELECT * FROM `users`");
  }

  function getSQL($sql)
  {
    return $this->select($sql); 
  }
  
}
?>