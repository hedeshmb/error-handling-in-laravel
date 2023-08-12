<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('CREATE TRIGGER change_id BEFORE INSERT ON `logs` FOR EACH ROW
                    SET New.id = (SELECT MAX(id) FROM logs) + (SELECT FLOOR(1 + RAND() * (11-1)))
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER change_id');
    }
};
