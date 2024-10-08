<?php

namespace App\Models;

use App\Models\Iot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IotAccount extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'iot_accounts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'iot_id',
        'panel_url',
        'panel_username',
        'panel_password',
        'db_url',
        'db_name',
        'db_username',
        'db_password',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(Iot::class);
    }
}
