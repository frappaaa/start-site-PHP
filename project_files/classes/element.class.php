<?php

class Element extends DatabaseObject {

  static protected $table_name = 'element';
  static protected $db_columns = ['id']; // add all the elements that are in the table's columns in your database

  public $id; // crea una variabile per ogni cosa che ti serve
  public $value;
  public $nome;
  public $username;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX']; //crea costanti a cui riferirti con 

  

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->brand = $args['brand'] ?? '';

    // Caution: allows private/protected properties to be set
    // foreach($args as $k => $v) {
    //   if(property_exists($this, $k)) {
    //     $this->$k = $v;
    //   }
    // }
  }

  /*
  public function name() {
    return "{$this->brand} {$this->model} {$this->year}";
  }
  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_value($value) {
    $this->value = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }
   */

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->nome)) {
      $this->errors[] = "Il campo 'nome' non può essere vuoto.";
    }
    if(is_blank($this->username)) {
      $this->errors[] = "Il campo 'username' non può essere vuoto.";
    }
    return $this->errors;
  }


}

?>
