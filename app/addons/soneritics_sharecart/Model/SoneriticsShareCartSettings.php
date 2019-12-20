<?php
/*
 * The MIT License
 *
 * Copyright 2019 Jordi Jolink.
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
class SoneriticsShareCartSettings
{
    /**
     * @var string
     */
    private $praktijkcode;

    /**
     * @var double
     */
    private $minimumAmount;

    /**
     * @var int
     */
    private $pointsNeeded;

    /**
     * @var int
     */
    private $sampleProductId;

    /**
     * @var bool
     */
    private $active = false;

    /**
     * @return int
     */
    public function getSampleProductId(): int
    {
        return $this->sampleProductId;
    }

    /**
     * @param int $sampleProductId
     * @return SoneriticsShareCartSettings
     */
    public function setSampleProductId(int $sampleProductId): SoneriticsShareCartSettings
    {
        $this->sampleProductId = $sampleProductId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPraktijkcode(): string
    {
        return $this->praktijkcode;
    }

    /**
     * @param string $praktijkcode
     * @return SoneriticsShareCartSettings
     */
    public function setPraktijkcode(string $praktijkcode): SoneriticsShareCartSettings
    {
        $this->praktijkcode = $praktijkcode;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumAmount(): float
    {
        return $this->minimumAmount;
    }

    /**
     * @param float $minimumAmount
     * @return SoneriticsShareCartSettings
     */
    public function setMinimumAmount(float $minimumAmount): SoneriticsShareCartSettings
    {
        $this->minimumAmount = $minimumAmount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return SoneriticsShareCartSettings
     */
    public function setActive(bool $active): SoneriticsShareCartSettings
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointsNeeded(): int
    {
        return $this->pointsNeeded;
    }

    /**
     * @param int $pointsNeeded
     * @return SoneriticsShareCartSettings
     */
    public function setPointsNeeded(int $pointsNeeded): SoneriticsShareCartSettings
    {
        $this->pointsNeeded = $pointsNeeded;
        return $this;
    }
}
