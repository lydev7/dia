<?php

use App\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = ['Action', 'TP1'];

        foreach ($attributes as $attribute) {
            Attribute::create([
                'attribute' => $attribute
            ]);
        }

    }
}
