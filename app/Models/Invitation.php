<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';
    public $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'sendby',
        'project_id',
        'status',
        'token',
        'sendto'
    ];
}
