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

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

// Init variables for use in every controller function
$repository = new SoneriticsShareCartRepository;

// Send a reward
if ($mode === 'sendreward') {
    $code = strtolower($_REQUEST['code']);
    db_query("INSERT INTO `?:soneritics_sharecart_rewards`(`code`) VALUES(?s)", $code);
    return array(CONTROLLER_STATUS_OK, 'soneritics_sharecart.overview');
}

// Overview
if ($mode === 'overview') {
    $overview = (new SoneriticsShareCartOverviewGenerator($repository))->generateCompleteOverview();
    Tygh::$app['view']->assign('overview', $overview);
}

// Orders for a certain code
if ($mode === 'orders') {
    $code = $_REQUEST['code'];

    # Fetch orders, as copied from /app/controllers/backend/orders.php
    $params = $_REQUEST;
    $params['order_id'] = (new SoneriticsShareCartOverviewGenerator($repository))->getOrderIdsForCode($code);

    if (fn_allowed_for('MULTIVENDOR')) {
        $params['company_name'] = true;
    }

    list($orders, $search, $totals) = fn_get_orders($params, Registry::get('settings.Appearance.admin_elements_per_page'), true);

    # Set view variables
    Tygh::$app['view']->assign('orders', $orders);
    Tygh::$app['view']->assign('search', $search);
    Tygh::$app['view']->assign('totals', $totals);
    Tygh::$app['view']->assign('praktijkcode', $code);
}

// Default view variables
Tygh::$app['view']->assign('repository', $repository);
