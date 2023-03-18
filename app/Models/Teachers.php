<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    public $table="teachers";
    protected $fillable=['id','fullName','major','dateHired'];


}
