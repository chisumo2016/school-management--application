<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    protected  $table ='header_footers';

    protected  $fillable = [
        'owner_name',
        'owner_department',
        'mobile',
        'address',
        'copyright',
        'status',
    ];
}
