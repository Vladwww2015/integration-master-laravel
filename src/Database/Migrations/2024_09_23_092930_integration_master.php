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
        if(!Schema::hasTable(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::TABLE)) {
            Schema::create(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::TABLE, function (Blueprint $table) {
                $table->increments('id');
                $table->string('entity_type')->nullable(false);
                $table->smallInteger('is_master')->nullable();
                $table->text('source_model_collection')->nullable(false);
                $table->string('external_source_identity')->nullable(false);
                $table->timestamps();
                $table->unique(['entity_type', 'external_source_identity'], 'im_et_esi');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::TABLE);
    }
};
