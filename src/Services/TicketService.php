<?php

declare(strict_types=1);

namespace Effectra\LaravelSupportTicket\Services;

use Effectra\LaravelModelOperations\Traits\UseCreate;
use Effectra\LaravelModelOperations\Traits\UseModelDefinition;
use Effectra\LaravelSupportTicket\Models\Ticket;
use Effectra\LaravelSupportTicket\Models\TicketResponse;

/**
 * class TicketService
 */
class TicketService
{

    public function __construct(protected Ticket $ticket)
    {
    }

    public static function defaultData(): array
    {
        return config('support-ticket.default');
    }

    /**
     * Get localization data.
     * @param mixed $lang
     * @return array|bool
     */
    public function localization($lang = "en"): array|bool
    {
        $path = sprintf('%s/%s.php', config('support-ticket.localization.path'), $lang);
        if (file_exists($path)) {
            return require $path;
        }
        return false;
    }

    public function addResponse(string $response, int|string $responderId)
    {
        $service = new class {
            use UseModelDefinition, UseCreate;

            public function __construct()
            {
                $this->model = TicketResponse::class;
            }

        };
        return $service->create([
            'response' => $response,
            'ticket_id' => $this->ticket->id,
            'responder_type' => config('support-ticket.models.employee'),
            'responder_id' => $responderId,
            'is_closed' => false,
        ]);
    }
}