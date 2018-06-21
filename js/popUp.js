// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
/*img.onclick = function(){
	modal.style.display = "block";
	modalImg.src = this.src;
	captionText.innerHTML = this.alt;
}*/

function popImg(imageFullPath){
	console.clear(); 
	//console.log(imageFullPath); 
	modal.style.display = "block"; 
	var str = imagesLoadedAlready; 
	var subStr = "," + imageFullPath + ","; 
	if(str.indexOf(subStr) === -1){
		modalImg.src = "images/bx_loader.gif"; 
		jQuery("#loadingDiv").css("display", "inline"); 
		modalImg.src = imageFullPath; 
		jQuery("#loadingDiv").css("display", "none"); 
		imagesLoadedAlready += imageFullPath + ","; 
	} else{
		modalImg.src = imageFullPath.replace("/original/","/"); 
		modalImg.src = imageFullPath; 
	} 
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}