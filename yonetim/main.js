import anamenu from './modules/anamenu.js';
import kategori from './modules/kategori.js';
import altKategori from './modules/altKategori.js';
import urunler from './modules/urunler.js';
import rezervasyonlar from './modules/rezervasyonlar.js';
import urunEkle from './modules/urunEkle.js';

async function loadPage(page,param = null) {

console.log(page,param);

const loadPageContent = document.querySelector('#loadPageContent');

    //   eval( "window."+page+" = new " + page + "();");
if (param == null) {
    eval("window."+page+" = new " + page + "({});");

} else {
    eval("window."+page+" = new " + page + "("+'{id:'+param+"});");

}
    
loadPageContent.innerHTML = await (await fetch('view/' + page + '.html')).text();


    
var scripts = loadPageContent.getElementsByTagName("script");
for (var i = 0; i < scripts.length; i++) {
eval(scripts[i].innerText);
}

};

window.loadPage = loadPage;


loadPage('rezervasyonlar');
