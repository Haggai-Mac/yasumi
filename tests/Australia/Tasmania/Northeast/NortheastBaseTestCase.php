<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Australia\Tasmania\Northeast;

use Yasumi\tests\Australia\Tasmania\TasmaniaBaseTestCase;
use Yasumi\tests\YasumiBase;

/**
 * Base class for test cases of the northeastern Tasmania holiday provider.
 */
abstract class NortheastBaseTestCase extends TasmaniaBaseTestCase
{
    use YasumiBase;

    /**
     * Name of the region (e.g. country / state) to be tested
     */
    public $region = 'Australia\Tasmania\Northeast';

    /**
     * Timezone in which this provider has holidays defined
     */
    public $timezone = 'Australia/Tasmania';
}
