let data1 = document.getElementById("btn1");
let casellaNome = document.getElementById("casellaNome");
let casellaCognome = document.getElementById("casellaCognome");
let userCasella = document.getElementById("casellaUser");
let pws = document.getElementById("pws1");
let cm = document.getElementById("menu_tendina");
let p = document.getElementById("data");

data1.addEventListener("click", getData);

let nome;
let cognome;
let username;
let password;
let comune;

function getData(){
    nome = casellaNome.value;
    cognome = casellaCognome.value;
    username = userCasella.value;
    password = pws1.value;
    comune = cm.value;

    setPage();
}

function setPage(){
    let div = document.getElementById("information");
    div.innerHTML = "";

    let divName = document.createElement("div");
    divName.innerHTML = "Nome: " + nome + "<br>";
    let divSurname = document.createElement("div");
    divSurname.innerHTML = "Cognome: " + cognome + "<br>";
    let divMail = document.createElement("div");
    divMail.innerHTML = "Mail: " + username + "<br>";
    let cityDiv = document.createElement("div");
    cityDiv.innerHTML = "Comune: " + comune + "<br>";
    div.appendChild(divName);
    div.appendChild(divSurname);
    div.appendChild(divMail);
    div.appendChild(cityDiv);
}