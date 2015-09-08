function myFunction() {
     if(navigator.userAgent.indexOf("Chrome") != -1 ) 
    {
        window.document.location.href = 'chr.html';
    }
   /* else if(navigator.userAgent.indexOf("Opera") != -1 )
    {
     alert('Opera');
    } */
    else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
    {
         window.document.location.href = 'moz.html';
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
      window.document.location.href = 'ie.html'; 
    }  
    else       //Edge not working
    {
       window.document.location.href = 'edge.html';
       
    }
}
