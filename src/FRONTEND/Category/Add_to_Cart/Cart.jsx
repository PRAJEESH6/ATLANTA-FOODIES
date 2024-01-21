import './Cart.css';

const Cart = () => {

    return(
        <>
        <h1>Your Cart Items..</h1>

        <div className='container'>
            <div className='d-flex'>
                <div className='cart_box'>
                    <img src='' alt='Cart_Pic' id='pics'/>
                </div>

                <div className=''>
                    <h5>$ 500.5</h5>
                </div>
                
                <div className=''>
                    <h6>Available</h6>
                    <h6>Yes</h6>
                </div>
                <button className='btn btn-danger'>Place Order</button>
            </div>
        </div>
        
        </>
    )
}
export default Cart;