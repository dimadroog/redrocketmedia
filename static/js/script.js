// ajax function for update rating
function doRating(elm) {
    var mark = elm.getAttribute("data-rating")
    var xmlHttp = new XMLHttpRequest();
    var url="../../inc/ajax.php";
    var parameters = "action=do_rating&mark="+mark; // pass a needed action in params 
    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var response = JSON.parse(xmlHttp.responseText);
            // console.log(response);
            document.getElementById("rating-stars").classList.remove("not-voiced");
            document.getElementById("rating-result").innerHTML = response.message;
            document.getElementById("mark"+response.average).checked = true;
            if (response.status == 1) {
                document.getElementById("rating-num").innerHTML = response.count;
            } 
        }
    }
    xmlHttp.send(parameters);
}


// ajax function for clear session
function clearSession() {
    var xmlHttp = new XMLHttpRequest();
    var url="../../inc/ajax.php";
    var parameters = "action=clear_session"; // pass a needed action in params 
    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var response = JSON.parse(xmlHttp.responseText);
            alert(response.message);
            document.location.reload(true);
        }
    }
    xmlHttp.send(parameters);
}


// Progress Bar 
function changeProgressBar(){
    var pb_select = document.getElementById("progress-bar-select");
    var pb_inner = document.getElementById("progress-bar-inner");
    var pb_percent = document.getElementById("progress-bar-percentage");
    var pb_current = document.getElementById("progress-bar-current");

    var value = parseInt(pb_select.options[pb_select.selectedIndex].value);
    var current = parseInt(pb_current.innerHTML);


    var sum = current+value;
    pb_current.innerHTML = sum;

    if (sum <= 100) {
        pb_inner.style.width = sum+'%';
        pb_percent.innerHTML = sum+'%'; 
    } else {
        pb_inner.style.width = '100%';
        pb_percent.innerHTML = '100%';
        var hint = 'You have exceeded the limit of 100% for Progress Bar. Вut we continue to add the entered numbers. <br>Your result is: <b>'+sum+'</b>';
        document.getElementById("progress-bar-result").innerHTML = hint;
    }



    if (sum < 8) {
        pb_percent.style.cssText = 'color: #ffffff; right: -25px; ';
    } else {
        pb_percent.style.cssText = 'color: #383838; right: 10px; ';
    }
}



//VanillaJs Ajax
function getNumberApi() {
    var number = document.getElementById("numbersapi").value;
    if (number.length == '') {
        return;
    }
    var xmlHttp = new XMLHttpRequest();
    var url="../../inc/ajax.php";
    var parameters = "action=number_api&number="+number; // pass a needed action in params 
    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var response = xmlHttp.responseText;
            // console.log(response);
            document.getElementById("numbersapi-result").innerHTML = response;
        }
    }
    xmlHttp.send(parameters);
}

