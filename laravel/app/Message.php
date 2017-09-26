<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $table="message";
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