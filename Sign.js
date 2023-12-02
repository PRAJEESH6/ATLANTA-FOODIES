import { useState } from "react";
import $, { event } from "jquery";
import axios from 'axios';
import './Sign.css';
//import {useNavigate} from 'react-router-dom';

function Sign() {


	const [name, setName] = useState("");
	const [name1, setName1] = useState("");
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
	const [cpassword, setCPassword] = useState("");
	const [phone, setPhone] = useState("");
	const [city, setCity] = useState("");
	const [pic, setPic] = useState("");
	const [result, setResult] = useState("");

	const handleChange = (e) => {
		setName(e.target.value);
	};
	const handleChange0 = (e) => {
		setName1(e.target.value);
	};
	const handleChange1 = (e) => {
		setEmail(e.target.value);
	};
	const handleChange2 = (e) => {
		setPassword(e.target.value);
	};
	const handleChange3 = (e) => {
		setCPassword(e.target.value);
	};
	const handleChange5 = (e) => {
		setPhone(e.target.value);
	};
	const handleChange6 = (e) => {
		setCity(e.target.value);
	};

	//***************************** */

	function handleChange7(e) {
		console.log(e.target.files);
		setPic(e.target.files[0])
	}

	//*************************** */

	const handleSubmit = (e) => {
		e.preventDefault();
		const form = $(e.target);
		$.ajax({
			type: "POST",
			enctype: "multipart/form-data",
			url: form.attr("action"),
			data: form.serialize(),
			success(data) {
				setResult(data);
			},
		});
	};

	function handleApi() {
		const formdate = new FormData();
		formdate.append('pic', pic);
		axios.post('http://localhost:3000/bus-ticket/src/PHP/image.php', formdate).then((res) => {
			//console.log(res);
		})
	}

	return (
		<div id="whole">
			<div id="round"></div>
			<div className="container-fluid">
				<div className="row">
					<div className="col-6" id="first">

{/* <img src="https://wallpaperaccess.com/full/212885.png" alt="pic" id="img"/> */}
<div id="pics">
<h1>Choose Your Pic..</h1>
<div  className="d-flex">
	<div id="p1"></div>
	<div id="p2"></div>
</div>	
	<form
	method="post"
	encType="multipart/form-data"
	>
	                         <label >Upload your Pic</label>
								<input
									type="file"
									name="pic"
									placeholder="Upload Your Pic"
									className="form-control"
									onChange={handleChange7}
								/>
								<button className="btn btn-dark" type="submit" onClick={handleApi}>Submit</button>
	</form>

</div>


					</div>
{/* //************************************************************************** */ }
					<div className="col-6">
						<div className="App" id="box">
							<form
								action="http://localhost:3000/bus-ticket/src/PHP/index.php"
								method="post"
								onSubmit={(event) => handleSubmit(event)}
								encType="multipart/form-data"
							>


								<div className="form-row d-flex">
									<div className="form-group col-5 ">
										<label htmlFor="name" className=""> Enter Your Name </label>
										<input
											type="text"
											id="name"
											name="name"
											placeholder="Your Name"
											value={name}
											className="form-control"
											onChange={(event) =>
												handleChange(event)
											}
										/>
									</div>

									<div className="form-group col-5">
										<label htmlFor="name" > Enter User Name </label>
										<input
											type="text"
											id="name1"
											name="name1"
											placeholder="Your UserName"
											value={name1}
											className="form-control"
											onChange={(event) =>
												handleChange0(event)
											}
										/>
									</div>
								</div>
								<br />
								<label htmlFor="email" >Enter Your Email</label>
								<input
									type="email"
									name="email"
									placeholder=" Give Your official Email"
									className="form-control"
									value={email}
									onChange={(event) => handleChange1(event)}
								/>

								
								<div className="form-row d-flex">
									<div className="form-group col-5 ">
								<label htmlFor="Password" >Enter Your Password</label>
								<input
									type="password"
									name="password"
									value={password}
									placeholder="Your Password"
									className="form-control"
									onChange={(event) => { handleChange2(event) }}
								/>
</div>
								<br />
								<div className="form-group col-5">
								<label htmlFor="cpassword" >Confirm Password</label>
								<input
									type="password"
									name="cpassword"
									value={cpassword}
									placeholder="Your Confirm Password"
									className="form-control"
									onChange={(event) => handleChange3(event)}
								/>
								</div>
								</div>
								

								<br />

								<div className="form-row d-flex">
									<div className="form-group col-5 ">
								<label htmlFor="phone" >Enter Your Phone-NO </label>
								<input
									type="number"
									name="phone"
									className="form-control"
									placeholder="Your Phone.NO"
									value={phone}
									onChange={(event) => handleChange5(event)}
								/>
								</div>

								<br />
								<div className="form-group col-5 ">
								<label htmlFor="city" >Enter Your City</label>
								<input
									type="text"
									name="city"
									className="form-control"
									placeholder="Your City"
									value={city}
									onChange={(event) => handleChange6(event)}
								/>
</div>
</div>
								<br />
								<label >Upload your Pic</label>
								<input
									type="file"
									name="pic"
									placeholder="Upload Your Pic"
									className="form-control"
									onChange={handleChange7}
								/>

								<button type="submit" name="submit" className="btn btn-dark" >Submit</button>
							</form>
							<h5>{result}</h5>

						</div>



					</div>
				</div>
			</div>
		</div>

	);
}

export default Sign;
