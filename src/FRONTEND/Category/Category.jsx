import './Category.css';

const Category = () =>{

    const Clicked=()=>{
        console.log("Cake")
    }
    return(
        <>
        <h1 className='text-info mx-5' id='com'>HELLO I'AM CATEGORY</h1>

        <div className='container'>
          <div className='row'>
            <div className='col-3'>
               <div className='cat_box' onClick={Clicked}></div>
               <h6 id='ies'>Cake</h6>
               <div className='cat_box'></div>
               <h6 id='ies'>Ice Cream</h6>
               <div className='cat_box'></div>
               <h6 id='ies'>foodies</h6>
               <div className='cat_box'></div>
               <h6 id='ies'>foodies</h6>
               <div className='cat_box'></div>
               <h6 id='ies'>foodies</h6>
            </div>

            <div className='col-3'>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            </div>

            <div className='col-3'>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            </div>

            <div className='col-3'>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            <div className='cat_box'></div>
            <h6 id='ies'>foodies</h6>
            </div>
          </div>
        </div>
        
        </>
    )
}
export default Category;