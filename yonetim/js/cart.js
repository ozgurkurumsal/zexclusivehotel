export default class CartManager{
    
        
       
    // constructor({ adi, urunId, adet, paraBirimi } ) {
    constructor() {
        
       
        this.token = localStorage.getItem('id');
        console.warn(this.token);
    }

    display(items, index) {
    	const cart = document.querySelector('.minicart-items');
        const number = document.querySelector('.counter-number');
        const genelToplam = document.querySelector("#GenelToplam");
        const topGenelToplam = document.querySelector("#TopGenelToplam");
        
 		cart.innerHTML = '';

        items.forEach(function(item,index){
            cart.innerHTML += `<li class="product-inner">

                                     <div class="product-thumb style1">
                                        <div class="thumb-inner">

                                            <a href="#"><img src="${item.Resim}" alt="c2" style="width:80px;height:80px;"></a>
                                            <span class="counter-number" style="position:absolute;left:60px;text-decoration:none">${item.Adet}</span>
                                        </div>
                                    </div>
                                    <div class="product-innfo">
                                       <div class="product-name"><a href="#">${item.UrunAdi} </a></div>
                                           <a href="#" class="remove"  data-value="${item.id}"><i class="fa fa-times" data-value="${item.id}"></i></a>

                                                <span class="price">

                                                   
                                                   <ins>${parseFloat(item.Toplam).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')} ${item.DovizKuru}</ins>

                                                      <del>${index}</del>

                                                </span>

                                        </div>

                               </li>

                 `;
                //  genelToplam = items[0].GenelToplam;
            
        });

        if (items.length > 0){
            number.textContent = items.length;
            this.sepettekiUrunAdeti = items.length;
            genelToplam.innerHTML = items[0].GenelToplam+' '+items[0].DovizKuru;
            topGenelToplam.innerHTML = items[0].GenelToplam+' '+items[0].DovizKuru;
            const sil = document.querySelectorAll('.remove');
         
            sil.forEach(element => {
                element.addEventListener('click', (e) => this.deleteData(e));
              
            });
    
        } else { 
            number.textContent = 0;
            this.sepettekiUrunAdeti = 0;
            genelToplam.innerHTML = '';
            topGenelToplam.innerHTML = '';

        }
        
        

    }

    getData() {

        // let url = new URL('https://google.com/search');
        // let url = new URL('http://hytkirtasiye.com.tr/get.php');

// url.searchParams.set('q', 'test me!'); // added parameter with a space and !

// alert(url); // https://google.com/search?q=test+me%21


        // let url = new URL('get.php');
        // // url.search = new URLSearchParams({
        // //     token: "1234"
        // // });
        // //     // token: localStorage.getItem('id') });
        // console.log(url);
        // var url = new URL('https://example.com/');
        // url.search = new URLSearchParams({blah: 'lalala', rawr: 'arwrar'}); 


        let url = `get.php?token=${this.token}`;
        fetch(url)
        .then(response => response.json())
            .then(result => { this.display(result); return result })
        .catch(function (err) {

            console.log(err);
  
  
        })
         
    }

    addData({ adi, urunId, adet, paraBirimi }) {
        

        console.warn('addData');
  
        // localStorage.setItem('saved', new Date().getTime());
        // setWithExpiry("myKey", 12345, 5000);
        const now = new Date();

    // `item` is an object which contains the original value
    // as well as the time when it's supposed to expire
    const item = {
        value: localStorage.getItem('id'),
        expiry: now.getTime() + 3600000, // 1 saat
    }
        localStorage.setItem('myKey', JSON.stringify(item));
 
        fetch("cart.php", {
            method: "POST",
            body: JSON.stringify({
                "token": item.value,
                "urunId": urunId,
                "adi": adi,
                "adet": adet,
                //"fiyat":"500.00",
                "paraBirimi": paraBirimi
            })
        })
            .then(response => response.json())
            .then(result => this.display(result))
            .catch(function (err) {

                console.log(err);
            });

            toastr.options.timeOut = "3000";
            toastr.options.closeButton = false;
            toastr.options.positionClass = 'toast-top-right';
            // toastr.remove();
            toastr['success']('Ürün sepete eklendi');

    } 

    deleteData(e) {
        console.error('delete');
        fetch("delete.php", {
  
            method: "POST",
            body: JSON.stringify({
                "urunId" : e.target.dataset.value
            })
        })
        .then(response => response.json())
            .then(result => {
                this.display(result)
                this.showData()
            })
        .catch(function (err) {
            console.log(err);
       })
    }
   
    showData() {   // !Sepetim sayfasında görüntülemek için. 
 

        const formElement = document.querySelector('#form');
        const clear = document.querySelector('.btn-clear');
        const checkout = document.querySelector('.btn-shopping-checkout');
        const tableBody = document.querySelector('#tableBody');  
        const update = document.querySelector('.btn-update');
        const total = document.querySelector('#total');

        tableBody.innerHTML = '';
        let url = `get.php?token=${this.token}`;
         
        fetch(url)
        .then(response => response.json())
        .then(result => {
                this.display(result);
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
                                                        <input type="text" data-value="${element.UrunId}" name="qty" value="${element.Adet}" title="Qty" class="input-text qty text" size="1">
                                                        <a href="#" class="sign plus arti" data-value="${element.UrunId}"><i class="fa fa-plus arti" data-value="${element.UrunId}"></i></a>
                                                        <a href="#" class="sign minus eksi" data-value="${element.UrunId}"><i class="fa fa-minus eksi" data-value="${element.UrunId}"></i></a>
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

                if (result.length > 0) {
                    // subTotal.innerHTML = result[0].GenelToplam+' '+result[0].DovizKuru;
                    total.innerHTML = result[0].GenelToplam + ' ' + result[0].DovizKuru;

                    const removeItem = document.querySelectorAll('.action-remove');
                    const qty =  document.querySelectorAll('.tb-qty');
                    
                    qty.forEach(element => {
                        element.addEventListener('click', (e) => this.qty(e));
                        
                  
                    });
                  
                    removeItem.forEach(element => {
                        element.addEventListener('click', (e) => this.deleteData(e));
                        
                  
                    });

                    const input = document.querySelectorAll('input');
                    input.forEach(element => {
                        element.addEventListener('change', (e) => {
                            this.updateData(e.target.value, e.target.dataset.value)
                            this.showData()
                        });
                    });

                    const sepetiTemizle = document.querySelector('#sepetiTemizle');
                    sepetiTemizle.addEventListener('click', () => this.sepetiTemizle());

                    const completed = document.querySelector('#completed');
                    completed.addEventListener('click', () => this.completed());



                } else {
                    // subTotal.innerHTML = ''
                    total.innerHTML = '';
        
                }
            })
            .catch(function (err) {

                console.log(err);
  
  
            });


        
    }

    qty(e) {
        switch (e.target.classList.value) {
            case 'fa fa-plus arti':
            case 'sign plus arti':
                let qty = Number(e.target.closest('div').firstElementChild.value) + 1;
                let id = e.target.dataset.value;
                this.updateData(qty, id);
                this.showData();
                break;
            case 'fa fa-minus eksi' :
            case 'cart.js:303 sign minus eksi':
                // console.log(Number(e.target.closest('div').firstElementChild.value) - 1);
                let qtym = Number(e.target.closest('div').firstElementChild.value) - 1;
                let idm = e.target.dataset.value;
                if (qtym >0 ){
                    this.updateData(qtym, idm);
                    this.showData();
                }
                break;
            default:
                break;
        } 
    }

     updateData(qty,id) {
        console.error('sayı güncellenecek', qty,id);
        fetch("update.php", {
            method: "POST",
            body: JSON.stringify({
                "urunId" : id,
                "adet" : qty
            })
        })
        .then(response => response.json())
        .then(result => this.getData())
        .catch(function (err) {
            console.log(err);
       })


    }

    sepetiTemizle() {
        localStorage.clear();
        location.href = 'index.php';

    }
    

    completed() {
        location.href = `kart.php?token=${this.token}`;
    }


}