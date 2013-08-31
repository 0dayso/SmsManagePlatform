<div id="main">
    <div id="leftside">
        <ul>
            <li><a href="<?= base_url('user/generalsms') ?>">短信发送</a></li>
            <li><a href="<?= base_url('user/smsbox') ?>">收件箱</a></li>
            <li><a href="<?= base_url('user/sendbox') ?>">发件箱</a></li>
            <li><a href="<?= base_url('user/addcontact') ?>">联系人</a></li>
            <li><a href="<?= base_url('user/addphrase') ?>">短信短语</a></li>
            <li><a href="<?= base_url('admin/manage') ?>">用户管理</a></li>
            <ul id="next">
                <li><a href="<?= base_url('admin/manage') ?>">企业管理</a></li>
                <li><a href="<?= base_url('admin/usermanage') ?>">用户管理</a></li>
                <li><a href="<?= base_url('admin/operatehistory') ?>">操作记录查询</a></li>
                <li><a href="<?= base_url('admin/charge') ?>">账号充值</a></li>

            </ul>
        </ul>
    </div>
    <div id="rightside">
        <p class="title-intro">用户管理&gt;&gt;账户充值</p>
        <form action="<?=base_url('admin/charge/add')?>" method="post">
            <table>
                <tr>
                    <td width="88" class="blue">企业名称</td>
                    <td width="700">
                        <input name="fname" type="text" class="input-length" value="<?=$fname?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="blue">充值类型</td>
                    <td>
                        <select name="type" class="input-length">
                            <option value="">全部</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="blue">移动106</td>
                    <td><input name="mobile" type="text" class="input-length1">当前<span class="number"><?=$fee[0]?></span>条
                    </td>
                </tr>
                <tr>
                    <td class="blue">联通106</td>
                    <td>
                        <input name="unicom" type="text" class="input-length1">当前<span class="number"><?=$fee[1]?></span>条
                    </td>
                </tr>
                <tr>
                    <td class="blue">电信106</td>
                    <td>
                        <input name="telecom" type="text" class="input-length1">当前<span class="number"><?=$fee[2]?></span>条
                    </td>
                </tr>
                <tr>
                    <td class="blue">号码池</td>
                    <td><p>
                            <input name="textfield5" type="text" class="input-length1" id="textfield5">
                            当前<span class="number">0</span>条</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="blue">
                        <button type="submit" class="button-s">提交</button>
                        <button type="reset" class="button-s">重置</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</div>
</body>
</html>