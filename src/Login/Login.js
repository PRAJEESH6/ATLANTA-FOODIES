import { useState } from 'react';
import './Login.css';
import $ from 'jquery';

function Login(){

    const [LoginName , setLoginName] = useState("");
    const [LoginEmail , setLoginEmail] = useState("");
    const [result , setResult] = useState("");

    const HandleUserName=(e)=>{
        setLoginName(e.target.value);
    };

    const HandleEmail=(e)=>{
        setLoginEmail(e.target.value);
    }

    //******************************************************** */

    const handleSubmit = (e) => {
		e.preventDefault();
		const form = $(e.target);
		$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: form.serialize(),
			success(data) {
				setResult(data);
			},
		});
	};



    return(
        <>
        
        <div className='container'>
        <h1>LOGIN HERE</h1>
        <form
								action="http://localhost:3000/ATLANTA%20BACKEND/login.php"
								method="POST"
								onSubmit={(event) => handleSubmit(event)}
								encType="multipart/form-data"
							>
             <label>Enter UserName</label>
            <input type="text" id="username" value={LoginName} onChange={(eve)=>HandleUserName(eve)} placeholder="ENTER USERNAME" className="form-control" required="true" autoComplete='off'></input>

            <label>Enter Email</label>
            <input type="email" id="email" value={LoginEmail}  onChange={(eve)=>HandleEmail(eve)} placeholder="ENTER EMAIL" className="form-control" required="true" autoComplete='off'></input>
       
       <button name="submit"  type="submit" className='btn btn-dark' >Login</button>
        </form>
        </div>
        
        </>
    )
}
export default Login;