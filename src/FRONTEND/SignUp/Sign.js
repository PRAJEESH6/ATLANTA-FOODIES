import { useState } from "react";
import $, { event } from "jquery";
import axios from 'axios';
import './Sign.css';
import {Link} from 'react-router-dom';
//import {useNavigate} from 'react-router-dom';
import img from '../SignUp/imgs/profile.png';

function Sign() {


	const [name, setName] = useState("");
	const [name1, setName1] = useState("");
	const [email, setEmail] = useState("");
	const [password, setPassword] = useState("");
	const [cpassword, setCPassword] = useState("");
	const [phone, setPhone] = useState("");
	const [city, setCity] = useState("");
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

	return (
		<div id="whole">
			
			<div id="round">
			</div>
			<div className="container-fluid">
				<div className="row">
					<div className="col-6" id="first">
						
					<h1 id="dry">ATLANTA FOODIES</h1>
<img src="https://images8.alphacoders.com/103/1032061.jpg" alt="pic" id="img"/>


					</div>
{/* //************************************************************************** */ }
					<div className="col-6">
					<div id="userid">
						<img src={img} id="ppic" alt="pic"/>
					</div>
						<div className="App" id="box">
							
							<form
								action="http://localhost:3000/ATLANTA%20BACKEND/index.php"
								method="post"
								onSubmit={(event) => handleSubmit(event)}
								encType="multipart/form-data"
							>


								<div className="form-row d-flex">
									<div className="form-group col-5 ">
										<label htmlFor="name" className="" id="n1"> Enter Your Name </label>
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
										<label htmlFor="name" id="n2" > Enter User Name </label>
										<input
											type="text"
											id="name1"
											name="username"
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
								<label htmlFor="email" id="n3" >Enter Your Perspective Email</label>
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
								<label htmlFor="Password" id="n4" >Enter Your Password</label>
								<input
									type="password"
									name="password"
									id="pas"
									value={password}
									placeholder="Your Password"
									className="form-control"
									onChange={(event) => { handleChange2(event) }}
								/>
</div>
								<br />
								<div className="form-group col-5">
								<label htmlFor="cpassword" id="n5">Confirm Password</label>
								<input
									type="password"
									name="cpassword"
									id="cpas"
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
								<label htmlFor="phone" id="n6">Enter Your Phone-NO </label>
								<input
									type="number"
									name="phone"
									id="ph"
									className="form-control"
									placeholder="Your Phone.NO"
									value={phone}
									onChange={(event) => handleChange5(event)}
								/>
								</div>

								<br />
								<div className="form-group col-5 ">
								<label htmlFor="city" id="n7">Enter Your City</label>
								<input
									type="text"
									name="city"
									id="ph1"
									className="form-control"
									placeholder="Your City"
									value={city}
									onChange={(event) => handleChange6(event)}
								/>
</div>
</div>
								<br />

								<button type="submit" name="submit" className="btn btn-dark" id="btn">Submit</button>
							</form>
							{/* <Link to='/Image_Upload' className="btn btn-info">Upload Image</Link> */}
							{/* <h5>{result}</h5> */}
							
						</div>



					</div>
				</div>
			</div>
		</div>

	);
}

export default Sign;
