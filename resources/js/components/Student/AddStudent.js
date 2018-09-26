import React, { Component } from 'react';

class AddStudent extends Component {
 
    constructor(props) {
      super(props);
         /* Initialize the state. */
         this.state = {
            newStudent: {
                firstName: '',
                lastName: '',
                age: 0,
            }
          }
       
      //Boilerplate code for binding methods with `this`
      this.handleSubmit = this.handleSubmit.bind(this);
      this.handleInput = this.handleInput.bind(this);
    }
     
    /* This method dynamically accepts inputs and stores it in the state */
    handleInput(key, e) {
       
      /*Duplicating and updating the state */
      var state = Object.assign({}, this.state.newStudent); 
      state[key] = e.target.value;
      this.setState({newStudent: state });
    }
   /* This method is invoked when submit button is pressed */
    handleSubmit(e) {
      //preventDefault prevents page reload   
      e.preventDefault();
      /*A call back to the onAdd props. The current
       *state is passed as a param
       */
      this.props.onAdd(this.state.newStudent);
    }
   
    render() {
       
      return(
        <div> 
          <h2> Add new student </h2>
          <div> 
          <form onSubmit={this.handleSubmit}>
            <label> First Name: 
             { /*On every keystroke, the handeInput method is invoked */ }
              <input type="text" onChange={(e)=>this.handleInput('firstName',e)} />
            </label>
             
            <label> Last Name: 
              <input type="text" onChange={(e)=>this.handleInput('lastName',e)} />
            </label>

            <label> Age: 
              <input type="text" onChange={(e)=>this.handleInput('age',e)} />
            </label>
                
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>)
    }
  }
   
  export default AddStudent;