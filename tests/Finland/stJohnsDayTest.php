<?php
/**
 *  This file is part of the Yasumi package.
 *
 *  Copyright (c) 2015 - 2016 AzuyaLabs
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\Tests\Finland;

use DateTime;
use DateTimeZone;
use Yasumi\Yasumi;

/**
 * Class for testing St. John's Day / Midsummer's Day in Finland.
 *
 * Since 1955, the holiday has always been on a Saturday (between June 20 and June 26). Earlier it was always on
 * June 24.
 */
class stJohnsDayTest extends FinlandBaseTestCase
{

    /**
     * The year in which the holiday was adjusted
     */
    const ADJUSTMENT_YEAR = 1955;

    /**
     * The name of the holiday to be tested
     */
    const HOLIDAY = 'stJohnsDay';

    /**
     * Tests the holiday before it was adjusted.
     */
    public function testHolidayBeforeAdjustment()
    {
        $year = 1944;
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year,
            new DateTime("$year-6-24", new DateTimeZone(self::TIMEZONE)));
    }

    /**
     * Tests the holiday before it was adjusted.
     */
    public function testHolidayAfterAdjustment()
    {
        $year = $this->generateRandomYear(self::ADJUSTMENT_YEAR);

        $holidays = Yasumi::create(self::REGION, $year);
        $holiday  = $holidays->getHoliday(self::HOLIDAY);

        // Some basic assertions
        $this->assertInstanceOf('Yasumi\Provider\\' . str_replace('/', '\\', self::REGION), $holidays);
        $this->assertInstanceOf('Yasumi\Holiday', $holiday);
        $this->assertTrue(isset($holiday));

        // Holiday specific assertions
        $this->assertEquals('Saturday', $holiday->format('l'));
        $this->assertGreaterThanOrEqual(20, $holiday->format('j'));
        $this->assertLessThanOrEqual(26, $holiday->format('j'));

        unset($holiday, $holidays);
    }

    /**
     * Tests the translated name of the holiday defined in this test.
     */
    public function testTranslation()
    {
        $this->assertTranslatedHolidayName(self::REGION, self::HOLIDAY, $this->generateRandomYear(),
            [self::LOCALE => 'Juhannuspäivä']);
    }
}