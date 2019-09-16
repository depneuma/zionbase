function showDiv(elem){
	
	document.getElementById('mediaurl').style.display = "none";
	  document.getElementById('mediaimg').style.display = "none";
	   document.getElementById('mediamp3').style.display = "none";  
   if(elem.value == "image")
   {
      document.getElementById('mediaurl').style.display = "none";
	  document.getElementById('mediaimg').style.display = "block";
	   document.getElementById('mediamp3').style.display = "none";
   }
   else if(elem.value == "video")
   {
      document.getElementById('mediaurl').style.display = "block";
	  document.getElementById('mediaimg').style.display = "none";
	   document.getElementById('mediamp3').style.display = "none";
   }
   else if(elem.value == "mp3")
   {
      document.getElementById('mediaurl').style.display = "none";
	  document.getElementById('mediaimg').style.display = "none";
	   document.getElementById('mediamp3').style.display = "block";
   }
   else
   {
	   document.getElementById('mediaurl').style.display = "none";
	  document.getElementById('mediaimg').style.display = "none";
	   document.getElementById('mediamp3').style.display = "none";
   }
   
   
}


$(function() {
    $('#row_dim').hide(); 
    $('#media_type').change(function(){
        if($('#media_type').val() == 'image') {
			
            $('#mediaurls').hide();
			$('#mediamp3').hide(); 
			$('#mediaimg').show();
        } 
		else if($('#media_type').val() == 'mp3') {
			
            $('#mediaurls').hide();
			$('#mediamp3').show(); 
			$('#mediaimg').hide();
        }
		else if($('#media_type').val() == 'video') {
			
            $('#mediaurls').show();
			$('#mediamp3').hide(); 
			$('#mediaimg').hide();
        }
		else
		{
			$('#mediaurls').hide();
			$('#mediamp3').hide(); 
			$('#mediaimg').hide();
		}
		
		
		
		
		
    });
});


