import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Demands from './Demands';

const appurlmeta    = document.querySelector("meta[name='app_url']");
const APP_URL       = appurlmeta.getAttribute("content");

export default class Offers extends Component {

    constructor(props){
        super(props);
        this.state = {
            demand:props.offersToDemand,
            offers:[],
        }
    }

    componentDidMount(){
        axios.get(APP_URL+'/ofertas-para-demanda/'+this.demand)
        .then(response=>{
            this.setState({offers:response.data});
            //console.log(response.data)
            setTimeout(() => {
                this.setState({skeletonLoader:false});
            }, 1000)
        }).catch(error=>{
            alert("Error "+error)
        })
    }

    handleClick = (e) => {
        alert(e)
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
                        <div className="flex justify-center items-center space-x-3 ">
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
                                        onClick={(e) => this.handleClick('modal', data.id)}
                                        src={avatar} key={key}/>;
                                    })}
                                </div>
                                    <span className="text-sm">{text[0]}
                                        <span className="font-semibold" > {of} {text[1]}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
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
