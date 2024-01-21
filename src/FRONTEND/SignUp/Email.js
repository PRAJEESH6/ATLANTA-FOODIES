import axios from "axios";
import { useState } from "react";

function Email(){

    const [mail,setMail] = useState("");

    const change=(e)=>{
       setMail(e.target.value)
    }

    function handleSubmit(e){
        
        const form = new FormData();
        form.append("mail",mail)
        axios.post("http://localhost:3000/bus-ticket/src/PHP/email.php",form).then((ress)=>{})
        data: form.serialize()
    }
    console.log("hii",{mail});
    return(
        <>
        <h1>Activate your account</h1>

        <form
        action="http://localhost:3000/bus-ticket/src/PHP/email.php"
        method="post"
        onSubmit={(event) => handleSubmit(event)}
        >
            <label>Email</label>
            <input type="email" placeholder="email" name="mail" onChange={(e)=>{change(e)}}/>
            <button className="btn btn-warning">Submit</button>
        </form>
        
        
        </>
    )
}

export default Email;