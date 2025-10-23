# Laravel Support Ticket

A simple and extensible **support ticket management system** for Laravel.  
Built for teams that need to manage customer tickets and responses directly inside their Laravel apps.

---

## 🚀 Features

- 🎫 Manage support tickets with customizable status, topic, and importance level.
- 💬 Allow users and employees to exchange responses.
- 🧩 Fully configurable: define your own models, enums, and table names.
- ⚙️ Includes ready-to-publish migrations and config file.
- 🌍 Supports multiple languages (English & Arabic out of the box).
- 🪶 Built with [Spatie Laravel Package Tools](https://github.com/spatie/laravel-package-tools) for clean integration.

---

## 📦 Installation

```bash
composer require effectra/laravel-support-ticket
````

> Requires **PHP ≥ 8.1** and **Laravel ≥ 10**.

---

## ⚙️ Configuration

Publish the config and migrations:

```bash
php artisan vendor:publish --tag="support-ticket-config"
php artisan vendor:publish --tag="support-ticket-migrations"
```

Or run the install command provided by Spatie’s package tools:

```bash
php artisan support-ticket:install
```

Then run your migrations:

```bash
php artisan migrate
```

---

## 🧰 Configuration Options

The published config file is located at:

```
config/support-ticket.php
```

### Example configuration

```php
return [
    'tables' => [
        'tickets' => 'support_tickets',
        'responses' => 'support_tickets_responses',
        'users' => 'users',
        'employees' => 'users',
    ],

    'models' => [
        'user' => \App\Models\User::class,
        'employee' => \App\Models\User::class,
        'ticket_response' => Effectra\LaravelSupportTicket\Models\TicketResponse::class,
    ],

    'default' => [
        'status' => \Effectra\LaravelSupportTicket\Enums\TicketStatusEnum::PENDING->value,
        'importance_level' => \Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum::LOW->value,
        'topic' => \Effectra\LaravelSupportTicket\Enums\TicketTopicEnum::GENERAL_INQUIRY->value,
    ],
];
```

---

## 🧱 Migrations

The package includes two migrations:

1. **support_tickets** – stores the main ticket data.
2. **support_tickets_responses** – stores replies from users/employees.

You can modify these before running `php artisan migrate`.

---

## 🧩 Enums

Enums are used for strong typing and cleaner logic:

| Enum                        | Values                                                   |
| --------------------------- | -------------------------------------------------------- |
| `TicketStatusEnum`          | `PENDING`, `OPEN`, `CLOSED`, `RESOLVED`                  |
| `TicketTopicEnum`           | `GENERAL_INQUIRY`, `TECHNICAL_ISSUE`, `BILLING`, `OTHER` |
| `TicketImportanceLevelEnum` | `LOW`, `MEDIUM`, `HIGH`, `CRITICAL`                      |

Example usage:

```php
use Effectra\LaravelSupportTicket\Enums\TicketStatusEnum;

$ticket->status = TicketStatusEnum::OPEN->value;
```

---

## 🧠 Basic Usage Example

### Creating a Ticket

```php
use Effectra\LaravelSupportTicket\Models\Ticket;
use Effectra\LaravelSupportTicket\Enums\TicketStatusEnum;

$ticket = Ticket::create([
    'title' => 'Unable to access account',
    'body' => 'I am getting a 403 error when logging in.',
    'status' => TicketStatusEnum::PENDING->value,
    'user_id' => auth()->id(),
]);
```

### Adding a Response

```php
use Effectra\LaravelSupportTicket\Models\TicketResponse;

TicketResponse::create([
    'ticket_id' => $ticket->id,
    'message' => 'We are checking your issue.',
    'responder_id' => auth()->id(),
    'responder_type' => \App\Models\User::class,
]);
```

### Getting Ticket Responses

```php
$responses = $ticket->responses; // Collection of TicketResponse models
```

---

## 🌐 Localization

Translations are stored in:

```
localization/en/
localization/ar/
```

You can publish and customize them:

```bash
php artisan vendor:publish --tag="support-ticket-translations"
```

---

## 🧩 Service Provider

The package automatically registers itself via Laravel’s package discovery.
However, if you need to register manually, add to your `config/app.php`:

```php
'providers' => [
    Effectra\LaravelSupportTicket\Providers\LaravelSupportTicketServiceProvider::class,
],
```

---

## 🧪 Testing

To run the tests:

```bash
composer test
```

(You’ll need to create factories and test cases in your consuming app.)

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 👨‍💻 Author

**Mohammed Taha (BMT)**
Senior Full-Stack Developer – PHP / Laravel / React / TypeScript / NextJs
📧 [info@mohammedtaha.me](mailto:info@mohammedtaha.me)
🌍 [github.com/BMTmohammedtaha](https://github.com/BMTmohammedtaha)

---

## ⭐ Contributing

Contributions, issues, and feature requests are welcome!
Feel free to open a pull request or submit an issue on GitHub.

---

## 🏁 Quick Recap

```bash
composer require effectra/laravel-support-ticket
php artisan support-ticket:install
php artisan migrate
```

Then start managing your support tickets 🚀