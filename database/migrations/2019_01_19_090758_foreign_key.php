<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('job_id')
                ->unsigned()->nullable()->default(NULL);
            Schema::disableForeignKeyConstraints();
            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');;
            Schema::enableForeignKeyConstraints();
        });



    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_job_id_foreign');
            $table->dropColumn('job_id');
        });
    }
}
