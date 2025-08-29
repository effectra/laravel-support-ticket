<?php

namespace Effectra\LaravelSupportTicket\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * class TicketResponse
 * @package Effectra\LaravelSupportTicket\Models
 * @property int|string $id
 * @property int|string $ticket_id
 * @property string $response
 * @property string $responder_type
 * @property int|string $responder_id
 * 
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Effectra\LaravelSupportTicket\Models\Ticket $ticket
 * @property Model $responder
 */
class TicketResponse extends Model
{
    
    /** 
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ticket_id',
        'response',
        'responder_type',
        'responder_id',
        'is_closed'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_closed' => 'boolean',
    ];

    public function getTable()
    {
        return config('support-ticket.tables.ticket_responses');
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function (self $model) {

        });
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function responder()
    {
        return $this->morphTo(null, 'responder_type', 'responder_id');
    }

    public function scopeClosed($query)
    {
        return $query->where('is_closed', true);
    }

    public function scopeOpen($query)
    {
        return $query->where('is_closed', false);
    }
}