window.addEventListener("load", init, false);

function init() {
    form1.userName.onchange = nameOnChange;
    form1.email.onchange = emailOnChange;
    form1.zip.onchange = zipOnChange;
    form1.onsubmit = onsubmitHandler;
}

function validate(elem, pattern) {
    let res = elem.value.search(pattern);
    if(res == -1) elem.className = "invalid";
    else elem.className = "valid";
}

function nameOnChange() {
    let pattern = /\S/;
    validate(this, pattern);
}

function emailOnChange() {
    let pattern = /\b[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,4}\b/i;
    validate(this, pattern);
}

function zipOnChange() {
    let pattern = /\d{5}/;
    validate(this, pattern);
}

function onsubmitHandler() {
    let invalid = false;
    
    for(let i = 0; i < form1.elements.length; i ++) {
        let e = form1.elements[i];
        
        if(e.type == "text" && e.onchange) {
            e.onchange();
            if(e.className == "invalid") invalid = true;
        }
    }
    if(invalid) {
        alert("Допущены ошибки при заполнении формы");
        return false;
    }
}