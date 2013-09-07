<div id="rightside">
            <p class="title-intro">联系人>> 联系人导入</p>
            <form action="<?=base_url('user/importcontact')?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="blue">选择文件</td>
                        <td>
                            <input name="usefile" type="file" />
                            <p><a href="#">模板下载</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue">联系人组</td>
                        <td>
                            <select name="cgid" class="select1">
                                <?php foreach($contactgroup as $item):?>
                                    <option value="<?=$item['cgid']?>"><?=$item['cgname']?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="blue">
                            <button type="submit">导入</button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>