function doDate()
{
    date = new Date()
    myHour = '0' + date.getHours();
    myMinute = '0' + date.getMinutes();
    mySeconds = '0' + date.getSeconds();
    document.getElementById('local-time').innerHTML = myHour.slice(-2) + ':' + myMinute.slice(-2) + ':' + mySeconds.slice(-2);
}
setInterval(doDate, 1000);