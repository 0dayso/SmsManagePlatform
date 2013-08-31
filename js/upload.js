/**
 * Created with JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 下午1:17
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function () {
    $('#fileform').submit(function (e) {
        e.preventDefault();
        $('#number').html('');
        var option = {
            target: '#number',
            url: './uploadcallback',
            type: 'post',
            success: function () {
                var result = $('#number').text().split(',');
                if (result[0])
                    $('#submitnumber').html(result.length);
                return false;
            }
        };
        $('#fileform').ajaxSubmit(option);
        return false;
    });
})