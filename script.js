function doDate()
{
    date = new Date()
    myHour = '0' + date.getHours();
    myMinute = '0' + date.getMinutes();
    mySeconds = '0' + date.getSeconds();
    document.getElementById('local-time').innerHTML = myHour.slice(-2) + ':' + myMinute.slice(-2) + ':' + mySeconds.slice(-2);
}
setInterval(doDate, 1000);
window.onload = countdown;

var totalTime = 1800;

function countdown() {
    let minutes = Math.floor(totalTime / 60);
    let seconds = totalTime - (minutes * 60);
    document.getElementById('countdown').innerHTML = minutes + " minutos y " + seconds + " segundos";
    if(totalTime==0){
        alert('Final');
    }else{
        totalTime-=1;
        // setTimeout("countdown()",1000);
    }
}
setInterval(countdown, 1000);