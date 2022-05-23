<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section();
        $section->title = 'Манастир';
        $section->description = 'manastir';
        $section->slug = 'manastir';

        $section->save();

        $section = new Section();
        $section->title = 'Новости';
        $section->description = 'novosti';
        $section->slug = 'novosti';

        $section->save();

        $section = new Section();
        $section->title = 'Поучни Слова';
        $section->description = 'poucni slova';
        $section->slug = 'poucni slova';

        $section->save();

        $section = new Section();
        $section->title = 'Медија';
        $section->description = 'medija';
        $section->slug = 'medija';

        $section->save();

        $section = new Section();
        $section->title = 'Наши Производи';
        $section->description = 'nasiProizvodi';
        $section->slug = 'nasiProizvodi';

        $section->save();

        $section = new Section();
        $section->title = 'Контакт';
        $section->description = 'kontakt';
        $section->slug = 'kontakt';

        $section->save();

    }
}
