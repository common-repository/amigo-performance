function openTab(evt, tabName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function getSelectedValues(ele,output,preval) {

    let  selected = new Array();

    var chks = ele.getElementsByTagName("INPUT");

    for (var i = 0; i < chks.length; i++) {
        if (chks[i].checked) {
            selected.push(chks[i].value);
        }
    }
    output.value = selected.join(',');
};

function setRemoveJsCss(ele,handle) {
    let jc   = document.querySelector(ele);
    let jh   = document.querySelector(handle);
    var chks = jc.getElementsByTagName("INPUT");
    for (var i = 0; i < chks.length; i++) { 
        if(jh.value.includes(chks[i].value)) {
            chks[i].checked = true;
        }
    }
}

setRemoveJsCss('#jsContainer','#js_handle')
setRemoveJsCss('#cssContainer','#css_handle')