export default class Rezervasyonlar{

    constructor() {
        console.log('Rezervasyonlar CREATED');
    }
    list() {
        // window.table =  document.getElementById('table').getElementsByTagName('tbody')[0];
        window.adi = document.getElementById("adi");
        window.inputId2 = document.getElementById("inputId2");
        window.inputId = document.getElementById("inputId");
      
       
        // table.innerHTML = '';
        // fetch('./services/urunler.php')
        //     .then(response => response.json())
        //     .then(commits => {
            
        //         commits.forEach(element => {
        //             table.innerHTML += `<tr>
        //                                 <td>${element.id}</td>
        //                                 <td><span class="text-info">${element.UrunAdi}</span></td>
        //                                 <td><span>${element.AnaKategori}</span></td>
        //                                 <td><span>${element.AraKategori}</span></td>
        //                                 <td><span class="badge badge-${element.Stok > 0 ? 'success':'danger'}">${element.Stok}</span></td>
        //                                 <td><button id="${element.id}" type="button" class="btn btn-outline-secondary"onclick="urunler.edit(this);">Düzenle</button></td>
        //                                  <td><button id="${element.id}" class="btn btn-danger btn-sm" onclick="urunler.remove(this);"><i class="icon-trash"></i></button></td>
        //                                 </tr>`;
        //         });
        //     });
    }
    add() {
        inputId2.value = ''; 
        $('#defaultModal').modal('show');
    }
    edit(e) {
        //  console.log(e);
        // console.log(e.closest('tr'));
        // console.log(e.closest('tr').childNodes[0].innerText);
        // const urunid = e.closest('tr').childNodes[0].innerText;
        
        loadPage('urunEkle',e);

    }
    remove(e) {
        console.log(e);
        console.log(e.closest('tr').childNodes[0].innerText);
        smallModalLabel.innerText = e.parentNode.parentNode.childNodes[4].innerText;
        inputId.value  = e.parentNode.parentNode.childNodes[2].innerText;
        $('#smallModal').modal('show');
    }
    deleteItem() {
        fetch('./services/anamenu.php', {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({id: inputId.value})
            }).then(res=>res.json())
            .then(res => {
                $('#smallModal').modal('hide');
                this.list();
            });
    }   

    save() {
        // const inputId = document.getElementById("inputId2");
        console.log(adi.value, inputId.value);
        fetch('./services/anamenu.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({name: adi.value,id:inputId2.value})
        }).then(res=>res.json())
            .then(res => {
                console.log(res);
                $('#defaultModal').modal('hide');
                this.list();
            });
    }
}
