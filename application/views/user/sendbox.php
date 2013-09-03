<div id="main">
    <div id="leftside">
        <ul>
            <li><a href="<?= base_url('user/generalsms') ?>">短信发送</a></li>
            <li><a href="<?= base_url('user/smsbox') ?>">收件箱</a></li>
            <li><a href="#">发件箱</a></li>
            <ul id="next">
                <li><a href="<?= base_url('user/sendbox') ?>">已发送短信</a></li>
            </ul>
            </li>
            <li><a href="<?= base_url('user/addcontact') ?>">联系人</a></li>
            <li><a href="<?= base_url('user/addphrase') ?>">短信短语</a></li>
            <li><a href="<?= base_url('user/manage') ?>">用户管理</a></li>
        </ul>
    </div>
    <div id="rightside">
        <p class="title-intro">
            短信发送>>已发送短信</p>

        <form action="" method="post">
            <table>
                <tr>
                    <td class="blue">说明</td>
                    <td colspan="3">默认情况下，查询的记录为当天数据</td>
                </tr>
                <tr>
                    <td class="blue">起始时间</td>
                    <td><input type="text" name="startime" id="textfield"></td>
                    <td class="blue">截止时间</td>
                    <td><input type="text" name="endtime" id="textfield2"></td>
                </tr>
                <tr>
                    <td class="blue">选择主叫号码</td>
                    <td><input type="text" name="hostname" id="textfield3"></td>
                    <td class="blue">选择被叫号码</td>
                    <td><input type="text" name="clientnumber" id="textfield4"></td>
                </tr>
                <tr>
                    <td width="117" class="blue">选择查询类型</td>
                    <td width="246"><label for="select"></label>
                        <select name="flag" class="select1">
                            <option value="0">全部</option>
                        </select>
                    </td>
                    <td width="150" class="blue">选择网关类型</td>
                    <td width="267"><label for="textfield2">
                            <select name="select2" class="select1">
                            </select>
                        </label></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="button" class="button-s" value="<?= base_url('user/sendbox/select') ?>">查询
                        </button>
                        <button type="button" class="button-s" value="<?= base_url('user/sendbox/ouput') ?>">导出</button>
                        <button type="button" class="button-s" value="<?= base_url('user/sendbox/resend') ?>">重发
                        </button>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="7" class="blue">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="10">总数：<span class="number">0</span>&nbsp;&nbsp;待发送：<span class="number">0</span>&nbsp;&nbsp;已提交：<span
                            class="number">0</span>&nbsp;&nbsp;发送成功：<span class="number">0</span>&nbsp;&nbsp;发送失败：<span
                            class="number">0</span>&nbsp;&nbsp;
                        <button type="button" value="<?=base_url('user/sendbox/select/0')?>" class="button-s">首页</button>
                        <?php if($page != 0):?>
                        <button type="button" value="<?=base_url('user/sendbox/select/'.($page-1))?>" class="button-s">上一页</button>
                        <?php endif ?>
                        <button type="button" value="<?=base_url('user/sendbox/select/'.($page+1))?>" class="button-s">下一页</button>
                        <button type="button" value="<?=base_url('user/sendbox/select/0')?>" class="button-s">尾页</button>
                    </td>
                </tr>
                <tr>
                    <td width="70" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox">全选</label></td>
                    <td width="73" class="blue">被叫号码</td>
                    <td width="93" class="blue">主叫号码</td>
                    <td width="290" class="blue">短信内容</td>
                    <td width="96" class="blue">计划时间</td>
                    <td width="93" class="blue">发送时间</td>
                    <td width="53" class="blue">状态</td>
                </tr>
                <?php if (isset($result)): ?>
                    <?php foreach ($result as $item): ?>
                        <tr>
                            <td width="70">
                                <input type="checkbox" name="checkbox" id="checkbox">
                            </td>
                            <td width="73"><?= $item['snumber'] ?></td>
                            <td width="93">主叫号码</td>
                            <td width="290"><?= $item['content'] ?></td>
                            <td width="96">计划时间</td>
                            <td width="93"><?= $item['addtime'] ?></td>
                            <td width="53"><?= $item['flag'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>

            </table>


        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function () {
        $('.button-s').click(function () {
            $("form").attr('action', $(this).val());
            $("form").submit();
        })
    })
</script>
</body>
</html>