<?php

namespace App\Models;

use App\Enums\PageNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'ip_address',
    ];

    protected $casts = [
        'page_name'=>PageNameEnum::class
    ];
}
