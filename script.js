function doDate()
{
    var now = new Date();
    document.getElementById('local-time').innerHTML = now;
}
setInterval(doDate, 1000);