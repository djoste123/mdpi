<?php

class Type {

public $title;
public $abstract;
public $doi;
public $date_published;


  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->title = $args['title'] ?? '';
    $this->abstract = $args['abstract'] ?? '';
    $this->doi = $args['doi'] ?? '';
    $this->date_published = $args['date_published'] ?? '';
      
  }
}

?>
