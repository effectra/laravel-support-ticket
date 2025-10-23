<?php

declare(strict_types=1);

namespace Effectra\LaravelSupportTicket\Models;

use Effectra\LaravelSupportTicket\Enums\TicketStatusEnum;
use Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum;
use Effectra\LaravelSupportTicket\Enums\TicketTopicEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * class Ticket
 * @package Effectra\LaravelSupportTicket\Models
 * @property int|string $id
 * @property string $title
 * @property string $body
 * @property \Effectra\LaravelSupportTicket\Enums\TicketStatusEnum $status
 * @property \Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum $importance_level
 * @property \Effectra\LaravelSupportTicket\Enums\TicketTopicEnum $topic
 * @property int|string $user_id
 * @property int|string|null $employee_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 */
class Ticket extends Model
{

    /** 
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'status',
        'importance_level',
        'topic',
        'user_id',
        'employee_id'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_closed' => 'boolean',
        'status' => TicketStatusEnum::class,
        'importance_level' => TicketImportanceLevelEnum::class,
        'topic' => TicketTopicEnum::class,
    ];

    public function getTable()
    {
        return config('support-ticket.tables.tickets');
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function (self $model) {

        });
    }

    public function responses()
    {
        return $this->hasMany(TicketResponse::class, 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(config('support-ticket.models.user'), 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(config('support-ticket.models.employee'), 'employee_id');
    }

}