<?php

declare(strict_types=1);

namespace Effectra\LaravelSupportTicket\Enums;

enum TicketTopicEnum: int
{
    case GENERAL_INQUIRY = 1;
    case NETWORK_ERROR = 2;
    case USER_FAULT = 3;
    case EMPLOYEE_FAULT = 4;
    case LOGIN_ISSUE = 5;
    case DATA_INTEGRITY = 6;
    case PERFORMANCE_ISSUE = 7;
    case MODULE_REQUEST = 8;
    case BILLING_ISSUE = 9;
    case PERMISSIONS_ISSUE = 10;
    case BUG_REPORT = 11;
    case FEATURE_REQUEST = 12;
    case INTEGRATION_ISSUE = 13;
    case UI_UX_PROBLEM = 14;
    case SECURITY_CONCERN = 15;
    case DATABASE_ERROR = 16;
    case REPORTING_ISSUE = 17;
    case NOTIFICATION_PROBLEM = 18;
    case API_PROBLEM = 19;
    case CUSTOMIZATION_REQUEST = 20;
    case OTHER = 99;
}
