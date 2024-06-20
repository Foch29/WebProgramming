console.log("dentro weather hubAQ.js")

console.log("URL DA PHP " +url_AV)


function onJson(json){
    let json_formatted =JSON.stringify(json)
    json_formatted =JSON.parse(json_formatted)
    //let json_formatted =JSON.parse(json)
    console.log(json_formatted)
    let aq_value= json_formatted.data.current.pollution.aqius;
    let air_quality;
    if(aq_value < 50){
        air_quality = "Great";
    }
    else if(aq_value >50 && aq_value < 300){
        air_quality = "Average";
    }
    else{
        air_quality = "Hazardous";
    }

    console.log(aq_value + " air quality: " + air_quality)
    
}

fetch(url_AV).then(response => {
    if (!response.ok) {
        // Handle non-2xx responses
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json(); // Parse the JSON response
    //return response;
}).then(onJson);