import {React, useState} from "react";
import '../assets/css/main.css';
import logochips from '../assets/img/logochip.png';
import {endPoint} from '../services/apiRest.js';
import { useNavigate, Link  } from "react-router-dom";
import axios from 'axios'

const Login = ({logochip}) => {
    
    const [form, setForm] = useState({
        email: '',
        password: '',
        error: false,
        errorMsg: '',
        logochip:logochip
    })
    const logo = logochips;
    const navigate = useNavigate();
        
    const eventForm=(e)=>{
        e.preventDefault() 
    }

    const eventChange = async e=>{
        await setForm({
            ...form,
            [e.target.name] : e.target.value
        })
    }

    const evetRegister= a=>{
        navigate("/register",{ replace: true })
    }
    const eventSubmit=()=>{
        let url = endPoint + 'api/login-clientes'
        axios.post(url,form)
        .then(response=>{
            if(response.data.error){
                setForm({
                    error: response.data.error,
                    errorMsg: response.data.mensaje  
                })
                return;
            }else{
                const Accesstoken = response.data.Access_token.split("|");
                localStorage.setItem('token', Accesstoken[1])
                navigate("/ShowProducto",{ replace: false })
                
            }
        }).catch(
            error=>{
                setForm({
                    error: true,
                    errorMsg: 'no se pudo validar las credenciales '
                })
            }
        )
 
     }

    
        return(
        <>

            <div className="wrapper fadeInDown">
                <div id="formContent">



                    <div className="fadeIn first">
                        <img src={logo} width ='100' alt="User Icon" />
                    </div>
                    <form onSubmit={eventForm}>
                        <input type="text" name="email" className="fadeIn second"  placeholder="email" onChange={eventChange} />
                        <br />
                        <input type="password" name="password" className="fadeIn third" placeholder="password" onChange={eventChange} />
                        <br />
                        <input type="submit" className="fadeIn fourth" value="Log In" onClick={eventSubmit} />
                    </form>
                    <a className="underlineHover" onClick={evetRegister}>
                       crea tu Cuenta 
                    </a>
                    <div id="formFooter">
                        {
                        form.error ===true &&
                                <div className="alert alert-danger" role="alert">

                                        {form.errorMsg}
                                </div>
                        }
                    </div>

                </div>
            </div>
        </>
        )
    
}

export default Login