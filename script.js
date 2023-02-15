function getal(input) {
    document.getElementById("output").innerHTML = input;
}

let cijfer = document.getElementById('cijfer').value;
window.addEventListener("load", getal(cijfer));