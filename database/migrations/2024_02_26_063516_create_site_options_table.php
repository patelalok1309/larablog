<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\NullType;

return new class extends Migration
{
    protected $copyright_text = " Copyright ©️ 2020 by larablog || All rights reserved ";
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('site_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_name')->default('');
            $table->string('option_value')->default('')->nullable();
            $table->timestamps();
        });

        DB::table('site_options')->insert([
            $this->buildOption('site_name', 'larablog'),
            $this->buildOption('site_logo', null),
            $this->buildOption('site_description', null),
            $this->buildOption('copyright_text', $this->copyright_text),
            $this->buildOption('site_phone', "9485632158"),
            $this->buildOption('site_email', "larablog@gmail.com"),
            $this->buildOption('site_social_links', null),
            $this->buildOption('site_ownwer_social_links', null),
            $this->buildOption('site_ownwer_bio', null),
            $this->buildOption('site_ownwer_avatar', null),
        ]);

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_options');
    }

    public function buildOption(string $option_name , $option_value){
        return [
            'option_name'   => $option_name,
            'option_value'  => $option_value,
        ];
    }
};
