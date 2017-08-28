<?php 
class user
{ 
 private static $count = 0 ; //记录所有用户的登录情况.
 private $time = 0; 
 public function __construct() { 
  self::$count = self::$count + 1; 
  $this->time += 1; 
 } 
 public function getcount() { 
  return self::$count; 
 } 
 public function gettime() { 
  return $this->time; 
 } 
 public function __destruct() { 
  self::$count = self::$count - 1; 
  $this->time -= 1; 
 } 
} 
$user1 = new user(); 
$user2 = new user(); 
$user3 = new user(); 
echo "now here have " . $user3->getcount() . " user"; 
echo "<br />"; 
echo "now here have " . $user1->gettime() . " rrrrrrrrrr"; 
echo "<br />"; 
unset($user3); 
echo "now here have " . $user1->getcount() . " user"; 
echo "<br />"; 
echo "now here have " . $user1->gettime() . " rrrrrrrrrrrrrrr"; 
echo "<br />"; 
?>