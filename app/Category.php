<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

//    public function routeNotificationForSlack($notification)
//    {
//        return 'https://hooks.slack.com/services/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';
//    }
}
