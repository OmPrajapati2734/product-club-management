<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    use HasFactory;
    protected $table = 'clubs';
    public $timestamps = false;
    protected $fillable = ['group_id','business_name','club_number','club_name','club_state','club_description','club_slug','website_title','website_link','club_logo','club_banner'];
}
