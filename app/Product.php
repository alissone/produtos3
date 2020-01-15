<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    /**
//     * @param $notification
//     * @return string
//     */
//    public function routeNotificationForSlack($notification)
//    {
//        return 'https://hooks.slack.com/services/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';
//    }
//
//    public function routeNotificationForMail($notification)
//    {
//        return 'alisson@email.com';
//    }
}
