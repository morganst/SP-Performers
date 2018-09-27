import React, { Component } from 'react';

class EditStudent extends Component {
 
    constructor(props) {
      super(props);
         /* Initialize the state. */
         this.state = {
            student: null
            }

       
      //boilerplate code for binding methods with `this`
      this.handleSubmit = this.handleSubmit.bind(this);
      this.handleInput = this.handleInput.bind(this);
    }
    
    componentWillMount() {
        this.setState({ student: this.props.student });
      }
    
    /* This method dynamically accepts inputs and stores it in the state */
    handleInput(key, e) {
       
      /*Duplicating and updating the state */
      var state = Object.assign({}, this.state.student); 
      state[key] = e.target.value;
      this.setState({student: state });
    }
   /* This method is invoked when submit button is pressed */
    handleSubmit(e) {   
      e.preventDefault();
      this.props.update(this.state.student);
      this.editForm.reset();
    }
   
    render() {
        const student = this.state.student;
      return(
        <div> 
          <h2> Edit Student </h2>
          <div> 
          <form onSubmit={this.handleSubmit} ref={input => (this.editForm = input)}>
            <label> First Name: 
             { /*On every keystroke, the handeInput method is invoked */ }
              <input value={student.firstName} type="text" onChange={(e)=>this.handleInput('firstName',e)} />
            </label>
             
            <label> Last Name: 
              <input value={student.lastName} type="text" onChange={(e)=>this.handleInput('lastName',e)} />
            </label>

            <label> Age: 
              <input value={student.age} type="text" onChange={(e)=>this.handleInput('age',e)} />
            </label>
                
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>)
    }
  }
   
  export default EditStudent;