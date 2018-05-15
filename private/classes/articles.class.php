<?php

class Articles extends DatabaseObject {

  static protected $table_name = "articles";
  static protected $db_columns = ['id', 'title', 'abstract', 'doi', 'pub_date'];

  public $id;
  public $title;
  public $abstract;
  public $doi;
  public $pub_date;


  public function __construct($args=[]) {
    $this->title = $args['title'] ?? '';
    $this->abstract = $args['abstract'] ?? '';
    $this->doi = $args['doi'] ?? '';
    $this->date_published = $args['pub_date'] ?? '';
  }
public function ministring($val){
$mini = substr($val, -(strlen($val)), 25);
return $mini."...";
}
public function euro_date($val){
$day = substr($val, -2);
$month = substr($val, -5, 2);
$year = substr($val, -(strlen($val)), 4);
return $day.".".$month.".".$year.".";
}
/*static public function find_all(){
      $sql = "SELECT * FROM " . self::$table_name . "ORDER by " . self::$date;
      return static::find_by_sql($sql);
  }
  */
  static public function find_by_username($username) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  protected function validate() {
     
  $this->errors = [];
  if(is_blank($this->title)) {
    $this->errors[] = "Title can't be empty";
  }  
}
}
 
 

