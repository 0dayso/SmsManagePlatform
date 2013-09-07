<div id="main">
    <div id="leftside" style="height: 850px">
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
    <div id="rightside">
        <p class="title-intro">用户管理&gt;&gt;钓鱼号码</p>

        <form action="<?=base_url('check/fishsms')?>" method="post">
            <table>
                <tr>
                    <td width="143" class="blue">开始时间</td>
                    <td width="220">
                        <input type="text" name="startime" id="start-date" value="<?=$this->session->flashdata('startime')?>">
                    </td>
                    <td width="189" class="blue">结束时间</td>
                    <td width="228">
                        <input type="text" name="endtime" id="end-date" value="<?=$this->session->flashdata('endtime')?>">
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
                    <td colspan="4">
                        <button type="submit" class="button-s">查询</button>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="4" class="blue">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                        <button type="button" value="<?=base_url('check/fishsms/0')?>" class="button-s">首页</button>
                        <?php if($page != 0):?>
                        <<button type="button" value="<?=base_url('check/fishsms/'.($page - 1))?>" class="button-s">上一页</button>
                        <?php endif ?>
                        <button type="button" value="<?=base_url('check/fishsms/'.($page + 1))?>" class="button-s">下一页</button>
                        <button type="button" value="<?=base_url('check/fishsms/0')?>" class="button-s">尾页</button>
                    </td>
                </tr>
                <tr>
                    <td width="112" class="blue"><label for="checkbox">企业名称</label></td>
                    <td width="102" class="blue">网关类型</td>
                    <td class="blue">短信内容</td>
                    <td class="blue">任务数量</td>
                </tr>
                <?php if(isset($fishsms)):?>
                    <?php foreach($fishsms as $item):?>
                        <tr>
                            <td width="112"><?=$item['fname']?></td>
                            <td width="102"><?=$item['gatetype']?></td>
                            <td><?=$item['content']?></td>
                            <td><?=$item['num']?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>

            </table>


        </form>
    </div>
</div>
</div>
<script type="text/javascript" src="<?=base_url('js/jquery.datePicker.js')?>"></script>
<script type="text/javascript">
    $(function(){
        Date.format = 'yyyy-mm-dd'
        $('.date-pick').datePicker({
            clickInput:true,
            createButton:false,
            startDate:'2013-01-01'
        });
        $('#start-date').bind(
            'dpClosed',
            function(e, selectedDates)
            {
                var d = selectedDates[0];
                if (d) {
                    d = new Date(d);
                    $('#end-date').dpSetStartDate(d.addDays(1).asString());
                }
            }
        );
        $('#end-date').bind(
            'dpClosed',
            function(e, selectedDates)
            {
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