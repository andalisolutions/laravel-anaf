<?php

namespace Andali\Anaf;

use Andali\Anaf\Exceptions\InvalidCui;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Anaf
{
    const API_ANAF = 'https://webservicesp.anaf.ro/PlatitorTvaRest/api/v4/ws/tva';

    public function info(string $cui)
    {
        $cui = $this->clear($cui);

        $info = Http::withHeaders(['Content-Type' => 'application/json'])
                    ->post(self::API_ANAF, [
                        [
                            'cui' => $cui,
                            'data' => Carbon::now()->format('Y-m-d'),
                        ],
                    ])->body();

        $info = json_decode($info);

        return $info->found[0];
    }

    protected function clear(string $cui): string
    {
        return Str::of($cui)
            ->upper()
            ->replace('RO', '')
            ->trim()
            ->__toString();
    }
}
