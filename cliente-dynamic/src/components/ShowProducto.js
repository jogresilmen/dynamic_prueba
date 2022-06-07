import { useEffect, useState } from "react"
import axios from 'axios'
import{link} from 'react-router-dom'

const endPoint = 'http://127.0.0.1:8000/';
const ShowProducto = () => {
    const [ products , setProducts ]=useState([])
    useEffect(()=>{
        getAllProducts()
    },[])



    const getAllProducts= async ()=>{
       const response = await axios.get(`${endPoint}api/product-all`,{
        headers: { 
            'Content-Type': 'application/json', 
            'Accept': 'application/json', 
            'Authorization': `Bearer ${localStorage.getItem('token')}`
          }
       })
       console.log(response.data);
       setProducts(response.data);
    }
    

  return (

    <section className="menu-area section-gap" id="coffee">
    <div className="container">
        <div className="row d-flex justify-content-center">
            <div className="menu-content pb-60 col-lg-10">
                <div className="title text-center">
                    <h1 className="mb-10">Catalogo de productos</h1>
                    <p>nuestros productos destacados </p>
                </div>
            </div>
        </div>						
        <div className="row">
        {products.map((e) => (

            <div className="col-sm-4">
            <div className="card-body center" >
            <div className="card" style={{width: "18rem"}}>
            <img className="card-img-top" src={`${e.img}`} alt="Card image cap"></img>
            <div className="card-body">
            <h5 className="card-title">{e.nombre}</h5>
            <p className="card-text">{e.description}</p>
            <a href="#" className="btn btn-primary">enviar</a>
            </div>

            </div>
            </div>
            </div>
            ))  }												
        </div>
    </div>	
</section> 
        
    
    

  
    
    

  )
}

export default ShowProducto