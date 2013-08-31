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
            <p class="title-intro">用户管理&gt;&gt;用户管理</p>
            <form action='' method="post">
                <table>
                    <tr>
                        <td width="115" class="blue">用户名</td>
                        <td width="265">
                            <input name="usrname" type="text" id="textfield">
                        </td>
                        <td width="140" class="blue">单位名称</td>
                        <td width="260">
                            <select name="fid">
                                <option value="">不指定</option>
                                <?php if(isset($factory)):?>
                                    <?php foreach($factory as $item):?>
                                        <option value="<?=$item['fid']?>"><?=$item['fname']?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <button type="button" class="button-s" value="<?=base_url('admin/usermanage/select')?>">查询</button>
                            <a href="<?=base_url('admin/usermanage/add')?>" class="button-s">新增</a>
                            <button type="button" class="button-s" value="<?=base_url('admin/usermanage/del')?>">删除</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="5" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a></td>
                    </tr>						  <tr>
                        <td width="107" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="140" class="blue">用户名</td>
                        <td width="279" class="blue">备注</td>
                        <td width="185" class="blue">角色</td>
                        <td width="65" class="blue">操作</td>
                    </tr>
                    <?php if(isset($user)):?>
                        <?php foreach($user as $item):?>
                            <tr>
                            <td width="107">
                                <input type="checkbox" name="checkbox" id="checkbox">
                            </td>
                            <td width="140"><?=$item['usrname']?></td>
                            <td width="279"><?=$item['info']?></td>
                            <td width="185"><?=$item['type']?></td>
                            <td width="65">操作</td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.button-s').click(function(){
            $("form").attr('action', $(this).val());
            $("form").submit();
        })
    })
</script>
</body>
</html>