import './Img.css';
import {Link} from 'react-router-dom';
import axios from 'axios';
import { useState } from "react";
import picks from '../imgs/boy.jpg';
import pic2 from '../imgs/girl.jpg';

function Img(){

    const [pic, setPic] = useState("");
    const [imgs1 , setImgs1] = useState("");
    const [imgs2 , setImgs2] = useState("");
console.log(pic)
    function handleChange7(e) {
		setPic(e.target.files[0])
	}

    function handleApi(e) {
        e.preventDefault();
		const formdate = new FormData();
		formdate.append('photo', pic);
		axios.post('http://localhost:3000/ATLANTA%20BACKEND/image.php', formdate).then((res) => {
			//console.log(res);
		})
	}

   function img1(){
    setPic(pick1);
    setImgs1("Departing Prince")
   }

   function img2(){
    setPic(pick2);
    setImgs2("Departing Princes")
   }

const pick1 = picks;
const pick2 = pic2
    return(
        <>
        <h1>hello</h1>
        <div id="pics">
<h1>Choose Your Pic..</h1> 
<div  className="d-flex">
	<div id="p1">
    <label for="file-input">
        <img src={picks}  id='no' onClick={img1} alt='men pic'/>
        </label>
    </div>
	<div id="p2">
    <img src={pic2} id='no' onClick={img2} alt='women pic'/>
    </div>
</div>	 
	<form
    action='http://localhost:3000/ATLANTA%20BACKEND/image.php'
	method="post"
	encType="multipart/form-data"
    //onSubmit={(event) => handleSubmits(event)}
	>
	                         <label >Upload your Pic</label>
								<input
									type="file" name='photo'
									placeholder="Upload Your Pic"
									className="form-control"
									onChange={handleChange7}
								/>
								<button className="btn btn-dark" type="submit" onClick={handleApi}>Submit</button>
	</form> 
<h1>{imgs1}</h1>
</div>

        </>
    )
}

export default Img;