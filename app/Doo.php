<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doo extends Model
{
    public $guarded=[];
    public function scopeMorning($query,$id,$date)
    {
    	return $query->where("user_id",$id)->where("date",$date)->whereBetween("time",["00:00:00","12:00:00"]);
    }
    public function scopeAfternoon($query,$id,$date)
    {
    	return $query->where("user_id",$id)->where("date",$date)->whereBetween("time",["12:00:00","24:00:00"]);
    }
}
