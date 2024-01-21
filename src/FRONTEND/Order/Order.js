import { useState } from "react";
import $, { event } from "jquery";

function Order(){

    const[foodname , setFoodname] = useState("");
    const[foodprice , setFoodprice] = useState("");
    const[foodqty , setFoodqty] = useState("");
    const[foodtotal , setFoodtotal] = useState("");
    const[foodstatus , setFoodstatus] = useState("");
    const[fooddate , setFooddate] = useState("");
    const[cusname , setCusname] = useState("");
    const[cusemail , setCusemail] = useState("");
    const[cusaddress , setCusaddress] = useState("");
    const[result , setResult] = useState("");

    const handleChangeo1 = (e) => {
		setFoodname(e.target.value);
	};
    const handleChangeo2 = (e) => {
		setFoodprice(e.target.value);
	};
    const handleChangeo3 = (e) => {
		setFoodqty(e.target.value);
	};
    const handleChangeo4 = (e) => {
		setFoodtotal(e.target.value);
	};
    const handleChangeo5 = (e) => {
		setFoodstatus(e.target.value);
	};
    const handleChangeo6 = (e) => {
		setFooddate(e.target.value);
	};
    const handleChangeo7 = (e) => {
		setCusname(e.target.value);
	};
    const handleChangeo8 = (e) => {
		setCusemail(e.target.value);
	};
    const handleChangeo9 = (e) => {
		setCusaddress(e.target.value);
	};
    console.log(result)

    const handleSubmitop = (e) => {
		e.preventDefault();
		 const form = $(e.target);
		$.ajax({
			type: "POST",
			enctype: "multipart/form-data",
			url: form.attr("action"),
			data: form.serialize(),
            result,
			success(data) {
				setResult(data);
			},
		});
        e.preventDefault();
       
	};

    return(
        <>
        
        <form method="post" action="http://localhost:3000/ATLANTA%20BACKEND/Order.php"  onSubmit={(event) => handleSubmitop(event)} encType="multipart/form-data">

            <label>Food Name</label>
            <input className="form-control" type="text" name="food" id="food" value={foodname} onChange={(event) =>handleChangeo1(event)} placeholder="ENTER FOOD NAME"></input>

            <label>Food Price</label>
            <input className="form-control" type="number" name="price" value={foodprice} onChange={(event) =>handleChangeo2(event)} placeholder="ENTER YOUR NAME"></input>

             <label>Food Qty</label>
            <input className="form-control" type="number" name="qty" value={foodqty} onChange={(event) =>handleChangeo3(event)} placeholder="ENTER YOUR FOOD QTY"></input>

            <label>Total Price</label>
            <input className="form-control" type="number" name="total" value={foodtotal} onChange={(event) =>handleChangeo4(event)} placeholder="ENTER YOUR TOTLA FOOD PRICE"></input>

            <label>Food Status</label>
            <input className="form-control" type="number" name="status" value={foodstatus} onChange={(event) =>handleChangeo5(event)} placeholder="ENTER YOUR NAME"></input>

            <label>Order Date</label>
            <input className="form-control" type="date" name="date" value={fooddate} onChange={(event) =>handleChangeo6(event)} placeholder="ENTER TODAY DATE"></input>

            <label>Your Name</label>
            <input className="form-control" type="text" name="name" value={cusname} onChange={(event) =>handleChangeo7(event)} placeholder="ENTER YOUR NAME"></input>

            <label>Your Email</label>
            <input className="form-control" type="email" name="email" value={cusemail} onChange={(event) =>handleChangeo8(event)} placeholder="ENTER YOUR EMAIL"></input>

            <label>Your Address</label>
            <input className="form-control" type="text" name="address" value={cusaddress} onChange={(event) =>handleChangeo9(event)} placeholder="ENTER YOUR ADDRESS"></input>

            <button className="btn btn-dark" name="submit" type="submit">Confirm Your Delicious Order</button>
        </form>
        
        </>
    )
}
export default Order;