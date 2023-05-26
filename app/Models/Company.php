<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function logoUrl()
    {
        return $this->logo
            ? Storage::disk('images')->url($this->logo)
            : asset('img/dts/dummy_logo.jpg');
    }

    public function bgUrl()
    {
        return $this->bg_image
            ? Storage::disk('images')->url($this->bg_image)
            : asset('img/dts/bg.jpg');
    }
}
