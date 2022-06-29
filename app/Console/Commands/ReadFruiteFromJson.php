<?php

namespace App\Console\Commands;

use App\Models\Fruite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ReadFruiteFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:fruites';

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

        $fruites = $response->json();

        foreach ($fruites as $fruite) {
            foreach ($fruite as $value) {
                if (!Fruite::where('origin_label', $value['label'])->where('is_edited', true)
                    ->orWhere(function ($query) use ($value) {
                        $query->where('origin_label', $value['label'])
                            ->where('is_edited', false);
                    })->exists()) {
                    $fruite = new Fruite();
                    $fruite->label = $value['label'];
                    $fruite->origin_label = $value['label'];
                    $fruite->parent_id = null;
                    $fruite->is_edited = false;
                    $fruite->save();
                } else {
                    $fruite = Fruite::where('origin_label', $value['label'])->first();
                }
                if (count($value['children']) > 0) {
                    foreach ($value['children'] as $child) {
                        $this->getData($child, $fruite->id);
                    }
                }
            }
        }
    }

    public function getData($row, $parent_id)
    {
        if (!Fruite::where('origin_label', $row['label'])->where('is_edited', true)
            ->orWhere(function ($query) use ($row) {
                $query->where('origin_label', $row['label'])
                    ->where('is_edited', false);
            })->exists()) {
            $fruite = new Fruite();
            $fruite->origin_label = $row['label'];
            $fruite->label = $row['label'];
            $fruite->parent_id = $parent_id;
            $fruite->is_edited = false;
            $fruite->save();
        } else {
            $fruite = Fruite::where('origin_label', $row['label'])->first();
        }
        if (count($row['children']) > 0) {
            foreach ($row['children'] as $child) {
                $this->getData($child, $fruite->id);
            }
        }
    }
}
