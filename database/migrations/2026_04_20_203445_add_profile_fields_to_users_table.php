<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('unique_id')->nullable();
            $table->string('profile_pic')->nullable();
        });

        // Populate existing users with a unique ID
        $users = \Illuminate\Support\Facades\DB::table('users')->get();
        foreach ($users as $user) {
            \Illuminate\Support\Facades\DB::table('users')->where('id', $user->id)->update([
                'unique_id' => 'USR-' . strtoupper(\Illuminate\Support\Str::random(8))
            ]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unique('unique_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['unique_id', 'profile_pic']);
        });
    }
};
