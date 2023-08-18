<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client;

class Passport extends Client
{
    public function skipAuthorization(){
        return false;
    }
}
