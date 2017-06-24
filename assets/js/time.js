function set_server_clock(serverTime){
    var curTime = new Date();
    var diffTime = serverTime - curTime;
    update_server_clock(diffTime);
}

function update_server_clock(diffTime)
{
    var curTime = new Date();
    curTime.setTime(curTime.getTime() + diffTime);

    var curHour = curTime.getHours();
    var curMinute = curTime.getMinutes();
    var curSecond = curTime.getSeconds();

    curMinute = (curMinute < 10 ? '0' : '') + curMinute;
    curSecond = (curSecond < 10 ? '0' : '' ) + curSecond;
    curHour = (curHour < 10 ? '0' : '') + curHour;

    var res = curHour + ':' + curMinute + ':' + curSecond;
    $('#server_clock').html(res);
    $('#cur_server_clock').html(res);

    setTimeout(function(){update_server_clock(diffTime);}, 500);
}
