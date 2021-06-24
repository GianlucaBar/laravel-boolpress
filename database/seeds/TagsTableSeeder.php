<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\SUpport\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Vegano',
            'Piatto veloce',
            'Ricetta della nonna',
            'Alto apporto calorico',
            'Leggero',
            'Avanzato'
        ];

        foreach($tags as $tag){
            $new_tag = New Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($new_tag->name, '-');
            $new_tag->save();

        }
    }
}
