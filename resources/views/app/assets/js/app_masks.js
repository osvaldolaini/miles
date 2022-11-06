function masks(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmasks()",1)
}

function execmasks(){
    v_obj.value=v_fun(v_obj.value)
}

function maskPhone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}

function maskCellPhone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{5})(\d)/,"$1-$2")    //Coloca hífen entre o quinto e o sexto dígitos
    return v
}

function maskCpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}

function maskCep(v){
    v=v.replace(/D/g,"")                //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") //Esse é tão fácil que não merece explicações
    return v
}

function maskCnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}


function maskSite(v){
    //Esse sem comentarios para que você entenda sozinho ;-)
    v=v.replace(/^http:\/\/?/,"")
    dominio=v
    caminho=""
    if(v.indexOf("/")>-1)
        dominio=v.split("/")[0]
        caminho=v.replace(/[^\/]*/,"")
    dominio=dominio.replace(/[^\w\.\+-:@]/g,"")
    caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")
    caminho=caminho.replace(/([\?&])=/,"$1")
    if(caminho!="")dominio=dominio.replace(/\.+$/,"")
    v="http://"+dominio+caminho
    return v
}

function maskDate(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2")              //Coloca barra entre o segundo e o terceiro dígitos
    v=v.replace(/(\d{2})(\d)/,"$1/$2")              //Coloca ponto entre o quarto e o quinto dígitos
    return v
}

function maskMoney(v) {
        v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
        v = (v/100).toFixed(2) + ""
        v = v.replace(".", ",")
        v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,")
        v = v.replace(/(\d)(\d{3}),/g, "$1.$2,")
        return v
}

function maskMiles(v){
        v=v.replace(/\D/g,"")
        switch (v.length) {
            case 4:
                v=v.replace(/^(\d{1})(\d)/,"$1.$2")
                break;
            case 5:
                v=v.replace(/^(\d{2})(\d)/,"$1.$2")
                break;
            case 6:
                    v=v.replace(/^(\d{3})(\d)/,"$1.$2")
                    break;
            case 7:
                v=v.replace(/(\d{1})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                v=v.replace(/(\d{3})(\d)/,"$1.$2")
                    break;
            case 8:
                        v=v.replace(/(\d{2})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                        v=v.replace(/(\d{3})(\d)/,"$1.$2")
                            break;

            default:
                break;
        }


    return v
}

    // https://elcio.com.br/ajax/mascara/
