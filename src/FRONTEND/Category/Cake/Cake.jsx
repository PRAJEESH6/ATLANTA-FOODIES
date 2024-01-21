import './Cake.css';

const Cake = () => {

    return(
        <>
        <h1>Taste Your Cake's Now</h1>
        <div className='container'>
            <div className='row'>
                <div className='col-3'>
                    <div className='cake'>
                        <div className='bb'>
                            <img src='' alt='Cake_Pic' id='source'/>
                        </div>
                        <h6> Name :Pine Cake</h6>
                        <h6>Price  : <span>$ 500.5</span></h6>
                        <button className='btn btn-dark'>Add to Cart</button>
                        <button className='btn btn-danger'>Place Order</button>
                        <h6>Variety: Choclate, Vellila, Banana </h6>
                    </div>
                </div>
            </div>
        </div>
        </>
    )
}
export default Cake;