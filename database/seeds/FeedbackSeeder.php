<?php

use App\Http\Services\FileUploadService;
use App\Models\Feedback;
use App\Models\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

class FeedbackSeeder extends Seeder
{
    /**
     * @var Faker
     */
    private $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        factory(Feedback::class, 20)->create()->each(function(Feedback $feedback) {
            $count = random_int(0, 3);
            for ($i = 0; $i < $count; $i++) {
                $fileName = bin2hex(random_bytes(15)) . ".txt";
                $path = FileUploadService::FEEDBACK_STORAGE . "/" . $fileName;
                Storage::put($path, $this->faker->text);
                $file = new File();
                $file->path = $path;
                $file->feedback()->associate($feedback);
                $file->save();
            }
        });
    }
}
