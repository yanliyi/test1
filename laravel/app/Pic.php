<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model {
    protected $table="images";
    public $timestamps=true;
    protected function getDateFormat()
    {
        return time();
    }

    protected  function  asDateTime($value)
    {
        return $value;
    }
}