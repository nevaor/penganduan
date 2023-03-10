<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class Response extends Model
{
    use HasFactory;
    protected $fillable=[
        'report_id',
        'status',
        'pesan',
    ];

    //hasOne : one to one
    //table yg berperan sebagai pk
    //nama fungsi disamakan dengana nama model 
    public function report()
    {
        return $this->belongsTo
        (Report::class);
    }
}
