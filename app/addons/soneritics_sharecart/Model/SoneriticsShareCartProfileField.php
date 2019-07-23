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

class SoneriticsShareCartProfileField
{
    /**
     * @var string[]
     */
    private $names = [];

    /**
     * @var int[]
     */
    private $ids = [];

    public function __construct(string $name)
    {
        if (in_array(substr($name, 0, 2), ['s_', 'b_'])) {
            $name = substr($name, 2);
        }

        $this->setNames($name);
    }

    /**
     * @param string $baseNames
     */
    private function setNames(string $baseNames)
    {
        $this->names = ["s_{$baseNames}", "b_{$baseNames}", $baseNames];
    }

    /**
     * @return string[]
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * @return int[]
     */
    public function getIds(): array
    {
        if (empty($this->ids)) {
            $this->ids = db_get_fields(
                "SELECT field_id FROM ?:profile_fields WHERE field_name IN(?a)",
                $this->getNames()
            );
        }

        return $this->ids;
    }
}
