const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const token = urlParams.get('token')
const searchdate1 =  document.getElementById('searchdate1');
const searchdate2 = document.getElementById('searchdate2');
const adult = document.getElementById('adult');
const child = document.getElementById('child');
const totalPrice = document.getElementById('totalPrice');
const inputPrice = document.getElementById('inputPrice');
const inputRoomId = document.getElementById('inputRoomId');
const inputRoomName = document.getElementById('inputRoomName');
const inputAdult = document.getElementById('inputAdult');
const inputChild = document.getElementById('inputChild');
const inputstartDate = document.getElementById('inputStartDate');
const inputendDate = document.getElementById('inputEndDate');
const title = document.getElementById('title');
const detail = document.getElementById('detail');
const comment = document.getElementById('comment');


if(localStorage.getItem('id') == null) {
    const pass = [...crypto.getRandomValues(new Uint8Array(8))].map((x,i)=>(i=x/255*61|0,String.fromCharCode(i+(i>9?i>35?61:55:48)))).join``;
    localStorage.setItem('id', pass);
};

    const now = new Date();

    const item = {
        value: localStorage.getItem('id'),
        expiry: now.getTime() + 3600000, // 1 saat
    }
    localStorage.setItem('myKey', JSON.stringify(item));


        const data = { 
            token: token
    
        };

        fetch('services/checkout.php', {
            method: 'POST', 
            // headers: {
            //     'Content-Type': 'application/json',
            // },
            body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                
                searchdate1.innerText = data.date1;
                searchdate2.innerText = data.date2;
                adult.innerText = data.adult;
                child.innerText = data.child;
                totalPrice.innerText = data.odaBilgileri[0].fiyat+' TL';
                inputPrice.value = data.odaBilgileri[0].fiyat;
                inputAdult.value = data.adult;
                inputChild.value = data.child;
                inputRoomId.value   = data.odaBilgileri[0].odaId;
                inputRoomName.value   = data.odaBilgileri[0].odaAdi;
                inputstartDate.value   = data.date1;
                inputendDate.value   = data.date2;
                rezCode.value = localStorage.getItem('id');
                title.innerHTML   = data.odaBilgileri[0].odaAdi;
                comment.innerHTML = data.odaBilgileri[0].aciklama;
                detail.innerHTML = data.odaBilgileri[0].detay;
                room1Img.src = 'uploads/'+data.odaBilgileri[0].resim1;
                room1Img.dataset.resim = 'uploads/'+data.odaBilgileri[0].resim1;
                room1Link.href = 'uploads/'+data.odaBilgileri[0].resim1;
                room2Img.src = 'uploads/' + data.odaBilgileri[0].resim2;
                room2Img.dataset.resim = 'uploads/' + data.odaBilgileri[0].resim2;
                room2Link.href = 'uploads/'+data.odaBilgileri[0].resim2;
                

            })
            .catch((error) => {
            console.error('Error:', error);
            });
        

