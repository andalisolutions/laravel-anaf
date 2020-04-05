<?php

namespace Andali\Anaf\Tests;

use Andali\Anaf\Exceptions\InvalidCui;
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

    /** @test */
    public function invalid_cui_return_exception()
    {
        $this->expectException(InvalidCui::class);
        $infoCui = Anaf::info('1234567');
    }

    /** @test */
    public function long_cui_return_exception()
    {
        $this->expectException(InvalidCui::class);
        $infoCui = Anaf::info('12345678901');
    }

    /** @test */
    public function short_cui_return_exception()
    {
        $this->expectException(InvalidCui::class);
        $infoCui = Anaf::info('1234');
    }

    /** @test */
    public function check_ten_module_for_verification_if_cui_is_invalid()
    {
        $this->expectException(InvalidCui::class);
        $infoCui = Anaf::info('38695416');
    }

    /** @test */
    public function checkValidFunction()
    {
        $this->assertTrue(Anaf::validateCui('38744563'));
        $this->assertFalse(Anaf::validateCui('1234455'));
    }
}
