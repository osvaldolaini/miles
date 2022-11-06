const CSRF_TOKEN    = document.querySelector("meta[name='csrf-token']").getAttribute('content');

window.onload = () => {
    var form = document.getElementById('form');
        form.addEventListener('submit', (evt) => {
            evt.preventDefault();
            save(form,'POST')
        })
}

del = (id) =>{
    var form = document.getElementById('form_'+id);
    save(form,'PUT')
}

offer = (id) =>{
    var form = document.getElementById('form_'+id);
    form.addEventListener('submit', (evt) => {
        evt.preventDefault();
        save(form,'POST')
    })
}

function save(form,method) {
        Swal.fire({
            title: 'Todos os dados estão corretos?',
            text: "Não será possível reverter esta ação!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            cancelButtonText: `Não`,
            confirmButtonText: 'Sim'
        }).then((result) => {
            if (result.value === true) {
                var myHeader = new Headers();
                var url = form.action
                myHeader.append('Content-type', 'application/json');
                myHeader.append('Accept', 'application/json');
                myHeader.append('X-CSRF-TOKEN', CSRF_TOKEN);
                var myFormData = new FormData(form);
                fetch(url, {
                    method: method,
                    headers: myHeader,
                    body: JSON.stringify(Object.fromEntries(myFormData.entries()))
                })
                .then((response) => response.json())
                .then((data) => {
                //console.log('Success:', data);
                    if (data.success) {
                        Swal.fire({
                            //position: 'top-end',
                            icon: 'success',
                            title: 'Sucesso!',
                            timer: 1200,
                            text: data.message,
                            showConfirmButton: false,
                        }).then((result) => {
                            if(data.location){
                                window.location.href = data.location
                            }
                        })
                    } else {
                        //console.log(data.errors)
                        var retorno_erro_validacao = ''
                        Object.keys(data.errors).forEach(key => {
                            console.log(data.errors[key])
                            retorno_erro_validacao += '<p class="text-danger"><i class="fas fa-exclamation-triangle"></i> '+data.errors[key]+'</p>';
                          })
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            html: retorno_erro_validacao,
                        })

                    }
                })
                .catch((error) => {
                    //console.error('Error:', error);
                });
            }
        })
}
