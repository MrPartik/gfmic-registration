<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRegistrant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_registrant_id',
        'reference_no',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'agency',
        'job_position',
        'address',
        'prc_license_no',
        'prc_license_expiry_date',
        'have_paid',
        'payment_mode',
        'payment_branch',
        'payment_date',
        'payment_amount',
        'payment_file',
        'other_registrants',
        'total_amount_to_be_paid',
        'payment_online_transaction_id',
        'payment_online_amount',
        'payment_online_biller_name',
        'other_form_fields',
        'is_anonymous',
        'user_id',
        'event_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'event_form_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
        'is_anonymous' => 'boolean',
    ];

    /**
     * Allow timestamps
     * @var bool
     */
    public $timestamps = true;

    /**
     * User Created
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * User Created
     * @return HasOne
     */
    public function event()
    {
        return $this->hasOne(Event::class, 'event_id', 'event_id');
    }
}
