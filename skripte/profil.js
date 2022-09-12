function pretragaKurseva(){
    var kursevi=document.getElementById('divKursevi');

    var naslov=document.getElementById('pretragaNaslov');
    var podnaslov=document.getElementById('pretragaPodnaslov');
    var minCijena=document.getElementById('pretragaMinCijena');
    var maxCijena=document.getElementById('pretragaMaxCijena');
    var vrijemeTrajanja=document.getElementById('pretragaVrijemeTrajanja');

    var xhr=new XMLHttpRequest();

    xhr.onreadystatechange=function ()
    {
        if(this.status===200 && this.readyState===4)
            kursevi.innerHTML=this.responseText;
    }

    xhr.open('GET', 'pretragaKurseva.php?naslov='+naslov.value+'&podnaslov='+podnaslov.value+'&minCijena='+minCijena.value+'&maxCijena='+maxCijena.value+'&vrijemeTrajanja='+vrijemeTrajanja.value);
    xhr.send();
}

function promjenaStanjaMaterijala(idMaterijal) {
    var div=document.getElementById('divZavrsen');
    var xhr=new XMLHttpRequest();

    xhr.onreadystatechange=function ()
    {
        if(this.status===200 && this.readyState===4)
        {
            div.innerHTML='<img src="../slike/zavrsen.jpg" alt="Zavrsen" width="5%" height="5vh">';
        }
    }
    
    xhr.open('GET', 'promjenaStanjaMaterijala.php?id='+idMaterijal);
    xhr.send();
}

function povratakNaProfil(){
    window.location="profil.php";
}

