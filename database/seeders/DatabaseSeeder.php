<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        User::create([
            'name' => 'Daniel Raul Rurubua',
            'username' => 'danielraulrurubua',
            'email' => 'danielraul4625@gmail.com',
            'password' => bcrypt('yusuftallulembang2310')        
        ]);

        // Customer::create([
        //     'first_name' => 'Bruce',
        //     'last_name' => 'Wayne',
        //     'email' => 'brucewayne4625@gmail.com',
        //     'phone' => '081384694130',
        //     'address' => 'Gotham'
        // ]);

         Category::create([
              'name' => 'Web Programming',
              'slug' => 'web-programming'       
          ]);

          Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'       
        ]);

          Category::create([
              'name' => 'Personal',
              'slug' => 'personal'       
          ]);

          Category::create([
            'name' => 'Sport',
            'slug' => 'sport'       
        ]);

          Post::factory(20)->create();

        //  Post::create([
        //      'title' => 'The Sorcerer Stone',
        //      'slug' => 'the-sorcerer-stone',
        //      'excerpt' => 'Harry Potter, an eleven-year-old orphan, discovers that he is a wizard and is invited to study at Hogwarts. Even as he escapes a dreary life and enters a world of magic, he finds trouble awaiting him.',
        //      'body' => 'Late one night, Albus Dumbledore and Minerva McGonagall, professors at Hogwarts School of Witchcraft and Wizardry, along with groundskeeper Rubeus Hagrid, deliver an orphaned infant named Harry Potter to his aunt and uncle, Petunia and Vernon Dursley, his only living relatives. Ten years later, just before Harrys eleventh birthday, owls begin delivering letters addressed to him. When the abusive Dursleys refuse to allow Harry to open any and flee to an island hut, Hagrid arrives to personally deliver Harrys letter of acceptance to Hogwarts. Hagrid also reveals that Harrys parents, James and Lily, were killed by a dark wizard named Lord Voldemort. The killing curse that Voldemort had cast rebounded, destroying Voldemorts body and giving Harry his lightning-bolt scar. Hagrid then takes Harry to Diagon Alley for school supplies and gives him a pet snow owl whom he names Hedwig. Harry buys a wand that is connected to Voldemorts own wand.',
        //      'category_id' => 1,
        //      'user_id' => 1

        //  ]);

        //  Post::create([
        //      'title' => 'The Chamber of Secrets',
        //      'slug' => 'the-chamber-of-secrets',
        //      'excerpt' => 'A house-elf warns Harry against returning to Hogwarts, but he decides to ignore it. When students and creatures at the school begin to get petrified, Harry finds himself surrounded in mystery.',
        //      'body' => 'Spending the summer with the Dursleys, Harry Potter meets Dobby, a house-elf who warns him that it is too dangerous to return to Hogwarts. Dobby sabotages an important dinner for the Dursleys, who lock up Harry to prevent his return to Hogwarts. Harrys friend Ron Weasley and his brothers Fred and George rescue him in their fathers flying Ford Anglia. Harry and the Weasley family are joined by Hermione Granger at a book-signing by Gilderoy Lockhart, Hogwarts new Defence Against the Dark Arts teacher. Confronted by Draco Malfoy, Harry notices Malfoys father, Lucius, slip a book into Ginny Weasleys cauldron. When Harry and Ron are blocked from entering Platform Nine and Three-Quarters at London Kings Cross railway station, they take the flying car to Hogwarts after crashing into the Whomping Willow breaking Rons wand, they receive detention.',
        //      'category_id' => 2,
        //      'user_id' => 1

        //  ]);

        // Post::create([
        //     'title' => 'The Prisoner of Azkaban',
        //     'slug' => 'the-prisoner-of-azkaban',
        //     'excerpt' => 'Harry, Ron and Hermoine return to Hogwarts just as they learn about Sirius Black and his plans to kill Harry. However, when Harry runs into him, he learns that the truth is far from reality.',
        //     'body' => 'Shortly after the end of his second year at Hogwarts, Harry Potter spends another dissatisfying summer with the Dursleys. On his thirteenth birthday, Vernons sister Marge arrives for a visit, during which she viciously insults Harry and his parents, angering Harry, who causes her to inflate and float away. Expecting to be expelled for using magic outside of Hogwarts, Harry flees the Dursleys with his belongings.',
        //     'category_id' => 3,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'The Goblet of Fire',
        //     'slug' => 'the-goblet-of-fire',
        //     'excerpt' => 'Harry, Ron and Hermoine return to Hogwarts just as they learn about Sirius Black and his plans to kill Harry. However, when Harry runs into him, he learns that the truth is far from reality.',
        //     'body' => 'Shortly after the end of his second year at Hogwarts, Harry Potter spends another dissatisfying summer with the Dursleys. On his thirteenth birthday, Vernons sister Marge arrives for a visit, during which she viciously insults Harry and his parents, angering Harry, who causes her to inflate and float away. Expecting to be expelled for using magic outside of Hogwarts, Harry flees the Dursleys with his belongings.',
        //     'category_id' => 4,
        //     'user_id' => 1

        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
