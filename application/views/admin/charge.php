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
            <p class="title-intro">用户管理&gt;&gt;账号充值</p>
            <form action="<?=base_url('admin/charge/select')?>" method="post">
                <table>
                    <tr>
                        <td width="200" class="blue">企业名称</td>
                        <td><input name="fname" type="text" id="textfield"></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <button type="submit" class="button-s">查询</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="6" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a>
                        </td>
                    </tr>						  <tr>
                        <td width="94" class="blue">企业名称
                        </td>
                        <td width="124" class="blue">移动106</td>
                        <td width="124" class="blue">联通106</td>
                        <td width="132" class="blue">电信106</td>
                        <td width="209" class="blue">号码池</td>
                        <td width="89" class="blue">操作</td>
                    </tr>
                    <?php if(isset($feeresult)):?>
                        <?php foreach($feeresult as $item):?>
                            <tr>
                                <td width="94">
                                    <?=$item['fname']?>
                                </td>
                                <td width="124"><?=$item['type'][1]?></td>
                                <td width="124"><?=$item['type'][2]?></td>
                                <td width="132"><?=$item['type'][3]?></td>
                                <td width="209">号码池</td>
                                <td width="89">
                                    <a href="<?=base_url('admin/charge/add/'.$item['fname'])?>" class="button-s">充值</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>