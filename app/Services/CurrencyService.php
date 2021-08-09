<?php


namespace App\Services;


use App\Models\ExchangeRate;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CurrencyService
{
    public function updateCurrencies()
    {
        $currencies = ExchangeRate::query()->first();

        if ($currencies) {
            if (Carbon::make($currencies->updated_at)->subDay() > Carbon::now()) {
                $currencies = $this->parse($currencies->id);

                $this->updatePrices($currencies);
            }
        } else {
            $currencies = $this->parse();

            $this->updatePrices($currencies);
        }
    }

    private function parse($exchangeId = null)
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

        if ($exchangeId) {
            $currencies = ExchangeRate::query()->where('id', $exchangeId)->update(['rub' => $rub, 'uah' => $uah]);
        } else {
            $currencies = ExchangeRate::query()->create(['rub' => $rub, 'uah' => $uah]);
        }

        return $currencies;
    }

    private function updatePrices($currencies)
    {
        $rub = $currencies->rub;
        $uah = $currencies->uah;

        $products = Product::all();

        foreach ($products as $product) {
            $kz = $product['price_kz'];

            $product->update(['price_ru' => (int) round($kz / $rub), 'price_uah' => (int) round($kz / $uah)]);
        }
    }
}
