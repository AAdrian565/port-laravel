<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = "history";
    protected $fillable = ['title', 'type', 'date_start', 'date_end', 'info1', 'info2', 'info3', 'content'];

    protected $appends = ['date_start_conv', 'date_end_conv'];

    public function getDateStartConvAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('d F Y');
    }

    public function getDateEndConvAttribute()
    {
        if($this->attributes['date_end'])
        {
             return Carbon::parse($this->attributes['date_end'])->translatedFormat('d F Y');
        }
        else{
            return 'Present';
        }
    }
}
