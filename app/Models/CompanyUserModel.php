<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUserModel extends Model
{
    use HasFactory;

    protected $table = 'Companies';
    protected $prrimaryKey = 'CompanyUserId'; 

    public function company(){
        return $this->belongsTo(
            CompanyModel::class, 'CompanyId',
        );
    }

    public function user(){
        return $this->hasOne(
            User::class, 'id', 'UserId'
        );
    }

    protected $cast = [
        'CompanyUserId' => 'integer', 
        'CompanyId' => 'integer', 
        'UserId' => 'integer', 
    ];
}
