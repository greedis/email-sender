<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentMail extends Model
{
    protected $fillable = [
        'uuid',
        'from',
        'to',
        'cc',
        'subject',
        'type',
        'body',
        'ip_address',
    ];
}
