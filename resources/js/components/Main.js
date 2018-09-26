import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Navbar from './Navbar/Navbar';
 
/* Main Component */
class Main extends Component {
   
  render() {
    return (
        <div>
            <Navbar />
        </div> 
       
    );
  }
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}