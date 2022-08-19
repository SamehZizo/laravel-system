<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaravelSystemCreateErrorLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('source_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('code', 191)->nullable()->collation('utf8_bin');
            $table->string('file', 191)->nullable()->collation('utf8_bin');
            $table->string('line', 191)->nullable()->collation('utf8_bin');
            $table->text('message')->nullable()->collation('utf8_bin');
            $table->text('trace')->nullable()->collation('utf8_bin');
            $table->text('body')->nullable()->collation('utf8_bin');
            $table->string('url', 191)->nullable()->collation('utf8_bin');
            $table->string('agent', 191)->nullable()->collation('utf8_bin');
            $table->string('root', 191)->nullable()->collation('utf8_bin');
            $table->text('header')->nullable()->collation('utf8_bin');
            $table->boolean('is_json');
            $table->boolean('is_ajax');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error_logs');
    }

}
