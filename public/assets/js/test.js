var request = new XMLHttpRequest();
request.open('GET','https://www.remax.co.id/prodigy/papi/listing',false);
request.onreadystatechange = processRequest;

request.send();

function processRequest(e){
    if (request.readyState === 4) {
        if (request.status === 200) {
            document.body.className = 'ok';
            var response = JSON.parse(request.responseText);
            console.log(response);
        } else {
            document.body.className = 'error';
        }
    }
}
response.send();

for(i =0; i < response.length; i++){
    console.log(response[i].data);
}



