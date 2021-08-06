<?php 
namespace App\Classes;

use JsonSerializable;

 class federal_entity  implements JsonSerializable{
    public $key;
    public $name;
    public $code;
   // Válido a partir de PHP 5.3.0:
  
    public function __construct() {
        //return "construct function was initialized.";
    }
    public function create() {
        // create notification
        // send email
        // return output
    }
    public function jsonSerialize() {
        return $this;
    }
}