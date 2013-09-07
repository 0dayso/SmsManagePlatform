        <div id="rightside">
            <p class="title-intro">联系人&gt;&gt;联系人维护</p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td width="200" class="blue">姓名</td>
                        <td width="146"><input type="text" name="cname" id="textfield"></td>
                        <td width="218" class="blue">联系人组</td>
                        <td width="218"><label for="select"></label>
                            <select name="cgroup" class="select1">
                            </select>								  <label for="textfield2"></label></td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <button type="button" class="button-s" value="<?=base_url('user/maintaincontact/select')?>">查询</button>
                            <button type="button" class="button-s" value="<?=base_url('user/maintaincontact/del')?>">删除</button>
                            <button type="button" class="button-s" value="<?=base_url('user/maintaincontact/output')?>">导出</button>
                            <button type="button" class="button-s" value="<?=base_url('user/maintaincontact/changroup')?>">修改组</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="7" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7"><span class="result">查询结果：共<span><?php if(isset($contact)) echo $numrow; else echo 0;?></span>条记录，当前<span>0/0</span>页</span>
                            <button type="button" value="<?=base_url('user/maintaincontact/0')?>" class="button-s">首页</button>
                            <?php if($page != 0):?>
                                <<button type="button" value="<?=base_url('user/maintaincontact/'.($page - 1))?>" class="button-s">上一页</button>
                            <?php endif ?>
                            <button type="button" value="<?=base_url('user/maintaincontact/'.($page + 1))?>" class="button-s">下一页</button>
                            <button type="button" value="<?=base_url('user/maintaincontact/0')?>" class="button-s">尾页</button>
                        </td>
                    </tr>
                    <tr>
                        <td width="68" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="90" class="blue">联系人姓名</td>
                        <td width="179" class="blue">联系人号码</td>
                        <td width="167" class="blue">联系人邮箱</td>
                        <td width="106" class="blue">联系人公司</td>
                        <td width="92" class="blue">联系人组</td>
                        <td width="66" class="blue">操作</td>
                    </tr>
                        <?php if(isset($contact)):?>
                        <?php foreach($contact as $item):?>
                            <tr>
                            <td width="68">
                                <input type="checkbox" name="checkbox" id="checkbox">
                            </td>
                            <td width="90"><?=$item['cname']?></td>
                            <td width="179"><?=$item['cnumber']?></td>
                            <td width="167"><?=$item['cmail']?></td>
                            <td width="106"><?=$item['ccompany']?></td>
                            <td width="92"><?=$item['cgname']?></td>
                            <td width="66">操作</td>
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
    $('.button-s').click(function(){
        $("form").attr('action', $(this).val());
        $("form").submit();
    })
})
</script>
</body>
</html>