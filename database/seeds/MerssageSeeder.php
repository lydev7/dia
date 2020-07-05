<?php

use App\Attribute;
use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = Attribute::all();

        $message = Message::create(['created_at' => \Carbon\Carbon::yesterday()]);
        $message1 = Message::create();
        foreach ($attributes as $attribute)
        {
            if ($attribute->attribute === 'Action'){ $value = "Sell";}else{$value= rand(0,10);}

            $message->signals()->create([
                'attribute_id' => $attribute->id,
                'value' => $value
            ]);
            $message1->signals()->create([
                'attribute_id' => $attribute->id,
                'value' => $value
            ]);
        }
    }
}