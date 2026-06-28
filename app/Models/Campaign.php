<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_donation',
        'collected_donation',
        'deadline',
        'attachment',
        'file_type',
    ];

    public function account()
    {
        return $this->hasOne(CampaignAccount::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'campaign_category');
    }
}