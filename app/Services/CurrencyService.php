<?php


namespace App\Services;


use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Log;

class CurrencyService
{
    public function updateCurrencies()
    {
        $currencies = ExchangeRate::query()->first();

        if ($currencies) {
            if (Carbon::now()->subHours(12) > Carbon::parse($currencies->updated_at)) {
                $currencies = $this->parse($currencies->id);

                $this->updatePrices($currencies);
            }
        } else {
            $currencies = $this->parse();

            $this->updatePrices($currencies);
        }

        return $currencies;
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
        $usd = 427.41;

        foreach ($tds as $td) {
            if ($td->nodeValue === 'RUB') {
                if ($td->nextSibling->nodeValue == 1) {
                    $rub = (double) str_replace(',', '.', $td->nextSibling->nextSibling->nextSibling->nodeValue);
                }
            } elseif ($td->nodeValue === 'USD') {
                if ($td->nextSibling->nodeValue == 1) {
                    $usd = (double) str_replace(',', '.', $td->nextSibling->nextSibling->nextSibling->nodeValue);
                }
            }
        }

        $currencies = ExchangeRate::query()
            ->where('id', $exchangeId)
            ->updateOrCreate(compact('rub', 'usd'));

        return $currencies;
    }

    private function updatePrices($currencies)
    {
        $rub = $currencies->rub;
        $usd = $currencies->usd;

        $products = Product::all();

        foreach ($products as $product) {
            $kz = $product['price_kz'];

            $product->update(['price_ru' => (int) ceil($kz / $rub), 'price_uah' => (int) ceil($kz / $usd)]);
        }
        Log::info('ПОСЛЕДНИЙ РАЗ БЫЛ ОБНОВЛЕН: ' . \Carbon\Carbon::now()->toDateTimeString());
    }
}
