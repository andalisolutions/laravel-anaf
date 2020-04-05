<?php

namespace Andali\Anaf;

use Carbon\Carbon;
use Andali\Anaf\Exceptions\InvalidCui;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Anaf
{
    const API_ANAF = 'https://webservicesp.anaf.ro/PlatitorTvaRest/api/v4/ws/tva';

    public function info(string $cui)
    {
        $cui = $this->clear($cui);

        if (! $this->validateCui($cui)) {
            throw InvalidCui::invalid();
        }

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
        //return str_replace('RO','',strtoupper(trim($cui)));
    }

    public function validateCui(string $cui): bool
    {
        if (Str::length($cui) > 10) {
            return false;
        }

        if (Str::length($cui) < 6) {
            return false;
        }

        $v = 753217532;

        $c1 = (int) $cui % 10;
        $cui = (int) $cui / 10;

        $t = 0;
        while ($cui > 0) {
            $t += ($cui % 10) * ($v % 10);
            $cui = $cui / 10;
            $v = $v / 10;
        }

        $c2 = $t * 10 % 11;

        if ($c2 == 10) {
            $c2 = 0;
        }

        return $c1 === $c2;
    }
}
