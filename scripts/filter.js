function filter(targetElement) {
    console.log("FunctionPop called");
    var popup = document.getElementById(targetElement); 
    popup.classList.toggle("show");
  
  }

  
  function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }