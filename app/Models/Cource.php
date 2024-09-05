<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{

    protected $table = 'cources';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'syllabus', 'duration'];


    use HasFactory;

    public function duration(){
        return $this->duration."Months";
    }

}
