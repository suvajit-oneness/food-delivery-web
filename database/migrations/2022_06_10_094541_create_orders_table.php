<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderno', 100)->nullable()->default('');
            $table->foreignIdFor(\App\Models\Customer::class);
            $table->foreignIdFor(\App\Models\Restaurant::class);
            $table->foreignIdFor(\App\Models\CustomerAddress::class);
            $table->string('coupon_code', 100)->nullable()->default('')->comment('if coupon code applies');
            $table->decimal('coupon_code_amount', $precision = 8, $scale = 2);
            $table->date('schedule_dated');
            $table->time('schedule_time');
            $table->decimal('referral_amount', $precision = 8, $scale = 2)->nullable()->comment('');
            $table->decimal('extra_amount', $precision = 8, $scale = 2)->nullable()->comment('if aby extra amount adds');
            $table->decimal('delivery_amount', $precision = 8, $scale = 2)->nullable()->comment('delivery amount, deductable');
            $table->string('pay_via', 100)->nullable()->default('cod')->comment('cod or online');
            $table->tinyInteger('is_cancelled')->default(0)->comment('if order got cancelled');
            $table->text('cancel_reason')->nullable()->default('');
            $table->foreignIdFor(\App\Models\Agent::class)->comment('delivered by');
            $table->dateTime('delivered_at');
            $table->string('delivery_status', 100)->nullable()->default('open');
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
        Schema::dropIfExists('orders');
    }
}
