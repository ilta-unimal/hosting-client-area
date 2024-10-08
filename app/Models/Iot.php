<?php

namespace App\Models;

use App\Models\IotAccount;
use App\Models\IotPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iot extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'iots';
    protected $primaryKey = 'id';

    protected $fillable = [
        'domain',
        'expired_date',
        'status'
    ];

    public function iotAccount(): HasOne
    {
        return $this->hasOne(IotAccount::class);
    }

    public function IotPayment(): HasOne
    {
        return $this->hasOne(IotPayment::class);
    }
}
