document.getElementById("school1").addEventListener("mouseover", mouseOver1);
document.getElementById("school1").addEventListener("mouseout", mouseOut1);
document.getElementById("school2").addEventListener("mouseover", mouseOver2);
document.getElementById("school2").addEventListener("mouseout", mouseOut2);

function mouseOver1() {
  document.getElementById("school1").style.color = "white";
}

function mouseOut1() {
  document.getElementById("school1").style.color = "black";
}

function mouseOver2() {
  document.getElementById("school2").style.color = "white";
}

function mouseOut2() {
  document.getElementById("school2").style.color = "black";
}
