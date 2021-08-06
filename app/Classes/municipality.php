<?php 
namespace App\Classes;

use JsonSerializable;

 class municipality  implements JsonSerializable{
    public $key;
    public $name;
    
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