
function onJson(data){

    
 
    console.log(data)
    let count = get_count(data); 
    console.log(count);
    for(let j = 6; j > 0; j--){
        past_day =date_to_numbers(subtract_n_Days(j)) // ritorna la data di 6,5,...,1 giorno fa
        
        for(let i = 0; i < count; i++){         //itera le istanze prese col json
            
            full_date = data.results[i].date;
            datatype = data.results[i].datatype; 
            
            date_formatted = full_date.split("T")[0];//le date nel json hanno questo formato 2024-06-12T00:00:00 quindi 
                                                     //taglio dopo T. 
            const parts = date_formatted.split('-');

                                            
            if (parts[1].startsWith('0')) {             //per formattare le date rimuovo lo zero nei mesi tipo
                parts[1] = parts[1].substring(1);           //giugno 2024-06-17 -> 2024-6-17
            }
            date_formatted= parts.join('-');

            value = data.results[i].value
            //console.log("past day in esamina: " + past_day)
            //console.log("data,datatype,value fetchati: " + date_formatted + " " + datatype + " " + value)

            if(date_formatted === past_day && datatype === "PRCP" && value >0 ){ //se nel giorno j  il valore delle
                rain[j-1] = true;                                                  //  precipitazioni é > 0 segna 
                                                                                 // rain[j] = True
            }
            //console.log("esito = " + rain[j-1])
            
        }
        
    }
    let sum = 0
    
    for(let i = 0;i<6; i++){
        
        if(rain[i] === true){ //ogni giorno con pioggia ha un true. Li sommiamo per sapere numero di giorni con pioggia
            sum++;             // su 5 considerati. 
        }
        
    }
    show_results(rain);
    console.log("vettore rain = " + rain)
    const div_container = document.getElementById("container_results");
    
    if(sum > 1){
        console.log("dentro l'if si" + sum)
        console.log("Funghi") //Se ha piovuto piú di 2 gionri su 5 ritorno true, buon clima per cercare funghi
        const yes = document.getElementById("yes_div");
        yes.classList.remove("hidden");
    }
    else{
        console.log("Non ha piovuto abbastanza")
        const no = document.getElementById("no_div");
        no.classList.remove("hidden");
    }
}

function subtract_n_Days(n) {   //prende il numero di giorni da rimuovere e restituisce l'oggetto date corrispondente
    const five_days_ago = new Date();
    five_days_ago.setDate(five_days_ago.getDate() - n);
    return five_days_ago;
  }

function date_to_numbers(date){   //prende un oggetto Date e ritorna una data in formato yy-mm-dd
    let month = date.getUTCMonth() + 1; 
    let day = date.getUTCDate();
    let year = date.getUTCFullYear();
    return year + "-" + month + "-" + day
}


function get_count(json){   //fa la query per dichiarare limit = numero di elementi. Se > 100 impone limit a 100
    count = json.metadata.resultset.count;
    if(count>100){
        count = 100;
    }
    return count;
}

function onJson2(onJson){
    console.log(onJson)
}

let rain = new Array(6).fill(false); // contiene 5 boolean che indicano se ha piovuto nei 6,5,...,1 giorni fa
let decoded_json = JSON.parse(json_da_php);
console.log(decoded_json);
onJson(decoded_json);  
const da_riempire = document.getElementById("da_riempire"); 
let videoElement = document.createElement('video');
    videoElement.controls = true;  
    
    let sourceElement = document.createElement('source');
    sourceElement.src = videoUrl;  
    sourceElement.type = 'video/mp4';
    videoElement.appendChild(sourceElement);//

    da_riempire.appendChild(videoElement);         

//per fare fetch dei codici delle cittá 
//onJson2(decoded_json);
//cancella dopo qui se non funziona


function show_results(rain){

    const container = document.getElementById('container_results');
    container.classList.remove("hidden");
    const div = []
    for(let i = 6;i>0;i--){
        if(rain[i] === true){
            div[i] = document.getElementById("div_rain" + i);
            div[i].classList.remove("hidden");
        }
        else{
            div[i] = document.getElementById("div_sun" + i);
            div[i].classList.remove("hidden");
        }
    }
    for(let i = 5;i>0;i--){
        
        if(div[i].id.startsWith("div_rain")){
            const container_days= document.getElementById("container_days");
            const to_be_replaced = document.getElementById("div_sun" + i)
            container_days.replaceChild(div[i], to_be_replaced);
            
        }  
        
    }
    
    
}



//setTimeout(function(){
//    show_results()
//},3000);

