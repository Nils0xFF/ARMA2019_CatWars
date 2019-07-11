function fancyTimeFormat(time)
{   
    // Hours, minutes and seconds
    let hrs = ~~(time / 3600);
    let mins = ~~((time % 3600) / 60);
    let secs = ~~time % 60;

    // Output like "1:01" or "4:03:59" or "123:03:59"
    let ret = "";

    if (hrs > 0) {
        ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
    }

    ret += "" + mins + ":" + (secs < 10 ? "0" : "");
    ret += "" + secs;
    return ret;
}

function run(){
    document.querySelectorAll('.progress').forEach(progressDiv => {

        console.log(progressDiv.getAttribute('data-startTime'));
        const startDate = new Date(progressDiv.getAttribute('data-startTime') * 1000);
        const endDate = new Date(progressDiv.getAttribute('data-endTime') * 1000);
        const currentDate = new Date();


        const duration = (endDate - startDate) / 1000;
        const timeElapsed = (currentDate - startDate) / 1000;
        const timeRemaing = (endDate - currentDate) / 1000;

        if(timeRemaing <= 1){
            progressDiv.querySelector('.quest-progress').innerHTML = "Ready";
            progressDiv.parentElement.querySelector('.completeButton').classList.remove('disabled');
            progressDiv.querySelector('.quest-progress').style.width = "100%";
        }else{


            progressDiv.querySelector('.quest-progress').style.width = (timeElapsed / duration) * 100 + '%';


            progressDiv.querySelector('.quest-progress').innerHTML = fancyTimeFormat(timeRemaing);

            progressDiv.parentElement.querySelector('.completeButton').classList.add('disabled');
        }


    });
};

run();
window.setInterval(run, 1000);