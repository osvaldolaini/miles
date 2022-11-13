import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { createRoot } from 'react-dom/client';
import FavoriteBorderIcon from '@mui/icons-material/FavoriteBorder';
import ShareIcon from '@mui/icons-material/Share';
//import Skeleton, { SkeletonTheme } from 'react-loading-skeleton'
import 'react-loading-skeleton/dist/skeleton.css'


import 'alpinejs';

import Offers from './Offers';

import ModalOffer from './ModalOffer';

const appurlmeta    = document.querySelector("meta[name='app_url']");
const APP_URL       = appurlmeta.getAttribute("content");
// Make sure to bind modal to your appElement (https://reactcommunity.org/react-modal/accessibility/)

export default class Demand extends Component {

    constructor(props){
        super(props);
        this.state = {
            demand:[],
            skeletonLoader:true,
            //showModal: false
        };

        //this.handleModal = this.handleModal.bind(this);
    }

    componentDidMount(){
        axios.get(APP_URL+'/demandas')
        .then(response=>{
            this.setState({demand:response.data});
            setTimeout(() => {
                this.setState({skeletonLoader:false});
            }, 1000)

        }).catch(error=>{
            alert("Error "+error)
        })
    }

    handleClick = (e) => {
        //window.location = e
    };

    // handleModal () {
    //     this.setState(prevState => ({
    //         showModal: !prevState.showModal
    //     }));
    //     console.log(this.state.showModal)
    // }

    render() {
        return this.state.demand.map((data, key)=>{
            var avatar = data.user.avatar;
            var miles = data.miles;
            var k  = miles/1000;
            switch (k) {
                case k < 1:
                    var m = miles;
                    break;
                case k >= 1 && k < 1000:
                    var m =  k+'K';
                    break;
                default:
                    var m =  k+'K';
                    break;
            }
            var value = data.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})

            if(avatar){
                avatar = APP_URL+'/storage/profiles/'.avatar
            }else{
                avatar = APP_URL+'/storage/profiles/avatar.jpg'
            }
            return(
                <div className="container-fluid rounded-lg shadow-md py-2 bg-gray-100 dark:bg-gray-900 dark:text-gray-100 my-2" key={key}>
                    {this.state.skeletonLoader &&
                        <>
                            <div role="status" className="container-fluid py-6 bg-gray-100 dark:bg-gray-900 dark:text-gray-100 my-2">
                                    <div className="flex px-2 items-center animate-pulse justify-start py-0 px-3">
                                        <div className="flex-shrink-0 w-10 h-10 rounded-full bg-teal-300 dark:bg-gray-700"></div>
                                        <div className="flex-1 space-y-4 px-3 ">
                                            <div className="w-2/6 h-3 rounded bg-teal-300 dark:bg-gray-700"></div>
                                            <div className="w-2/6 h-3 rounded bg-teal-300 dark:bg-gray-700"></div>
                                        </div>
                                        <div className="block space-y-4 px-8 ">
                                            <div className="h-5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
                                            <div className="h-2.5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
                                            <div className="h-2.5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
                                        </div>
                                    </div>
                                    <span className="sr-only">Loading...</span>
                                </div>
                        </>
                    }
                    {!this.state.skeletonLoader &&
                    <>
                    <div className="flex items-center justify-between py-0 px-3"  key={key}>
                        <div className="flex items-center space-x-2">
                            <img src={avatar} alt={"sistemilhas-avatar-"+data.user.username}
                            className="object-cover object-center w-8 h-8 rounded-full
                            shadow-sm dark:bg-gray-500 dark:border-gray-700" />
                            <div className="-space-y-1">
                                <h2 className="text-sm font-semibold leading-none">{'@'+data.user.username}</h2>
                                <span className="inline-block text-xs leading-none dark:text-gray-400 mb-2">Iniciante</span>
                                <span className="flex items-center leading-none  ml-0
                                        justify-center rounded-md bg-emerald-100
                                        px-2.5 py-0.5 text-emerald-700">
                                        <p className="p whitespace-nowrap text-xs">Comprou 10.5k</p>
                                </span>
                            </div>
                        </div>
                        <div className="text-right">
                            <h1 className="text-xl font-bold mt-0 pt-0" >{m}  Milhas</h1>
                            <h2 className="text-lg font-bold mt-0 pt-0" >{data.qtd } CPF</h2>
                            <h2 className="text-md font-bold mt-0 pt-0" >Valor R$ {value}</h2>
                            <div className="mt-2" >
                                <ModalOffer  demandToModal={data} />
                            </div>
                        </div>
                    </div>
                    <div className="px-3">
                            <div className="flex items-center justify-between">
                                <div className="flex items-center space-x-2">
                                    <button type="button" title="Favorito" className="flex items-center justify-center">
                                        <FavoriteBorderIcon />
                                    </button>
                                    <button type="button" title="Compatilhar" className="flex items-center justify-center">
                                        <ShareIcon />
                                    </button>
                                    <div className="relative inline-block">
                                        <Offers offersToDemand={data.id}  />
                                    </div>
                                </div>
                            </div>
                            <div className="space-y-3">
                                <p className="p text-xs text-right">
                                    <span className="span text-base font-semibold text-xs">Publicado à </span><PublishedAt date={data.created_at} />
                                </p>
                            </div>
                    </div>
                    </>
                    }
                </div>
            )
          })
    }
}





function offer(id){
    var form = document.getElementById('form_'+id);
    form.addEventListener('submit', (evt) => {
        evt.preventDefault();
        save(form,'POST')
    })
}

function PublishedAt(props) {
    const now = new Date(); // Data de hoje
    const past = new Date(props.date); // Outra data no passado
    const diff = Math.abs(now.getTime() - past.getTime()); // Subtrai uma data pela outra
    const days       = Math.ceil(diff / (1000 * 60 * 60 * 24));
    const years      = Math.ceil(months / 12)
    const months     = Math.ceil(days / 30)
    const hours      = Math.ceil(days * 24)
    const minutes    = Math.ceil(hours * 60)
    const second     = Math.ceil(minutes * 60)

    if (second < 60) {
        return second+ ' s' ;
    }else{
        if(minutes < 60){
            return minutes+' min';
        }else{
            if(days < 30){
                return days+' dias';
            }else{
                if(months < 12){
                    return months+' meses';
                }else{
                    return years+' anos';
                }
            }
        }
    }
}

if (document.getElementById('demands')) {
    ReactDOM.render(<Demand />, document.getElementById('demands'));
}

