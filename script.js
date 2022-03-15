function doDate()
{
    date = new Date()
    document.getElementById('local-time').innerHTML = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
}
setInterval(doDate, 1000);