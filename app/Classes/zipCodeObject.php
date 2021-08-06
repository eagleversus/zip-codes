<?php 
namespace App\Classes;

use JsonSerializable;

 class zipCodeObject  implements JsonSerializable{
    public $zip_code;
    public $locality;
    public $federal_entity;
   // Válido a partir de PHP 5.3.0:
  public $settlements;
  public $municipality;
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