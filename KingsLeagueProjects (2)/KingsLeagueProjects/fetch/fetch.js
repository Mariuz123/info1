let body = document.body;
let pres;

let name1 = document.getElementsByClassName("nome");
let team = document.getElementsByClassName("squadra");
let img = document.getElementsByClassName("img");

async function onClick() {
    let risposta = await fetch("fetch.json").then(res => funz1(res));
    pres = risposta.presidenti;
    for(let i = 0; i < pres.length; i++){
        dataPrinter(pres[i].nome, name1[i], pres[i].squadra, team[i], pres[i].link, img[i])
    }
}

function funz1(dati){
    return dati.json();
}

function dataPrinter(nome, tdNome, squadra, tdSquadra, link, tdImg){
    cleaner(tdNome, tdSquadra, tdImg);
    tdNome.innerHTML = nome;
    tdNome.style.textAlign = "center";
    tdSquadra.innerHTML = squadra;
    tdSquadra.style.textAlign = "center";
    
    let img = document.createElement("img");
    img.src = link;
    img.alt = "ERRORE";
    img.style.width = "80px";
    img.style.height = "80px";
    tdImg.style.textAlign = "center";
    tdImg.appendChild(img);
}

function cleaner(nome, squadra, img){
    nome.innerHTML = "";
    squadra.innerHTML = "";
    img.innerHTML = "";
}
