<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IotPayment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'iot_payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'iot_id',
        'payment_file',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(Iot::class);
    }
}
