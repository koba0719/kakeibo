<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'category_id';

    /**
     * 紐づくuserを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * 紐づくCategoryを取得
     */
    public function category()
    {
        return $this->hasOne('App\BudgetCategory', 'category_id');
    }

    public function capital()
    {
        return $this->belongsTo('App\Capital');
    }
}
