document.querySelector("#show_medias").onclick = function() {
    if (window.getComputedStyle(document.querySelector('#medias')).display=='none'){
        document.querySelector("#medias").style.display="block";
    } else {
            document.querySelector("#medias").style.display="none";
        }
    }

