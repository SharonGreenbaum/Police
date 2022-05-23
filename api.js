console.log('== START ==');

var licensePlateAPI = 'https://license-plate-detection.p.rapidapi.com/license-plate-detection';
var options = {
	method: 'POST',
	headers: {
		'content-type': 'application/json',
		'X-RapidAPI-Host': 'license-plate-detection.p.rapidapi.com',
		'X-RapidAPI-Key': '980ebb5a2fmsh7914801033200bap127f42jsn7442650ca1af'
	},
	body: '{"url":"default"}'
};

var PHP_API = '/Police/checkCar.php?NumberPlate=';
var optionsPHP = {
	method: 'GET',
	headers: {
		'content-type': 'application/json',
		 'Accept': 'application/json',
	}
};



function Myresponse(data){
    this.response = data;
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

const myPlates = [
	"https://i.ibb.co/NK3sjHw/car1.jpg",
	"https://i.ibb.co/MGKNQDt/car1.jpg",
	"https://i.ibb.co/NK3sjHw/car3.jpg"
]

async function checkAll() {
	for (let index = 0; index < myPlates.length; index++ ) {
	    await sleep(5000);
		console.log( "Inspecting plate from URL: " + myPlates[index] );

		options.body = '{"url":"' + myPlates[index] + '"}';

		fetch(licensePlateAPI, options)

			.then(response => response.json())

			.then(response => {
				console.log('License Number:', response[0].value)
				var NumberPlate = response[0].value;
    
    
    		fetch(PHP_API + NumberPlate, optionsPHP)
    			.then(data => data.json())
    			.then(data => {
    			    bootbox.confirm({
    			        message: 'The status of the car is: ' + data.status+ ' and the model is: ' + data.model + ' what do you want to do?',
                		buttons:{
                    		confirm: {
                                label: 'Send to the owner a message',
                                className: 'btn-success'
                               },
                            cancel: {
                                label: 'Nothing for now',
                                className: 'btn-danger'
                            }
        				},
        				callback: function (result){
        				    if(result === true)
        				        var myWindow = window.open("sendticket.php?NumberPlate=" + NumberPlate, "MsgWindow", "width=400,height=400");}
        			
    			    });
    			    
    				console.log('PHP Response:', data)
    			});


				return NumberPlate;
				
			
			})
			.catch(err => console.error(err))

	 await sleep(12000);
	}
}

checkAll();






   
