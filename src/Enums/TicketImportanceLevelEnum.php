<?php

declare(strict_types=1);

namespace Effectra\LaravelSupportTicket\Enums;

enum TicketImportanceLevelEnum: int
{
    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;
    case CRITICAL = 4;
    case EMERGENCY = 5;
}