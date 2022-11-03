var checkbox = document.getElementById("checkbox");
var Beoordeeld = document.getElementById("Beoordeeld");
var WhatChecked = '';
checkbox.addEventListener('change', function(){
    if(this.checked){
        Beoordeeld.style.visibility = 'visible';
    } else {
        Beoordeeld.style.visibility = 'hidden';
    }
});