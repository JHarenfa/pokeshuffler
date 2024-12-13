<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('categories', 'category_id');
            $table->foreignId('rarity_id')->nullable()->constrained('rarities', 'rarity_id');
            $table->foreignId('type_id')->nullable()->constrained('types', 'type_id');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('image_url', 255)->nullable();
            $table->boolean('is_popular')->default(false);
            $table->timestamp('date_added')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
