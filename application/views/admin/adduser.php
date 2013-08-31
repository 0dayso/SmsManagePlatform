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
        <p class="title-intro">用户管理&gt;&gt;用户编辑</p>

        <form action="<?= base_url('admin/usermanage/add') ?>" method="post">
            <table>
                <tr>
                    <td width="88" class="blue"><span class="red">*</span>企业名称</td>
                    <td>
                        <select name="fid">
                            <?php if (isset($factory)): ?>
                                <?php foreach ($factory as $item): ?>
                                    <option value="<?= $item['fid'] ?>"><?= $item['fname'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="blue">
                        <span class="red">*</span>用户名
                    </td>
                    <td>
                        <input name="usrname" type="text" class="input-length">
                    </td>
                </tr>
                <tr>
                    <td class="blue">
                        <span class="red">*</span>登录密码
                    </td>
                    <td>
                        <input name="passwd" type="text" class="input-length">
                    </td>
                </tr>
                <tr>
                    <td class="blue">
                        <span class="red">*</span>备注
                    </td>
                    <td>
                        <textarea name="info" id="" cols="30" rows="10"></textarea>

                        <p>最多为100字，已输入<span class="number" id="textnumber">0</span>字。</p>
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