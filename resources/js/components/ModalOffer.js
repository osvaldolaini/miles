import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';
import { useForm } from "react-hook-form";

const customStyles = {
    content: {
        top: '50%',
        left: '50%',
        right: 'auto',
        bottom: 'auto',
        marginRight: '-50%',
        transform: 'translate(-50%, -50%)',
        border: 'none',
        background:'transparent'
    },
  };
  Modal.setAppElement('#main');
export default class ModalOffer extends Component{

    constructor (props) {
        super(props);
        this.state = {
            showModal: false,
            demand:props.demandToModal,
            value:'',
        };
        this.handleModal = this.handleModal.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
      //this.handleCloseModal = this.handleCloseModal.bind(this);

      console.log(props.demandToModal)
    }

    handleModal() {
        this.setState(prevState => ({
            showModal: !prevState.showModal
        }));
    }

    handleSubmit(event) {

            var id = this.state.demand.id
            var form = document.getElementById('form_'+id)
            event.preventDefault()
            save(form,'POST')
    }
    handleChange(event) {
        var v = event.target.value
        v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
        v = (v/100).toFixed(2) + ""
        v = v.replace(".", ",")
        v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,")
        v = v.replace(/(\d)(\d{3}),/g, "$1.$2,")
        this.setState({value: v});
      }

    render () {
        const data = this.state.demand;
        var value_max = data.value_max.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
        //const { register, handleSubmit } = useForm();
      return (
        <div className='div'>
          <button className="bg-teal-500
                hover:bg-gray-900 border-2 border-teal-500
                active:bg-teal-300 text-white text-xs
                font-bold uppercase px-6 py-2.5 rounded-full
                shadow hover:shadow-md outline-none focus:outline-none
                mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                duration-150" onClick={this.handleModal}>FAZER OFERTA</button>
          <Modal
             isOpen={this.state.showModal}
             contentLabel="onRequestClose Example"
             onRequestClose={this.handleModal}
             style={customStyles}
          >
                <div className="div" id="offerModal" >
                    <div className="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <span className="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div className="relative inline-block px-4 pt-1 pb-4 overflow-hidden
                                text-left align-bottom transition-all transform bg-white rounded-lg
                                shadow-xl dark:bg-gray-900 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                            <button className='text-sm ' onClick={this.handleModal}>Fechar X</button>
                            <div className="div">
                                <div className="mt-4 text-center">
                                    <h3 className="font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
                                            Faça sua oferta
                                    </h3>
                                    <p className="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                            Após fazer a sua oferta você irá entrar na fila por order de valor e chegada respectivamente.
                                    </p>
                                </div>
                            </div>
                            <div className="mt-4">
                                <form onSubmit={this.handleSubmit} action="minhas-ofertas" id={"form_"+this.state.demand.id} className="container flex flex-col mx-auto  ng-untouched ng-pristine ng-valid">
                                    <label className="text-sm text-gray-700 dark:text-gray-200" for="share link">Oferta (R$)
                                        <span className="flex items-center leading-none ml-0
                                        justify-center rounded-md bg-red-100
                                        px-2.5 py-0.5 text-red-700">
                                        <p className="whitespace-nowrap text-xs">Valor máximo {value_max}</p>
                                    </span></label>
                                        <div className="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                                            <div className="col-span-full ">
                                            <input type="text" name="value" value={this.state.value} onChange={this.handleChange}
                                            placeholder="Valor" required=""
                                                className="mb-2 mt-2 w-full rounded-md focus:ring focus:ring-opacity-75
                                                focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900"/>
                                                <input name="demand_id" type="hidden"  value={this.state.demand.id} />
                                            </div>
                                        </div>
                                        <div className="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                                            <div className="col-span-full ">
                                                <div className="flex space-x-2 justify-center py-1" >
                                                    <input  type='submit' value="ENVIAR"
                                                            className='mb-2 mt-1.5 w-full inline-block px-6 py-3 cursor-pointer
                                                            bg-blue-600 text-white font-medium text-xs leading-normal text-center
                                                            uppercase rounded shadow-md font-bold
                                                            hover:py-2.5 hover:border-2 hover:border-blue-600 hover:bg-white hover:text-blue-600
                                                            focus:border-blue-600 focus:text-white focus:outline-none focus:outline-none focus:ring-0
                                                            active:bg-white active:text-white active:shadow-lg transition duration-150 ease-in-out'
                                                            />
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </Modal>
        </div>
      );
    }
  }

  const props = {};

if (document.getElementById('offerModal')) {
    ReactDOM.render(<ModalOffer {...props} />, document.getElementById('offerModal'))
}
