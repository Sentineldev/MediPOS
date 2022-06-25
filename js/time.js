

//Obtiene la fecha actual y la muestra en un formato especifico.
function dateToString(date){
    let day = String(date.getDate()).padStart(2,'0');
    let month = String(date.getMonth()+1).padStart(2,'0');
    let year = String(date.getFullYear());
    return `${day}/${month}/${year}`
}
//igual que la fecha, toma la fecha y la muestra en un formato especifico.
function timeToString(date){
    let hour = date.getHours(date.getTime());
    let minute = date.getMinutes(date.getTime());
    let second = date.getSeconds(date.getTime());

    if(minute < 10 && second < 10){
        return `${hour}:0${minute}:0${second}`
    }
    else if(minute < 10 && !(second < 10)){
        return `${hour}:0${minute}:${second}`
    }
    else if(!(minute<10) && second < 10){
        return `${hour}:${minute}:0${second}`
    }
    else if(!(minute<10) && !(second<10)){
        return `${hour}:${minute}:${second}`
    }
}



//function de callback para actualizar la hora y la fecha en tiempo real.

function UpdateTime(){
    const date_container = document.querySelector("#date")
    const time_container = document.querySelector("#time")
    const date = new Date()

    date_container.innerText = dateToString(date)
    time_container.innerText = timeToString(date)
}

setInterval(UpdateTime,1000)

UpdateTime()