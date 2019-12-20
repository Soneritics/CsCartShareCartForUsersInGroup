{hook name="soneritics_sharecart:notice"}
{notes title=__("soneritics_sharecart_menu")}
    <p>{__('addons.soneritics_sharecart.manage.add_sidebar')}</p>
{/notes}
{/hook}

{capture name="mainbox"}
    <p>{__('addons.soneritics_sharecart.add.message')}</p>

    <form method="post" action="{""|fn_url}" class="form-horizontal">
        <div class="control-group">
            <label for="el-code" class="control-label cm-required">Code</label>
            <div class="controls">
                <input type="text" name="code" id="el-code" value="" class="user-success"><br><br>
                {include file="buttons/save.tpl" but_name="dispatch[soneritics_sharecart.addcode]"}
            </div>
        </div>
    </form>

    {capture name="buttons"}{/capture}
    {capture name="adv_buttons"}{/capture}
{/capture}
{include file="common/mainbox.tpl" title=__("soneritics_sharecart_menu") content=$smarty.capture.mainbox tools=$smarty.capture.tools select_languages=true buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}
