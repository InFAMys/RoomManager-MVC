let x = document.querySelectorAll(".fTarif");

for (let i = 0, len = x.length; i < len; i++) {
  let num = Number(x[i].innerHTML).toLocaleString("en");
  let s = num.replace(/\,/g, ".");
  x[i].innerHTML = s;
  x[i].classList.add("currSign");
}
