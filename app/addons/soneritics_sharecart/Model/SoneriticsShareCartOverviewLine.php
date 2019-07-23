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

/**
 * Class SoneriticsShareCartOverviewLine
 */
class SoneriticsShareCartOverviewLine
{
    /**
     * @var string
     */
    private $praktijkcode;

    /**
     * @var int
     */
    private $orderCount;

    /**
     * @var double
     */
    private $totalOrderAmount;

    /**
     * @var double
     */
    private $averageOrderAmount;

    /**
     * @var int
     */
    private $rewards;

    /**
     * @var double
     */
    private $currentProgressPercentage;

    /**
     * @var int
     */
    private $currentProgressPoints;

    /**
     * SoneriticsShareCartOverviewLine constructor.
     * @param string $praktijkcode
     * @param int $orderCount
     * @param float $totalOrderAmount
     * @param float $averageOrderAmount
     * @param int $rewards
     * @param int $currentProgressPoints
     * @param float $currentProgressPercentage
     */
    public function __construct(
        string $praktijkcode,
        int $orderCount,
        float $totalOrderAmount,
        float $averageOrderAmount,
        int $rewards,
        int $currentProgressPoints,
        float $currentProgressPercentage
    ) {
        $this->praktijkcode = $praktijkcode;
        $this->orderCount = $orderCount;
        $this->totalOrderAmount = $totalOrderAmount;
        $this->averageOrderAmount = $averageOrderAmount;
        $this->rewards = $rewards;
        $this->currentProgressPoints = $currentProgressPoints;
        $this->currentProgressPercentage = $currentProgressPercentage;
    }

    /**
     * @return string
     */
    public function getPraktijkcode(): string
    {
        return $this->praktijkcode;
    }

    /**
     * @return int
     */
    public function getOrderCount(): int
    {
        return $this->orderCount;
    }

    /**
     * @return float
     */
    public function getTotalOrderAmount(): float
    {
        return $this->totalOrderAmount;
    }

    /**
     * @return float
     */
    public function getAverageOrderAmount(): float
    {
        return $this->averageOrderAmount;
    }

    /**
     * @return int
     */
    public function getRewards(): int
    {
        return $this->rewards;
    }

    /**
     * @return float
     */
    public function getCurrentProgressPercentage(): float
    {
        return $this->currentProgressPercentage;
    }

    /**
     * @return int
     */
    public function getCurrentProgressPoints(): int
    {
        return $this->currentProgressPoints;
    }
}
