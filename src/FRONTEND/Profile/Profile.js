import './Profile.css';

function Profile(){

    function SaveData(a){
        a.preventDefault();
        console.log("Clicked");

        if(window.XMLHttpRequest)
        {
           a=new XMLHttpRequest();
        }
        // if(window.ActiveXObject){
        //    a=new ActiveXObject("Microsoft.XMLHTTP");
        // }

        a.onreadystatechange = function() {

            if(a.readyState == 4 && a.status == 200)
            {
                alert(a.responseText);
            }
        }
        var name   = document.getElementById("name").value;
        var email  = document.getElementById("email").value;
        var phone  = document.getElementById("phone").value;
        var city   = document.getElementById("city").value;

        var url    ="http://localhost:3000/ATLANTA%20BACKEND/Order.php";
        var val = "name="+name+"&email="+email+"&phone="+phone+"&city="+city;

        a.open("POST",url,true);
        a.setRequestHeader("content-type","application/x-www-form-urlencoded");
        a.setRequestHeader("content-length",val.length);
        a.setRequestHeader("connection","close");
        a.send(val);
    }
    return(
        <>
        
        <form>
            <label>Name</label>
            <input type='text'  id='name' value="prajeesh" className='form-control' ></input>

            <label>Email</label>
            <input type='email'  id='email' value="prajee@gmail.com" className='form-control'></input>

            <label>PH-NO</label> 
            <input type='number'  id='phone' value="9090909090909" className='form-control'></input>

            <label>City</label>
            <input type='text'  id='city' value="coimbatorte" className='form-control'></input>

            {/* <label>Img</label>
            <input type='text'  id='name' className='form-control'></input> */}

            <button className='btn btn-dark' onClick={SaveData} >SAVE</button>
        </form>
        </>
    )
}

export default Profile;