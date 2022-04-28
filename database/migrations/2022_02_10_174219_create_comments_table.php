<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('company_id')->index();
            $table->unsignedBigInteger('job_id')->index();
            $table->string('display_name');
            $table->text('comment');
            $table->string('status');
            $table->string('type');
            $table->boolean('hire');
            $table->bigInteger('requested_wage');
            $table->bigInteger('received_wage');
            $table->text('reason')->nullable();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreign('company_id')
                ->on('companies')
                ->references('id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('job_id')
                ->on('jobs')
                ->references('id')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
