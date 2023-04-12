export default class AltKategori{

    constructor() {
        console.log('KATEGORİ CREATED');
    }
    list() {
        window.table =  document.getElementById('table').getElementsByTagName('tbody')[0];
        window.adi = document.getElementById("adi");
        window.inputId2 = document.getElementById("inputId2");
        window.inputId = document.getElementById("inputId");
      
       
        table.innerHTML = '';
        fetch('./services/anamenu.php')
            .then(response => response.json())
            .then(commits => {
            
                commits.forEach(element => {
                    table.innerHTML += `<tr>
                                        <td>${element.id}</td>
                                        <td><span>${element.MenuBaslik}</span></td>
                                         <td><span class="text-info">${element.hytAnaKategori}</span></td>
                                        <td><span class="badge badge-success">${element.Status}</span></td>
                                        <td><button id="${element.id}" type="button" class="btn btn-outline-secondary"onclick="anamenu.edit(this);">Düzenle</button></td>
                                        <td><button id="${element.id}" type="button" class="btn btn-outline-danger"onclick="anamenu.remove(this);">Sil</button></td>
                                        </tr>`;
                });
            });
    }
    add() {
        inputId2.value = ''; 
        $('#defaultModal').modal('show');
    }
    edit(e) {
        // const inputId = document.getElementById("inputId2");
        inputId2.value = e.parentNode.parentNode.childNodes[1].innerText; 
        adi.value = e.parentNode.parentNode.childNodes[3].innerText;
        $('#defaultModal').modal('show');
    }
    remove(e) {
        smallModalLabel.innerText = e.parentNode.parentNode.childNodes[3].innerText;
        inputId.value  = e.parentNode.parentNode.childNodes[1].innerText;
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
