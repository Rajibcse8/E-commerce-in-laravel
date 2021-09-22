<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ban');
            $table->string('product_slug_en');
            $table->string('product_slug_ban');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tag_en');
            $table->string('product_tag_ban');
            $table->string('product_size_en')->nullable();
            $table->string('produnct_size_ban')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_ban')->nullable();
            $table->string('seeling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_ban');
            $table->string('logn_descp_en');
            $table->string('long_descp_ban');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('features')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
