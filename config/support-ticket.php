<?php


return [
    'tables' => [
        'tickets' => 'support_tickets',
        'ticket_responses' => 'support_ticket_responses',
        'users' => 'users',
        'employees' => 'employees',
    ],
    'models' => [
        'models' => [
            'user' => \App\Models\User::class,
            'employee' => \App\Models\User::class,
            'ticket_response' => Effectra\LaravelSupportTicket\Models\TicketResponse::class,
        ],

    ],
    'localization' => [
        'path' => __DIR__ . '/resources/lang/',
    ],
    'default' => [
        'status' => \Effectra\LaravelSupportTicket\Enums\TicketStatusEnum::PENDING->value,
        'importance_level' => \Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum::LOW->value,
        'topic' => \Effectra\LaravelSupportTicket\Enums\TicketTopicEnum::GENERAL_INQUIRY->value,
    ],
    'responder_type' => "\App\Models\User"
];