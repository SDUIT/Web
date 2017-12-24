var flag = false;

function onClick(){
	if( flag  )
	{	
		console.log("Clicked");
        flag = false;
    }
    else {
    	 console.log("Unclicked");
         flag = true;
    }
}

const button = document.querySelector('button');
button.addEventListener('click', onClick() ); 
