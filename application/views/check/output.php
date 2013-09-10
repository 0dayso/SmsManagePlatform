<div id="main">
    <div id="leftside" style="height: 750px">
        <ul>
            <li><a href="#">用户管理</a></li>

            <ul id="next">
                <li><a href="<?= base_url('check/intercept') ?>">短信审核</a></li>
                <li><a href="<?= base_url('check/uniquesms') ?>">唯一信息调取</a></li>
                <li><a href="<?= base_url('check/fishsms/') ?>">钓鱼信息查询</a></li>
                <li><a href="<?= base_url('check/output') ?>">待审核信息导出</a></li>
            </ul>


        </ul>
    </div>
        <div id="rightside" style="height: 750px">
            <p class="title-intro">用户管理&gt;&gt;待审核信息导出</p>
            <form action="<?=base_url('check/output')?>" method="post">
                <table>
                    <tr>
                        <td width="143" class="blue">开始时间</td>
                        <td width="220">
                            <input type="text" name="startime" id="start-date" value="<?=$this->session->flashdata('startime')?>"/>
                        </td>
                        <td width="189" class="blue">结束时间</td>
                        <td width="228"><label for="textfield2"></label>
                            <input type="text" name="endtime" id="end-date" value="<?=$this->session->flashdata('endtime')?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue">网关类型</td>
                        <td colspan="3">
                            <select name="gatetype" class="input-length1" id="select">
                                <option value="0">全部</option>
                                <option value="1">移动</option>
                                <option value="2">联通</option>
                                <option value="3">电信</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue" >短信内容</td>
                        <td colspan="3" >
                            <input name="content" type="text" class="input-length">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <button type="submit" class="button-s">查询</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="5" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <button type="button" value="<?= base_url('check/output/0') ?>" class="button-s">首页</button>
                            <?php if($page != 0):?>
                                <button type="button" value="<?= base_url('check/output/'.($page - 1)) ?>" class="button-s">上一页</button>
                            <?php endif ?>
                            <button type="button" value="<?= base_url('check/output/'.($page + 1)) ?>" class="button-s">下一页</button>
                            <button type="button" value="<?= base_url('check/output/0') ?>" class="button-s">尾页</button>
                        </td>
                    </tr>						  <tr>
                        <td width="164" class="blue">企业名称</td>
                        <td width="151" class="blue">网关类型</td>
                        <td width="321" class="blue">短信内容</td>
                        <td width="77" class="blue">发送数量</td>
                        <td width="63" class="blue">操作</td>
                    </tr>
                    <?php if(isset($output)):?>
                        <?php foreach($output as $item):?>
                            <tr>
                                <td width="164"><?=$item['fname']?></td>
                                <td width="151"><?=$item['gatetype']?></td>
                                <td width="321"><?=$item['content']?></td>
                                <td width="77"><?=$item['num']?></td>
                                <?php
                                    switch($item['gatetype']){
                                        case "移动":
                                            $item['gatetype'] = 1;
                                            break;
                                        case "联通":
                                            $item['gatetype'] = 2;
                                            break;
                                        case "电信":
                                            $item['gatetype'] = 3;
                                            break;
                                    }
                                ?>
                                <td width="63"><a href="<?=base_url('check/output/0/'.$item['csid'].'/'.$item['gatetype'])?>">导出</a></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </table>


            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('js/jquery.datePicker.js') ?>"></script>
<script type="text/javascript">
    $(function () {
        Date.format = 'yyyy-mm-dd'
        $('.date-pick').datePicker({
            clickInput: true,
            createButton: false,
            startDate: '2013-01-01'
        });
        $('#start-date').bind(
            'dpClosed',
            function (e, selectedDates) {
                var d = selectedDates[0];
                if (d) {
                    d = new Date(d);
                    $('#end-date').dpSetStartDate(d.addDays(1).asString());
                }
            }
        );
        $('#end-date').bind(
            'dpClosed',
            function (e, selectedDates) {
                var d = selectedDates[0];
                if (d) {
                    d = new Date(d);
                    $('#start-date').dpSetStartDate(d.addDays(-1).asString());
                }
            }
        );
    })
</script>
</body>
</html>