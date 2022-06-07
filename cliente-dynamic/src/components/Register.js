
import {React,useState} from 'react'
// import '../assets/css/main.css';
import logochips from '../assets/img/logochip.png';
import { useNavigate, Link  } from "react-router-dom";
import {endPoint} from '../services/apiRest.js';
import axios from 'axios';

const Register = () => {
    const errores =[]
    const [form, setForm] = useState({
        email: '',
        password: '',
        password_confirmation:'',
        nombre:'',
        apellido:'',
        telefono:'',
        cedula:'',


        error: false,
        errorMsg: '',
    })
    const navigate = useNavigate();
    const eventChange = async e=>{
        await setForm({
            ...form,
            [e.target.name] : e.target.value
        })
        console.log(form);
    }
    
    const eventSubmit=()=>{
        let url = endPoint + 'api/registro-cliente'
        axios.post(url,form)
        .then(response=>{
            console.log(response.data);
            if(response.data.error){
                setForm({
                    error: response.data.error,
                    errorMsg: response.data.mensaje  
                })
                return;
            }else{
                const Accesstoken = response.data.Access_token.split("|");
                localStorage.setItem('token', Accesstoken[1])
                navigate("/login",{ replace: false })
                
            }
        }).catch(
            error=>{
                console.log(error.response.data.errors);
               
              
               
                setForm({

                    error: true,
                    errorMsg: [...errores, error.response.data.errors]
                })
            }
        )
 
     }
    const eventForm= e => e.preventDefault();
    const evetLogin=()=>navigate("/",{ replace: true });
    const logo = logochips;
    return (
        < >
            <div className="wrapper fadeInDown">
                
                <div id="formContent">
                <div className="fadeIn first">
                        <img src={logo} width ='100' alt="User Icon" />
                        <h3>Registro</h3>
                    </div>
                    <form onSubmit={eventForm}>
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" name="nombre" type="text" className="form-control" placeholder="nombre" onChange={eventChange} />
                        <label for="apellido">Apellido:</label>
                        <input id="apellido" name="apellido" type="text" className="form-control" placeholder="Apellido" onChange={eventChange} />
                        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" className="form-control" placeholder="aaa-mm-d" onChange={eventChange} />
                        <label for="telefono">Telefono:</label>
                        <input id="telefono" name="telefono" type="text" className="form-control" placeholder="Telefono " onChange={eventChange} />
                        <label for="cedula ">Cedula de identidad:</label>
                        <input id="cedula" name="cedula" type="text" className="form-control" placeholder="Cedula de identidad" onChange={eventChange} />
                        <label for="email">Correo electronico</label>
                        <input id="email" name="email" type="email" className="form-control" placeholder="Correo electronico" onChange={eventChange} />
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" className="form-control" placeholder="Contraseña" onChange={eventChange} />
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" className="form-control" placeholder="Confirmar contraseña" onChange={eventChange} />
                        <input id="" name="" type="submit" className="btn btn-prymary" onClick={eventSubmit} placeholder="" />
                        <input id="" name="" type="button" className="btn btn-prymary" onClick={evetLogin} value="login" />
                    </form>
                    <div id="formFooter">
                        {
                        form.error ===true &&
                                <div className="alert alert-danger" role="alert">

                                        {form.errorMsg.map((e,i)=>(
                                            ` ${e.nombre?? ''}
                                             ${e.apellido?? ''}
                                              ${e.cedula?? ''}
                                               ${e.telefono?? ''}
                                                ${e.email?? ''}
                                                 ${e.password?? ''}
                                                  ${e.password_confirmation?? ''}
                                                  ${e.fecha_nacimiento?? ''}`
                                            

                                        ))
                                        
                                        }
                                </div>
                        }
                    </div>
                </div>


            </div>




        </>
    )
}

export default Register