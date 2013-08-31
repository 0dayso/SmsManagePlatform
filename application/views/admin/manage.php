<div id="main">
        <div id="leftside">
            <ul>
                <li><a href="<?=base_url('user/generalsms')?>">短信发送</a></li>
                <li><a href="<?=base_url('user/smsbox')?>">收件箱</a></li>
                <li><a href="<?=base_url('user/sendbox')?>">发件箱</a></li>
                <li><a href="<?=base_url('user/addcontact')?>">联系人</a></li>
                <li><a href="<?=base_url('user/addphrase')?>">短信短语</a></li>
                <li><a href="<?=base_url('admin/manage')?>">用户管理</a></li>
                <ul id="next">
                    <li><a href="<?=base_url('admin/manage')?>">企业管理</a></li>
                    <li><a href="<?=base_url('admin/usermanage')?>">用户管理</a></li>
                    <li><a href="<?=base_url('admin/operatehistory')?>">操作记录查询</a></li>
                    <li><a href="<?=base_url('admin/charge')?>">账号充值</a></li>

                </ul>
            </ul>
        </div>
        <div id="rightside">
            <p class="title-intro">用户管理&gt;&gt;企业管理</p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td width="200" class="blue">名称</td>
                        <td><input name="fname" type="text" style="width: 400px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <button type="button" class="button-s" value="<?=base_url('admin/manage/select')?>">查询</button>
                            <a class="button-s" href="<?=base_url('admin/manage/add')?>">新增</a>
                            <button type="button" class="button-s" value="<?=base_url('admin/manage/del')?>">删除</button>
                            <button type="button" class="button-s" value="<?=base_url('admin/manage/recover')?>">欠费恢复</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="7" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a></td>
                    </tr>						  <tr>
                        <td width="74" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="104" class="blue">名称</td>
                        <td width="76" class="blue">联系人</td>
                        <td width="134" class="blue">手机号</td>
                        <td width="134" class="blue">IP</td>
                        <td width="177" class="blue">创建时间</td>
                        <td width="69" class="blue">操作</td>
                    </tr>
                    <?php if(isset($factory)):?>
                        <?php foreach($factory as $item):?>
                            <tr>
                            <td width="74">
                                <input type="checkbox" name="checkbox" id="checkbox">
                            </td>
                            <td width="104"><?=$item['fname']?></td>
                            <td width="76"><?=$item['contactman']?></td>
                            <td width="134"><?=$item['contactnumber']?></td>
                            <td width="134"><?=$item['ip']?></td>
                            <td width="177"><?=$item['addtime']?></td>
                            <td width="69">操作</td>
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
    $(function(){
        $('button.button-s').click(function(){
            $("form").attr('action', $(this).val());
            $("form").submit();
        })
    })
</script>
</body>
</html>