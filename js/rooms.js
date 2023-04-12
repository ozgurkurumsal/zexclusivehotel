// "use strict";

const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

let searchdate1 = urlParams.get('searchdate1')
let searchdate2 = urlParams.get('searchdate2')
let adult = urlParams.get('yetiskin')
let child = urlParams.get('cocuk')
const wrapper = document.getElementsByClassName('wrapper')

if (searchdate1 != undefined) {
    document.getElementsByName('searchadult')[0].value = adult;
    document.getElementsByName('searchchildren')[0].value = child;
} else {
    searchdate1 = new Date()
    // let tomorrow = new Date()
    searchdate2 = new Date(); //--tomorrow.setDate(tomorrow.getDate() + 1)
    searchdate2.setDate(searchdate2.getDate() + 1);
    // d.setDate(d.getDate() + 50);
    searchdate1 = searchdate1.toLocaleDateString();
    searchdate2 = searchdate2.toLocaleDateString();

    // console.log(searchdate1);
    // console.log(searchdate2);
    // let today = new Date()
    // console.log(searchdate2.toLocaleDateString());
    // console.log(tomorrow.toLocaleDateString);

    // searchdate2 = searchdate2.toLocaleDateString();
    adult = 1;
    child = 0;
document.getElementsByName('searchadult')[0].value = 1;
document.getElementsByName('searchchildren')[0].value = 0;

}

const data = { 
    searchdate1: searchdate1,
    searchdate2: searchdate2,
    adult: adult,
    child: child,
};
// console.log(data);

  fetch('services/rooms.php', {
    method: 'POST', 
    // headers: {
    //     'Content-Type': 'application/json',
    // },
    body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(element => {
            wrapper[2].insertAdjacentHTML('beforeend', `
            <div class="roomList">

                        <div class="img">

                            <div class="owl-roomGallery photoGallery">

                                <div class="item">

                                    <a href="uploads/${element.resim1}">

                                        <img class="img-fluid" src="uploads/${element.resim1}" alt="Room 1" data-resim="uploads/${element.resim1}" />

                                    </a>

                                </div>

                                <div class="item">

                                    <a href="uploads/${element.resim2}">

                                        <img class="img-fluid" src="uploads/${element.resim2}" alt="Room 2" data-resim="uploads/${element.resim2}" />

                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="desc">

                            <div class="text">

                                <strong class="title">${element.odaAdi}</strong>

                                <span class="subTitle">3+1 Havuzlu 35m2</span>

                                <span>

                                    ${element.aciklama}

                                </span>

                                <b>ODA DETAY</b>

                                <p>

                                    ${element.detay}

                                </p>

                                <ul class="listIcon">

                                    <li>

                                        <i class="icon1"></i>

                                        <span>35m²</span>

                                    </li>

                                    <li>

                                        <i class="icon2"></i>

                                        <span>Klima</span>

                                    </li>

                                    <li>

                                        <i class="icon3"></i>

                                        <span>Telefon</span>

                                    </li>

                                    <li>

                                        <i class="icon4"></i>

                                        <span>Saç Kurutma</span>

                                    </li>

                                </ul>

                            </div>

                            <div class="priceButton">

                                <span>${element.fiyat}₺</span>

                                <a href="#" id="${element.odaId}"  onclick="reservation(this)">

                                    REZERVASYON YAP

                                </a>

                            </div>

                        </div>

                    </div> 

            `);

            


            
        });

    
        console.log('Success:', data);
    })
    .catch((error) => {
    console.error('Error:', error);
    });


function reservation(e) {

    
    localStorage.clear();

    var reservation = { 'id': e.id, 'data': data };

    
    localStorage.setItem('reservation', JSON.stringify(reservation));

    // Retrieve the object from storage
    var retrievedObject = localStorage.getItem('reservation');

    // console.log('retrievedObject: ', JSON.parse(retrievedObject));

//     var encodedString = btoa(JSON.stringify(reservation));
    
//    var decodedString = atob(encodedString);
//    console.log(decodedString); 

    window.location = 'rezervasyon.html?token=' + btoa(JSON.stringify(reservation));

}


