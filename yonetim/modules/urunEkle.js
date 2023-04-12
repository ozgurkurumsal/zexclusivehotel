export default class UrunEkle{

    
     odaAdi = document.getElementById('odaAdi');
     aciklama = document.getElementById('aciklama');
     detay = document.getElementById('detay');
     kapasite = document.getElementById('kapasite');
     ekstraKisi = document.getElementById('ekstraKisi');
     adet = document.getElementById('adet');

    constructor({ id  }) {
        this.id = id;
        let resim1;
        let resim2;
    }
   async list() {

        if (this.id != undefined) {
            let url = `./services/urunler.php?id=${this.id}`;
            await fetch(url)
             .then(res => res.json())
                .then(res => {
                    odaAdi.value = res[0]['odaAdi'];
                    aciklama.value = res[0]['aciklama'];
                    detay.value = res[0]['detay'];
                    kapasite.value = res[0]['kapasite'];
                    ekstraKisi.value = res[0]['ekstraKisi'];
                    adet.value = res[0]['adet'];
                    this.resim1 = res[0]['resim1'];
                    this.resim2 = res[0]['resim2'];
                    console.log(res);
             });

            const inputElement = document.querySelector('input[type="file"]');
            window.pond = FilePond.create( inputElement );
           
           
            (this.resim2 != '')? pond.addFile('/uploads/'+this.resim2) : '';
            (this.resim1 != '')? pond.addFile('/uploads/'+this.resim1) : '';
           
            pond.on('addfile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
            
                // const im64 = file.getFileEncodeBase64String();
                // console.log(im64);
                console.log('File added', file);
            });
        
            // pond.on('updatefiles', (error, file) => {
            //     if (error) {
            //         console.log('Oh no update');
            //         return;
            //     }
            
            //     const im64 = file.getFileEncodeBase64String();
            //     console.log(im64);
            //     console.log('File updated', file);
            // });
            
        
        
            pond.on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no remove');
                    return;
                }
            
                // const im64 = file.getFileEncodeBase64String();
                // console.log(im64);
                console.log('File Removed', file.file.name);
            });
            
            
            pond.onprocessfile = (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File processed', file);
            }
            
            console.log(pond);
            
            function sendAll() {
                console.log('Ürün Adı');
                console.log('click');
                // pond.addFile();
                // pond.getFile();
                pond.getFiles();
                
                    pond.processFiles().then(files => {
                        // files have been processed
                        console.log({files});
                    });
                };
        
            // const inputElement = document.querySelector('input[type="file"]');
           
          
            // pond.addFiles('./upload/uploads/10.jpg','./upload/uploads/9.jpg','./upload/uploads/11.jpg','./upload/uploads/12.jpg'); // base64 ile ekleyeceğim


        } else {
            console.warn('insert işlemi ');
            
        }

        
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
    
    serialize (data) {
        let obj = {};
        for (let [key, value] of data) {
            if (obj[key] !== undefined) {
                if (!Array.isArray(obj[key])) {
                    obj[key] = [obj[key]];
                }
                obj[key].push(value);
            } else {
                obj[key] = value;
            }
        }
        return obj;
    }


    


    async save()  {
        var form = document.querySelector('#urunForm');
        var data = new FormData(form);
        pond.getFiles();
        await pond.processFiles().then(files => {
            console.log({ files });
            files.forEach((element,index) => {
                console.log(index, '--', element.file.name);
                data.append(`resim${index + 1}`, element.file.name);
            });
            if(files.length == 0) data.append('resim1', '');
            if(files.length <  2) data.append('resim2', '');
        });

        data.append("id", this.id);
        let formObj = this.serialize(data);
        
        fetch('./services/urunler.php', {
            method: 'PUT',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formObj),
            }).then(res=>res.json())
                .then(res => {
                    console.log(res);

                    toastr.options.timeOut = "3000";
                    toastr.options.closeButton = false;
                    toastr.options.positionClass = 'toast-top-right';
                    // toastr.remove();
                    toastr['success']('Oda Güncellendi');

                    loadPage('urunler');
                });
   
    }
}
