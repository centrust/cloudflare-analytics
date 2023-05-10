<?php

namespace Centrust\CloudflareAnalytics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CloudflareAnalytic extends Model
{

    protected $guarded = [];

    protected $casts = [
        'geo_data'=>'array',
        'device_data'=>'array',
        'browser_data'=>'array',
        'os_data'=>'array',
    ];


    public function trackable(): MorphTo
    {
        return $this->MorhTo();
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model', \App\Models\User::class));
    }
}
