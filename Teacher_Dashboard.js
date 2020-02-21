
var x = document.getElementById("Upload-assignment");
var y = document.getElementById("Check-assignment");
function upload()
 {
    if (x.style.display === "none") 
    {
      x.style.display = "block";
      y.style.display = "none";
    } 
  }
  function check()
   {
    
    if (y.style.display === "none")
     {
      y.style.display = "block";
      x.style.display = "none"
     } 
  }