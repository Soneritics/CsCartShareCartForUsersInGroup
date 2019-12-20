<?php
/*
 * The MIT License
 *
 * Copyright 2018 Jordi Jolink.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class SoneriticsShareCartSettingsFactory
{
    /**
     * @var SoneriticsShareCartSettings
     */
    private static $settings;

    /**
     * @return SoneriticsShareCartSettings
     */
    public static function create(): SoneriticsShareCartSettings
    {
        if (empty(static::$settings)) {
            static::generateSettingsObject();
        }

        return static::$settings;
    }

    /**
     * Set $settings object to new SoneriticsShareCartSettings instance.
     */
    private static function generateSettingsObject(): void
    {
        $active = \Tygh\Registry::get('addons.soneritics_sharecart.active') != 'N';
        $minimumAmount = (double)\Tygh\Registry::get('addons.soneritics_sharecart.minimum_amt');
        $pointsNeeded = (int)\Tygh\Registry::get('addons.soneritics_sharecart.points_needed');
        $praktijkcode = \Tygh\Registry::get('addons.soneritics_sharecart.praktijkcode');
        $sampleProductId = \Tygh\Registry::get('addons.soneritics_sharecart.sample_product_id');

        static::$settings = (new SoneriticsShareCartSettings)
            ->setActive($active)
            ->setMinimumAmount($minimumAmount)
            ->setPraktijkcode($praktijkcode)
            ->setPointsNeeded($pointsNeeded)
            ->setSampleProductId($sampleProductId);
    }
}
