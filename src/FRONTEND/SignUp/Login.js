function Login(){
    return(
        <>
        
     <form action="" method="" enctype="multipart/form-data">

            <div >
            <label>Enter Your Name</label>
            <input type="text" name="name" placeholder="Enter Your Name"></input>
            <p>You must give your name...</p>
            </div>

            <div >
            <label>Enter Your Email</label>
            <input type="email" name="email" placeholder="Enter Your Name"></input>
            <p>You must give your name...</p>
            </div>

            <div >
            <label>Enter Your Password</label>
            <input type="password" name="password" placeholder="Enter Your Name"></input>
            <p>You must give your name...</p>
            </div>

            <div >
            <label>Enter Your PH.NO</label>
            <input type="number" min="10" max="10" name="phone" placeholder="Enter Your Name"></input>
            <p>You must give your name...</p>
            </div>

            <div >
            <label>Enter Your City</label>
            <input type="text" name="city" placeholder="Enter Your Name"></input>
            <p>You must give your name...</p>
            </div>

            <button type="submit" name="submit">SignUp</button>
            <p>You don't have account please <a href="Login.js">Sign In</a></p>
            </form>
        </>
    )
}
export default Login;