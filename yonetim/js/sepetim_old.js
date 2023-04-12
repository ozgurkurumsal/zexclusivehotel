import CartManager from './cart.js';
export default class Sepetim { 
    formElement = document.querySelector('#form');
    continue = document.querySelector('.btn-continue');
    clear = document.querySelector('.btn-clear');
    checkout = document.querySelector('.btn-shopping-checkout');
    // removeItem = document.querySelectorAll('.action-remove');
    tableBody = document.querySelector('#tableBody');  
    update = document.querySelector('.btn-update');
    // subTotal = document.querySelector('#subTotal');
    total = document.querySelector('#total');
   
        

    constructor() {
        this.formElement.onsubmit  = function (e) {
            
            e.preventDefault();
        }
       

       
        this.update.addEventListener('click', this.updateData.bind(this),false);
        this.continue.addEventListener('click', this.gotoIndex.bind(this),false);
        this.clear.addEventListener('click', this.clearData.bind(this),false);
        // this.clear.onclick = this.clearData;
        this.checkout.onclick = this.gotoPayment;
           
        // this.continue.onclick = this.gotoIndex;
        
        // this.update.addEventListener('click',this.updateData);
        // document.addEventListener("click", this.updateData.bind(this), false);
        // document.attachEvent("onclick", this.updateData.bind(this));
        // this.clear.addEventListener('click',this.clearData);
        
        // this.clear.onclick = this.clearData;
        // this.checkout.onclick = this.gotoPayment;
           


      
        
        
        this.showData();

    }

    showData() {
        
        this.tableBody.innerHTML = '';
        fetch("get.php", {
  
            method: "GET"
 
        })
            .then(response => response.json())
            .then(result => {
                console.log(result);
                result.forEach(function (element) {

                    tableBody.innerHTML += `<tr>
                                            <td class="tb-image"><a href="#" class="item-photo"><img src="${element.Resim}" alt="cart"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="#">${element.UrunAdi}</a></div>
                                            </td>
                                            <td class="tb-price">
                                                <span class="price">${parseFloat(element.TutarKar).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')} ${element.DovizKuru}</span>
                                            </td>
                                            <td class="tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                                        <input type="text" data-value="${element.UrunId}" name="qty" value="${element.Sayi}" title="Qty" class="input-text qty text" size="1">
                                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">${parseFloat(element.Toplam).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')} ${element.DovizKuru}</span>
                                            </td>
                                            <td class="tb-remove">
                                                <a href="#" class="action-remove"><span><i class="fa fa-times" aria-hidden="true" data-value="${element.UrunId}"></i></span></a>
                                            </td>
                                        </tr>`;
      
                    
                    
                                      
                });

                if(result.length >0){                    
                    // subTotal.innerHTML = result[0].GenelToplam+' '+result[0].DovizKuru;
                    total.innerHTML = result[0].GenelToplam + ' ' + result[0].DovizKuru;

                    const removeItem = document.querySelectorAll('.action-remove');
   
                    removeItem.forEach(element => {
                        element.addEventListener('click', (e) => this.deleteData(e));
                        
                  
                    });
                } else {
                    // subTotal.innerHTML = ''
                    total.innerHTML = '';
        
                }
            })
            .catch(function (err) {

                console.log(err);
  
  
            });
        
           


    }
    
    gotoIndex() {
        location.href ='index.php';
    }
    gotoPayment() {
        console.log('Payment');
        location.href ='kart.php';
    }

    
    clearData(){
        
        console.log("clear data");
            fetch("clear.php", {
      
                method: "POST",
                // body: JSON.stringify({
                //     "urunId" : e.target.dataset.value
                // })
            })
            .then((response) => response.json())
                .then(result => { console.log(result); })
            .catch(function (err) {
                console.log(err);
            })
        
            this.gotoIndex();
           
         
    }
    updateData() {
        
        let urunler = [];
        let inputs = document.getElementById("form").elements;

        for(let i = 0; i < inputs.length; i++) {
             if (inputs[i].nodeName === "INPUT" && inputs[i].type === "text") {
                 urunler.push({ urunId: inputs[i].dataset.value, adet: inputs[i].value });
             }
        }
        
        console.log(JSON.stringify(urunler));
        fetch("update.php", {
      
                method: "POST",
                 body: JSON.stringify({
                     "urunler" : urunler
                 })
            })
            .then((response) => response.json())
                .then(result => { console.log(result); })
            .catch(function (err) {
                console.log(err);
            })

        this.showData();
        // location.reload();
        let Cart = new CartManager({ adi: '', urunId: '', adet:'', paraBirimi:''});                      
        Cart.getData();

        
       
  
    };
    deleteData(e) {
        console.log('Silme İşlemleri yapılacak');
        console.log(e.target.dataset.value);
        // console.log(e);
        // console.log(e.target.closest('tr').remove());
        // this.showData();

        fetch("delete.php", {
  
            method: "POST",
            body: JSON.stringify({
                "urunId" : e.target.dataset.value
            })
        })
        .then(response => response.json())
            .then(result => {
                this.showData();
                let Cart = new CartManager({ adi: '', urunId: '', adet:'', paraBirimi:''});                      
                Cart.getData();
        })
        .catch(function (err) {
            console.log(err);
       })

}
}


