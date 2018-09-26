import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Navbar from './Navbar/Navbar';
import Student from '../components/Student'

/* Main Component */
class Main extends Component {
    
  constructor() {
   
    super();
    //Initialize the state in the constructor
    this.state = {
        students: [],
        currentStudent: null
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
            <li onClick={() =>this.handleClick(student)} key={student.id} >
                { student.firstName } 
            </li>      
        );
    })
  }

  handleClick(student) {
    //handleClick is used to set the state
    this.setState({currentStudent:student});
   
  }

  render() {
    return (
        <div>
            <div>
                <Navbar />
                <h3>All Students</h3>
                <ul>
                { this.renderStudents() }
                </ul> 
            </div>

            <Student student={this.state.currentStudent} />
        </div>
    );
  }
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}