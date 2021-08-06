<?php 
namespace App\Classes;

use JsonSerializable;

 class settlement  implements JsonSerializable{
    public $key;
    public $name;
    public $zone_type;
    public $settlement_type;
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