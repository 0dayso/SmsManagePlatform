<div id="rightside">
    <p class="title-intro">联系人&gt;&gt;联系人组维护</p>

    <form action="" method="post">
        <table>
            <tr>
                <td width="200" class="blue">联系人组名</td>
                <td width="146"><input type="text" name="cgname" id="textfield"></td>
                <td width="218" class="blue">联系人组备注</td>
                <td width="218"><label for="select"></label> <label for="textfield2">
                        <input type="text" name="cginfo" id="textfield2">
                    </label></td>
            </tr>
            <tr>
                <td colspan="4">
                    <button type="button" class="button-s" value="<?= base_url('user/maintaincontactgroup/select') ?>">查询</button>
                    <button type="button" class="button-s" value="<?= base_url('user/maintaincontactgroup/del') ?>">删除</button>
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
            </tr>
            <tr>
                <td width="98" class="blue"><input type="checkbox" name="checkbox" id="checkAll">
                    <label for="checkbox">全选</label></td>
                <td width="255" class="blue">联系人组名称</td>
                <td width="318" class="blue">联系人组描述</td>
                <td width="109" class="blue">操作</td>
            </tr>
            <?php if (isset($contactgroup)): ?>
                <?php foreach ($contactgroup as $item): ?>
                    <tr>
                        <td width="98"><input type="checkbox" name="checkbox[]" id="checkbox" value="<?=$item['cgid']?>"></td>
                        <td width="255"><?= $item['cgname'] ?></td>
                        <td width="318"><?= $item['cginfo'] ?></td>
                        <td width="109">操作</td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>

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
        $("#checkAll").click(function () {
            $('input[type="checkbox"]').attr("checked", this.checked);
        });
        var $subBox = $("input[type='checkbox']");
        $subBox.click(function () {
            $("#checkAll").attr("checked", $subBox.length == $("input[type='checkbox']:checked").length ? true : false);
        });
    })
</script>
</body>
</html>