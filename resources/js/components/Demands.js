import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { createRoot } from 'react-dom/client';
import FavoriteBorderIcon from '@mui/icons-material/FavoriteBorder';
import ShareIcon from '@mui/icons-material/Share';
import Skeleton from 'react-loading-skeleton';

import Offers from './Offers';

const appurlmeta    = document.querySelector("meta[name='app_url']");
const APP_URL       = appurlmeta.getAttribute("content");

export default class Demand extends Component {

    constructor(props){
        super(props);
        this.state = {
            demand:[],
            skeletonLoader:true,
        }

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
        window.location = e
    };

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
                            <div className=" flex items-center justify-between py-0 px-3">
                                <div className="div" class="flex p-4 space-x-4 sm:px-8">
                                    <div className=" flex-shrink-0 w-16 h-16 rounded-full bg-teal-200 dark:bg-gray-700"></div>
                                    <div className=" flex-1 py-2 space-y-4">
                                        <div className=" w-full h-3 rounded bg-teal-200 dark:bg-gray-700"></div>
                                        <div className=" w-5/6 h-3 rounded bg-teal-200 dark:bg-gray-700"></div>
                                    </div>
                                </div>
                                <div className="p-4 space-y-4 sm:px-8">
                                    <div className="w-full h-4 rounded bg-teal-200 dark:bg-gray-700"></div>
                                    <div className="w-full h-4 rounded bg-teal-200 dark:bg-gray-700"></div>
                                    <div className="w-3/4 h-4 rounded bg-teal-200 dark:bg-gray-700"></div>
                                </div>
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
                            <div className="mt-2">
                                <div  className="relative flex justify-center">
                                    <button className="bg-teal-500
                                        hover:bg-gray-900 border-2 border-teal-500
                                        active:bg-teal-300 text-white text-xs
                                        font-bold uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md outline-none focus:outline-none
                                        mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                                        duration-150" onClick={(e) => this.handleClick(APP_URL+'/fazer-oferta/'+data.id, e)}>
                                        FAZER OFERTA
                                    </button>
                                </div>
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
                                    <Offers offersToDemand={data.id}  />
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

