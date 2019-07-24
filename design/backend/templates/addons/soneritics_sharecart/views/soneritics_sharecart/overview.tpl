{hook name="soneritics_sharecart:notice"}
    {notes title=__("soneritics_sharecart_menu")}
        <p>{__('addons.soneritics_sharecart.manage.overview_sidebar')}</p>
    {/notes}
{/hook}

{capture name="mainbox"}
    {capture name="minimumAmtPrice"}
        {include file="common/price.tpl" value=$repository->getSettings()->getMinimumAmount()}
    {/capture}
    <p>{sprintf(__('addons.soneritics_sharecart.overview.message'), $smarty.capture.minimumAmtPrice, $repository->getSettings()->getPointsNeeded()) nofilter}</p>
    {if $overview}
        <table class="table sortable table-middle">
            <thead>
            <tr>
                <th class="nowrap">{__("code")}</th>
                <th class="nowrap right">{__("orders")}</th>
                <th class="nowrap right">{__("addons.soneritics_sharecart.rewards")}</th>
                <th class="nowrap" colspan="2">{__("addons.soneritics_sharecart.progress")}</th>
                <th class="nowrap right">{__("addons.soneritics_sharecart.total_order_amount")}</th>
                <th class="nowrap right">{__("addons.soneritics_sharecart.average_order_amount")}</th>
                <th></th>
            </tr>
            </thead>
            {foreach from=$overview item=overviewLine}
                <tr>
                    <td><a href="{"soneritics_sharecart.orders?code=`$overviewLine->getPraktijkcode()`"|fn_url}">{$overviewLine->getPraktijkcode()}</a></td>
                    <td class="nowrap right">{$overviewLine->getOrderCount()}</td>
                    <td class="nowrap right">{$overviewLine->getRewards()}</td>
                    <td style="width:205px;"><div style="width:200px;border:1px solid #000;height:20px;overflow:hidden;"><div style="width:{$overviewLine->getCurrentProgressPercentage()*2}px;background-color:green;height:20px;overflow:hidden;"></div></div></td>
                    <td class="nowrap">{$overviewLine->getCurrentProgressPoints()} / {$repository->getSettings()->getPointsNeeded()}</td>
                    <td class="nowrap right">{include file="common/price.tpl" value=$overviewLine->getTotalOrderAmount()}</td>
                    <td class="nowrap right">{include file="common/price.tpl" value=$overviewLine->getAverageOrderAmount()}</td>
                    <td>
                        {if $overviewLine->getRewards() > $overviewLine->getRewardCount()}
                            {sprintf(__('addons.soneritics_sharecart.overview.sendreward'), $overviewLine->getRewards() - $overviewLine->getRewardCount())}
                            <br>
                            <a href="{"soneritics_sharecart.sendreward?code=`$overviewLine->getPraktijkcode()`"|fn_url}" class="btn btn-info o-status-p btn-small">{__("send")}</a>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </table>
    {else}
        <p class="no-items">{__("no_data")}</p>
    {/if}

    {capture name="buttons"}{/capture}
    {capture name="adv_buttons"}{/capture}
{/capture}
{include file="common/mainbox.tpl" title=__("soneritics_sharecart_menu") content=$smarty.capture.mainbox tools=$smarty.capture.tools select_languages=true buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}
