<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;
use App\Models\User;
use App\Enums\TaskEnums;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Task::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(Task::ID)->primary()->comment("Primary Key");
            $table->uuid(Task::USER_ID)->comment("Foreign key (Users)");
            $table->string(Task::TITLE)->comment("Task title");
            $table->text(Task::DESCRIPTION)->comment("Task Details");
            $table->dateTime(Task::DUE_DATE)->comment("Task Deadline");
            $table->enum(Task::PRIORITY, TaskEnums::get())->comment("Task Priority Level");
            $table->boolean(Task::STATUS)->default(false)->comment("Completed (true/false)");
            $table->timestamps();


            $table->foreign(Task::USER_ID)
                ->references(User::ID)
                ->on(User::TABLE_NAME)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
