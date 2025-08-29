<?php

return [
    'tables' => [
        'tickets' => 'support_tickets',
        'ticket_responses' => 'support_ticket_responses',
        'users' => 'users',
        'employees' => 'employees',
    ],
    'models' => [
        'user' => \App\Models\User::class,
        'employee' => \App\Models\User::class,
        'ticket_response' => \Effectra\LaravelSupportTicket\Models\TicketResponse::class,
    ],
    'localization' => [
        'path' => __DIR__ . '/../localization/',
    ],
    'default' => [
        'status' => \Effectra\LaravelStatus\Enums\StatusEnum::PENDING,
        'importance_level' => \Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum::LOW,
        'topic' => \Effectra\LaravelSupportTicket\Enums\TicketTopicEnum::GENERAL_INQUIRY,
    ],
    'responder_type' => "\App\Models\User"
];