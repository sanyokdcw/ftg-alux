<?php

namespace App\Console\Commands;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class CurrencyParseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency-parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses currencies from index.minfin.com.ua and converts product prices in you db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();

        $response = $client->get('https://index.minfin.com.ua/exchange/nbk/');

        $html = $response->getBody()->getContents();
        $dom = new \DOMDocument();

        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_use_internal_errors(false);

        $tds = $dom->getElementsByTagName('td');

        $rub = 5.81;
        $uah = 15.78;

        foreach ($tds as $td) {
            if ($td->nodeValue === 'RUB') {
                if ($td->nextSibling->nodeValue == 1) {
                    $rub = (double) str_replace(',', '.', $td->nextSibling->nextSibling->nextSibling->nodeValue);
                }
            } elseif ($td->nodeValue === 'UAH') {
                if ($td->nextSibling->nodeValue == 1) {
                    $uah = (double) str_replace(',', '.', $td->nextSibling->nextSibling->nextSibling->nodeValue);
                }
            }
        }

        $products = Product::all();

        foreach ($products as $product) {
            $kz = $product['price_kz'];

            $product->update(['price_ru' => (int) round($kz / $rub), 'price_uah' => (int) round($kz / $uah)]);
        }

        return 0;
    }
}
