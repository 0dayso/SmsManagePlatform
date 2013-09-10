<div id="rightside" style="height: 900px">
            <p class="title-intro">短信短语&gt;&gt;自定义短语管理</p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td width="200" class="blue">名称</td>
                        <td width="146"><input type="text" name="textfield" id="textfield"></td>
                        <td width="218" class="blue">短语类别</td>
                        <td width="218"><label for="select"></label>
                            <select name="select" class="select1">
                                <option value="">不使用</option>
                                <?php foreach($pgroup as $item):?>
                                    <option value="<?=$item['pgid']?>"><?=$item['pgname']?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <button type="button" class="button-s" value="<?=base_url('user/managephrase/select')?>">查询</button>
                            <button type="button" class="button-s">删除</button>

                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="5" class="blue">&nbsp;</td>
                    </tr>
                    <!--
                    <tr>
                        <td colspan="5">
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a></td>
                    </tr>
                    -->
                    <tr>
                        <td width="106" class="blue"><input type="checkbox" name="checkbox" id="checkAll">
                            <label for="checkbox">全选</label></td>
                        <td width="139" class="blue">短语类别名称</td>
                        <td width="280" class="blue">短语内容</td>
                        <td width="134" class="blue">短语描述</td>
                        <td width="117" class="blue">操作</td>
                    </tr>
                    <?php if(isset($result)):?>
                        <?php foreach($result as $item):?>
                            <tr>
                            <td width="106"><input type="checkbox" name="checkbox[]" value="<?=$item['pid']?>"></td>
                            <td width="139"><?=$item['pgname']?></td>
                            <td width="280"><?=$item['pcontent']?></td>
                            <td width="134"><?=$item['pinfo']?></td>
                            <td width="117">操作</td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
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
        $("#checkAll").click(function () {
            $('input[type="checkbox"]').attr("checked", this.checked);
        });
        var $subBox = $("input[type='checkbox']");
        $subBox.click(function () {
            $("#checkAll").attr("checked", $subBox.length == $("input[type='checkbox']:checked").length ? true : false);
        });
    });
</script>
</body>
</html>