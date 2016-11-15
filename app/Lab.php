<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'location_id',
        'cpu_name',
        'cpu_assetno',
        'ip',
        'mac',
        'u_name',
        'u_email',
        'pc_type',
        'processor',
        'motherboard',
        'ram',
        'hdd',
        'monitor',
        'monitor_assetno',
        'vendor_name',
        'delivery_date',
        'printer',
        'printer_assetno',
        'scanner',
        'scanner_assetno',
        'ups',
        'ups_assetno',
        'department',
        'comment'
    ];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function location(){
        
        return $this->belongsTo('App\Location');
        
    }
}
