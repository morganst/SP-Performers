import React, { Component } from 'react';
import ReactDOM from 'react-dom';
 
export default class Home extends Component {
 
  constructor() {
   
    super();
    //Initialize the state in the constructor
    this.state = {
        students: [],
    }
  }
  /*componentDidMount() is a lifecycle method
   * that gets called after the component is rendered
   */
  componentDidMount() {
    /* fetch API in action */
    fetch('/api/student')
        .then(response => {
            return response.json();
        })
        .then(students => {
            this.setState({ students });
        });
  }
 
 renderStudents() {
    return this.state.students.map(student => {
        return (
            /* When using list you need to specify a key
             * attribute that is unique for each list item
            */
            <li key={student.id} >
                { student.firstName } 
            </li>      
        );
    })
  }
   
  render() {
    return (
        <div>
            <ul>
            { this.renderStudents() }
            </ul> 
        </div> 
       
    );
  }
}
