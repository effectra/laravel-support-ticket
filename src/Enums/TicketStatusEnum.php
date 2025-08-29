<?php

namespace Effectra\LaravelSupportTicket\Enums;

enum TicketStatusEnum: int
{
    case PENDING = 1;
    case OPEN = 2;
    case PROCESSED = 3;
    case CLOSED = 4;
    case ARCHIVED = 5;
}