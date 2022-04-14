<?php

use App\Models\Company;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('industry_id')->index();
            $table->string('name');
            $table->string('brand');
            $table->string('url')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->integer('employees')->nullable();
            $table->integer('establishment_at')->nullable();
            $table->string('status')->default(Company::STATUS_WAITING);
            $table->text('logo')->nullable();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreign('industry_id')
                ->on('industries')
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
        Schema::dropIfExists('companies');
    }
};
