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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('uniqid', 20)->unique();
            $table->timestamps();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->integer('price')->default(0);
            $table->boolean('usable')->default(true);
            $table->boolean('is_visible')->default(false);
            $table->string('image')->nullable();
            $table->softDeletes();

            $table->foreignIdFor(\App\Models\User::class, 'created_by')->nullable()->constrained()->cascadeOnDelete();

            $table->foreignIdFor(\App\Models\Modules\Npc::class)->nullable();
        });

        Schema::create('consumable_shop', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Modules\Consumable::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Modules\Shop::class)->constrained()->cascadeOnDelete();
            $table->primary(['consumable_id', 'shop_id']);
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('comment')->nullable();
            $table->softDeletes();
        });

        Schema::create('item_shop', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Modules\Item::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Modules\Shop::class)->constrained()->cascadeOnDelete();
            $table->primary(['item_id', 'shop_id']);
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('comment')->nullable();
            $table->softDeletes();
        });

        Schema::create('resource_shop', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Modules\Resource::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Modules\Shop::class)->constrained()->cascadeOnDelete();
            $table->primary(['resource_id', 'shop_id']);
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('comment')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Modules\Npc::class);
        });
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\User::class, 'created_by');
        });
        Schema::dropIfExists('consumable_shop');
        Schema::dropIfExists('item_shop');
        Schema::dropIfExists('resource_shop');
    }
};
