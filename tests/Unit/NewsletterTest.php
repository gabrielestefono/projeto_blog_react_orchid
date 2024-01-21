<?php

namespace Tests\Unit;

use App\Models\NewsLetter;
use PHPUnit\Framework\TestCase;

class NewsletterTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_unitario_tesletter(): void
    {

        $newsLetterData = ['email' => 'tst@ads.com'];

        $newsLetter = new NewsLetter($newsLetterData);

        $this->assertEquals($newsLetterData['email'], $newsLetter->email);
    }
}
