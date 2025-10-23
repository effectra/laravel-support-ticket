<?php

use Effectra\LaravelSupportTicket\Enums\TicketImportanceLevelEnum;
use Effectra\LaravelSupportTicket\Enums\TicketStatusEnum;
use Effectra\LaravelSupportTicket\Enums\TicketTopicEnum;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create(config('support-ticket.tables.tickets'), function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');

            $table->enum('status', enumToArray(TicketStatusEnum::class))->default(config('support-ticket.default.status'));
            $table->enum('importance_level', enumToArray(TicketImportanceLevelEnum::class))->default(config('support-ticket.default.importance_level'));
            $table->enum('topic', enumToArray(TicketTopicEnum::class))->default(config('support-ticket.default.topic'));

            $table->foreignId('user_id')->nullable()->constrained(config('support-ticket.tables.users', 'users'))->nullOnDelete();
            $table->foreignId('employee_id')->nullable()->constrained(config('support-ticket.tables.employees', 'employees'))->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['status', 'importance_level', 'topic']);
            $table->index(['user_id']);
        });
    }

    public function down(): void
    {
       Schema::dropIfExists(config('support-ticket.tables.tickets', 'support_tickets'));
    }
};