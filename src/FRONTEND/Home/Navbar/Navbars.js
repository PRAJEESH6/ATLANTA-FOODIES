import './Navbar.css';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import axios from 'axios';
import React, { useState } from 'react';



class Navbars extends React.Component{

  //initialize an object's state in a class
  constructor(props) {
    super(props)
      this.state = {
        data: "",
        img: ""
              }
             
      }

      

      //ComponentDidMount is use to Connect a React app to external applications, such as web APIs or JavaScript functions
    componentDidMount(){
        //get request
        axios.get('http://localhost:3000/ATLANTA%20BACKEND/Navbars.php').then(res => 
        {
        
        this.setState({data: res.data});    
           }); 
        
        }

        //Get Img
        componentDidIMG(){
          axios.get('http://localhost:3000/ATLANTA%20BACKEND/getimg.php').then(ress=>{
            this.setState({img: ress.img})
            console.log({img: ress.img});
          });
        }

      render(){
      
    return(
     
        <>
        
     
    <Navbar expand="lg" >
    <div className='container-fluid'>
        <Navbar.Brand href="#home" >ATLANTA</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="mr-auto">
            <Nav.Link href="/home" >Home</Nav.Link>
            <Nav.Link href='#'>Category</Nav.Link>
            <Nav.Link href='#'>Orders</Nav.Link>
            <Nav.Link href='#'>Profile</Nav.Link>
            <Nav.Link href="#link" >{this.state.img}</Nav.Link>

            <NavDropdown title="Dropdown" color='light' className='hello' id="basic-nav-dropdown">

              <NavDropdown.Item href="#action/3.1" >Action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.2">Another action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.3">Something</NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item href="#action/3.4">Separated link</NavDropdown.Item>

            </NavDropdown>
          </Nav>
        </Navbar.Collapse>

       <div id='account' className='d-flex'>
        <div id='name' className=' mt-1 p-3'>{this.state.data}</div>
        <div id='profile' className='mt-1 '>
            <img src={this.state.img} id='pic'  alt='pic'/>
        </div>
        </div>
        </div>
        <h1></h1>
    </Navbar>
   
    
      
        </>
    )
      }
}

export default Navbars;