import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Navbar from './Navbar/Navbar';
import Student from '../components/Student'
import AddStudent from '../components/AddStudent'

/* Main Component */
class Main extends Component {
    
  constructor() {
   
    super();
    //Initialize the state in the constructor
    this.state = {
        students: [],
        currentStudent: null
    }
    this.handleAddStudent = this.handleAddStudent.bind(this);
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

  
  
  handleAddStudent(student) {
     
    student.age = Number(student.age);
    /*Fetch API for post request */
    fetch( 'api/students/', {
        method:'post',
        /* headers are important*/
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
         
        body: JSON.stringify(student)
    })
    .then(response => {
        return response.json();
    })
    .then( data => {
        //update the state of students and currentStudent
        this.setState((prevState)=> ({
            students: prevState.students.concat(data),
            currentStudent : data
        }))
    })
  
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
            <AddStudent onAdd={this.handleAddStudent} />
        </div>
    );
  }
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}