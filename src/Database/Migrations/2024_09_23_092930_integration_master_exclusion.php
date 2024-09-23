<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion::TABLE)) {
            Schema::create(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion::TABLE, function (Blueprint $table) {
                $table->increments('id');
                $table->integer('master_id')->unsigned();
                $table->string('entity_identity', 255)->nullable(false);

                $table->foreign('master_id')
                    ->references('id')
                    ->on(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::TABLE)
                    ->onDelete('cascade');

                $table->timestamps();
                $table->unique(['master_id', 'entity_identity'], 'ime_mid_eid');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion::TABLE);
    }
};
