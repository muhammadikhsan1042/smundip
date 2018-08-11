var _root = window.location.hostname;

function loadData(key, val, tujuan) {
  location.href = tujuan+key+'='+val;
}

function href(tujuan='') {
  location.href = "/"+tujuan;
}

function goTo(tujuan) {
  window.open(tujuan, '_blank');
}

function search(delegasi, link) {
  goTo = document.getElementById(delegasi).value;
  return href(link+goTo);
}

function liveChange(cek, nilai, tujuan) {
  var x = cek.value;
  var y = document.getElementById(tujuan);
  if (x == nilai) {
    y.classList.add("hidden");
  }else {
    y.classList.remove("hidden");
  }
}

function liveChange_2(cek, nilai, tujuan_salah, tujuan_benar) {
  var x = cek.value;
  var y = document.getElementsByClassName(tujuan_salah);
  var z = document.getElementsByClassName(tujuan_benar);
  if (x == nilai) {
    for (var i = 0; i < y.length; i++) {
      y[i].classList.add("hidden");
      z[i].classList.remove("hidden");
    }
  }else {
    for (var i = 0; i < y.length; i++) {
      z[i].classList.add("hidden");
      y[i].classList.remove("hidden");
    }
  }
}
