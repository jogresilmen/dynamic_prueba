import React from 'react';
import * as ReactDOM from "react-dom";
import './assets/css/App.css';
import { BrowserRouter, useNavigate , Routes, Route} from 'react-router-dom';
import Login from './components/Login';
import Register from './components/Register';
import ShowProducto from './components/ShowProducto';

// import login

// import{}from

function App() {
  return (
    
      <React.Fragment>
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Login/>}/>
            <Route path="/register" element={<Register/>}/>
            <Route path='/ShowProducto'  element={<ShowProducto/> } />
          </Routes>
        </BrowserRouter>
      </React.Fragment>
      
     
      
   
  );
}

export default App;
