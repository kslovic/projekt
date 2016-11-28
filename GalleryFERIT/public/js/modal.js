// Get the modal
var modal = document.getElementById("myModal"+i);

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg"+i);
var modalImg = document.getElementById("img"+i);
var captionText = document.getElementById("caption"+i);
var edLink=document.getElementById("edit"+i);
var delLink=document.getElementById("delete"+i);
var desc=document.getElementById("description"+i);
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = $(this).data('src');
    captionText.innerHTML = $(this).data('title');
   desc.innerHTML = $(this).data('description');
   edLink.href=$(this).data('elink');
   delLink.href=$(this).data('dlink');
};

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
};


