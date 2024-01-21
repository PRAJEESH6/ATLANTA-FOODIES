import './App.css';
import Sign from './FRONTEND/SignUp/Sign';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css'
import Navbars from './FRONTEND/Home/Navbar/Navbars';
import {Routes,Route} from 'react-router-dom';
import Home from './FRONTEND/Home/Home/Home';
import Img from './FRONTEND/SignUp/Img_Upload/Img';
import Email from './FRONTEND/SignUp/Email';
import Logout from './Logout/Logout';
import Login from './Login/Login';
import Profile from './FRONTEND/Profile/Profile';
import Order from './FRONTEND/Order/Order';
import Category from './FRONTEND/Category/Category';
import Cake from './FRONTEND/Category/Cake/Cake';
import Cart from './FRONTEND/Category/Add_to_Cart/Cart';
import Orders from './FRONTEND/Orders/Orders';

function App(){
  return(
    <>
    {/* <Navbars/> */}
{/* <Logout/> */}
{/* <Login/> */}
<Routes>

      {/* <Route exact path='/home' Component={Home}/> */}
      {/* <Route exact path='/ImageLoader' Component={Img}/> */}


</Routes>
     {/* <Sign/>  */}
  {/* <Email/>  */}
  <Profile/>
    {/* <Order/> */}
    {/* <Category/> */}
    {/* <Cake/> */}
    {/* <Cart/> */}
    {/* <Orders/> */}
    </>
  )
}

export default App;