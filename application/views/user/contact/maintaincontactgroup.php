<div id="rightside">
            <p class="title-intro">联系人&gt;&gt;联系人组维护</p>
            <form action="<?=base_url('user/maintaincontactgroup/select')?>" method="post">
                <table>
                    <tr>
                        <td width="200" class="blue">联系人组名</td>
                        <td width="146"><input type="text" name="cgname" id="textfield"></td>
                        <td width="218" class="blue">联系人组备注</td>
                        <td width="218"><label for="select"></label>								  <label for="textfield2">
                                <input type="text" name="cginfo" id="textfield2">
                            </label></td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <button type="submit" class="button-s">查询</button>
                            <a href="#" class="button-s">新增</a>

                            <a href="#" class="button-s">删除</a>

                            <a href="#" class="button-s">发送</a>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="4" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a></td>
                    </tr>						  <tr>
                        <td width="98" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="255" class="blue">联系人组名称</td>
                        <td width="318" class="blue">联系人组描述</td>
                        <td width="109" class="blue">操作</td>
                    </tr>
                    <tr>
                        <?php if(isset($contactgroup)):?>
                            <?php foreach($contactgroup as $item):?>
                                <td width="98"><input type="checkbox" name="checkbox" id="checkbox"></td>
                                <td width="255"><?=$item['cgname']?></td>
                                <td width="318"><?=$item['cginfo']?></td>
                                <td width="109" class="blue">操作</td>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                </table>


            </form>
        </div>
    </div>
</div>
</body>
</html>