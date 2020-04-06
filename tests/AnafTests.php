<?php

namespace Andali\Anaf\Tests;

use Andali\Anaf\Facades\Anaf;
use stdClass;

class AnafTests extends TestCase
{
    /** @test */
    public function api_response_is_correct()
    {
        $infoCui = Anaf::info('38744563');
        $this->assertSame($infoCui->denumire, 'ANDALI SOLUTIONS PRO S.R.L.');
        $this->assertInstanceOf(stdClass::class, $infoCui);
    }

    /** @test */
    public function api_response_is_correct_using_vat_prefix()
    {
        $infoCui = Anaf::info('RO38744563');
        $this->assertSame($infoCui->denumire, 'ANDALI SOLUTIONS PRO S.R.L.');
        $this->assertInstanceOf(stdClass::class, $infoCui);
    }
}
