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

class SoneriticsShareCartOverviewGenerator
{
    /**
     * @var SoneriticsShareCartRepository
     */
    private $repository;

    /**
     * SoneriticsShareCartOverviewGenerator constructor.
     * @param SoneriticsShareCartRepository $repository
     */
    public function __construct(SoneriticsShareCartRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return SoneriticsShareCartOverviewLine[]
     */
    public function generateCompleteOverview(): array
    {
        $result = [];

        $ids = $this->repository->getProfileField()->getIds();
        $minimumAmount = $this->repository->getSettings()->getMinimumAmount();
        $pointsNeeded = $this->repository->getSettings()->getPointsNeeded();

        $rows = db_get_array(
            "SELECT
                pfd.value as `code`,
                SUM(o.total) as `total`,
                COUNT(o.order_id) as `ordercount`
            FROM `?:profile_fields_data` pfd
            INNER JOIN `?:orders` o ON o.order_id = pfd.object_id
            WHERE 1=1
                and field_id in(?a) 
                and object_type='O'
                AND o.total >= ?d
                AND o.status = 'C'
            GROUP BY `code`",
            $ids,
            $minimumAmount
        );

        if (!empty($rows)) {
            foreach ($rows as $row) {
                $result[$row['code']] = new SoneriticsShareCartOverviewLine(
                    $row['code'],
                    (int)$row['ordercount'],
                    (double)$row['total'],
                    round($row['total'] / $row['ordercount'], 2),
                    (int)floor($row['ordercount'] / $pointsNeeded),
                    $row['ordercount'] % $pointsNeeded,
                    round(($row['ordercount'] % $pointsNeeded) / $pointsNeeded * 100, 2)
                );
            }
        }

        return $result;
    }
}