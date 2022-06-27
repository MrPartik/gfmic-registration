<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventForm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_form_id',
        'form_description',
        'form_reply_template',
        'allow_prc_info',
        'require_prc_info',
        'allow_to_follow_payment',
        'allow_multiple_registrants',
        'require_personal_info',
        'require_backtrack_info',
        'allow_online_payment',
        'other_form_fields',
        'is_active',
        'added_by',
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
        'created_at'                 => 'datetime',
        'updated_at'                 => 'datetime',
        'is_active'                  => 'boolean',
        'allow_prc_info'             => 'boolean',
        'require_prc_info'           => 'boolean',
        'allow_to_follow_payment'    => 'boolean',
        'allow_multiple_registrants' => 'boolean',
        'require_personal_info'      => 'boolean',
        'require_backtrack_info'     => 'boolean',
        'allow_online_payment'       => 'boolean',
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
        return $this->hasOne(User::class, 'id', 'added_by');
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
