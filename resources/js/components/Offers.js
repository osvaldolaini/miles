import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const appurlmeta    = document.querySelector("meta[name='app_url']");
const APP_URL       = appurlmeta.getAttribute("content");


export default class Offers extends Component {

    constructor(props){
        super(props);
        this.state = {
            demand:props.offersToDemand,
            offers:[],
            isToggleOn: true
        }
        this.handleClick = this.handleClick.bind(this);
    }

    componentDidMount(){
        axios.get(APP_URL+'/ofertas-para-demanda/'+this.state.demand)
        .then(response=>{
            this.setState({offers:response.data});
        }).catch(error=>{
            alert("Error "+error)
        })
    }

    handleClick = () => {
         this.setState(prevState => ({
            isToggleOn: !prevState.isToggleOn
        }));
    };

    render() {
        if(this.state.offers){
                var of = this.state.offers.length
                if(of > 1){
                    var text = ['foram feitas','ofertas']
                }else{
                    var text = ['foi feita','oferta']
                }
                return(
                    <>
                        <div className="flex justify-center items-center space-x-3 " >
                            <div className="flex flex-wrap items-center pt-3 pb-1 " >
                                <div className="flex items-center space-x-2">
                                    <div className="flex -space-x-4">
                                        {this.state.offers.map((data, key)=>{
                                            var avatar = data.user.avatar;
                                            if(avatar){
                                                avatar = APP_URL+'/storage/profiles/'.avatar
                                            }else{
                                                avatar = APP_URL+'/storage/profiles/avatar.jpg'
                                            }
                                            return <img alt={"sistemilhas-avatar-"+data.user.username}
                                            className="cursor-pointer w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800"
                                            onClick={this.handleClick}
                                            src={avatar} key={key}/>;
                                        })}
                                    </div>
                                    <span className="text-sm">{text[0]}
                                        <span className="font-semibold" > {of} {text[1]}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                            {this.state.isToggleOn ? '' :
                                <div className="absolute right-0 z-20 w-64 mt-2
                                overflow-hidden bg-white rounded-md shadow-lg sm:w-80 dark:bg-gray-800"
                                >
                                    <div className="py-2">
                                        {this.state.offers.map((data, key)=>{
                                            var avatar = data.user.avatar;
                                            var value = data.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
                                            if(avatar){
                                                avatar = APP_URL+'/storage/profiles/'.avatar
                                            }else{
                                                avatar = APP_URL+'/storage/profiles/avatar.jpg'
                                            }
                                            return (
                                                <a href={APP_URL+'/oferta-do-pedido/'+data.demand_id} className="flex
                                                items-center px-4 py-3 -mx-2 transition-colors duration-300
                                                transform border-b border-gray-100 hover:bg-gray-50
                                                dark:hover:bg-gray-700 dark:border-gray-700" key={key}>
                                                    <img alt={"sistemilhas-avatar-"+data.user.username}
                                                    className="flex-shrink-0 object-cover w-8 h-8 mx-1 border
                                                    rounded-full dark:bg-gray-500 dark:border-gray-800"
                                                    src={avatar}/>
                                                    <p className="mx-2 text-sm text-gray-600 dark:text-white">
                                                        <span className="font-bold" >{"@"+data.user.username}</span> fez oferta de R$ {value}</p>
                                                </a>

                                            )
                                        })}
                                    </div>
                                    <a href={APP_URL+'/ofertas-do-pedido/'+this.state.offers[0].demand_id} className="block py-2 font-bold text-center text-white bg-gray-800 dark:bg-gray-700 hover:underline">Ver lista completa</a>
                                </div>
                            }
                    </>
                )

        }else{
            return(
                <>
                    <div  className="flex justify-center items-center space-x-3 " >
                        <div className="flex flex-wrap items-center pt-3 pb-1 " >
                            <div className="flex items-center space-x-2">
                                <span className="text-sm">Nenhuma pessoa
                                    <span className="font-semibold"> fez oferta</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </>
            )

        }

    }

}

if (document.getElementById('offers')) {
    ReactDOM.render(<Offers />, document.getElementById('offers'));
}
