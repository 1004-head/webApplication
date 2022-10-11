window.onload = function(){
    //Edit here
   
    var images = document.querySelectorAll(".artThumb");

    for(var i=0; i<images.length; i++){
        var imgName = images[i].src;

        let span = document.createElement("span");
        span.setAttribute("style", "padding:2px; border:solid 1px; display:flex; align-items:center; position:absolute;");
        span.style.backgroundColor = "white";
        let img = document.createElement("img");
        img.setAttribute("src", imgName);
        img.setAttribute("width", "100em");
        img.setAttribute("style", "border:solid 1px;");
        
        images[i].onmouseover = function(){
            span.appendChild(img);
            this.parentNode.appendChild(span);
        }
        images[i].onmouseout = function(){
            span.removeChild(img);
            this.parentNode.removeChild(span);
        }
    }
}