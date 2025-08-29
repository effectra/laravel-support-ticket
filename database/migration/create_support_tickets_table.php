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
            
            $table->enum('status', enumToArray(TicketStatusEnum::class));
            $table->enum('importance_level', enumToArray(TicketImportanceLevelEnum::class));
            $table->enum('topic', enumToArray(TicketTopicEnum::class));
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(config('support-ticket.tables.users'))->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on(config('support-ticket.tables.employees'))->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('support-ticket.tables.tickets'));
    }
};