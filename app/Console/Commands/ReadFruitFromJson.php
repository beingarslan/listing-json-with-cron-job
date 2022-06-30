<?php

namespace App\Console\Commands;

use App\Models\Fruit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ReadFruitFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:fruits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://dev.shepherd.appoly.io/fruit.json';

        // hit http request and get the response
        $response = Http::get($url);

        $fruits = $response->json();

        foreach ($fruits as $fruit) {
            foreach ($fruit as $value) {
                if (!Fruit::where('origin_label', $value['label'])->where('is_edited', true)
                    ->orWhere(function ($query) use ($value) {
                        $query->where('origin_label', $value['label'])
                            ->where('is_edited', false);
                    })->exists()) {
                    $fruit = new Fruit();
                    $fruit->label = $value['label'];
                    $fruit->origin_label = $value['label'];
                    $fruit->parent_id = null;
                    $fruit->is_edited = false;
                    $fruit->save();
                } else {
                    $fruit = Fruit::where('origin_label', $value['label'])->first();
                }
                if (count($value['children']) > 0) {
                    foreach ($value['children'] as $child) {
                        $this->getData($child, $fruit->id);
                    }
                }
            }
        }
    }

    public function getData($row, $parent_id)
    {
        if (!Fruit::where('origin_label', $row['label'])->where('is_edited', true)
            ->orWhere(function ($query) use ($row) {
                $query->where('origin_label', $row['label'])
                    ->where('is_edited', false);
            })->exists()) {
            $fruit = new Fruit();
            $fruit->origin_label = $row['label'];
            $fruit->label = $row['label'];
            $fruit->parent_id = $parent_id;
            $fruit->is_edited = false;
            $fruit->save();
        } else {
            $fruit = Fruit::where('origin_label', $row['label'])->first();
        }
        if (count($row['children']) > 0) {
            foreach ($row['children'] as $child) {
                $this->getData($child, $fruit->id);
            }
        }
    }
}
