<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    //
    protected $table = 'supplier';


    public function getallsupplier()
    {
        return $this->all();
    }
}
