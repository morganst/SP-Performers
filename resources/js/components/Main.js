import React, { Component } from "react";
import ReactDom from "react-dom";
import Student from "./Student/Student";
import AddStudent from "./Student/AddStudent";
import EditStudent from "./Student/EditStudent";
import Navbar from './Navbar/Navbar';

export default class Main extends Component {
  constructor() {
    super();
    this.state = {
      students: [],
      currentStudent: null,
      editButtonClicked: false,
    };

    this.handleAddStudent = this.handleAddStudent.bind(this);
    this.handleUpdate = this.handleUpdate.bind(this);
    this.handleEdit = this.handleEdit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
    this.handleDeleteConfirmation = this.handleDeleteConfirmation.bind(this);
  }

  componentDidMount() {
    /* fetch API in action */
    fetch('/api/student')
      .then(response => {
        return response.json();
      })
      .then(students => {
        //Fetched student is stored in the state
        this.setState({ students });
      });
  }

  renderStudents() {
    return this.state.students.map(student => {
      return (
        /* When using list you need to specify a key
        * attribute that is unique for each list item
        */
        <li key={student.id} onClick={() => this.handleClick(student)}>
          {student.firstName}
        </li>
      );
    });
  }

  handleClick(student) {
    this.state.editButtonClicked = false;
    this.setState({ currentStudent: student });
  }

  handleAddStudent(student) {
    student.age = Number(student.age);

    fetch('api/student', {
      method: "post",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      },
      body: JSON.stringify(student)
    })
      .then(response => {
        return response.json();
      })
      .then(data => {
        this.setState(prevState => ({
          students: prevState.students.concat(data),
          currentStudent: data
        }));
      });
  }

  handleDelete() {
    const currentStudent = this.state.currentStudent;
    fetch('api/student/' + this.state.currentStudent.id, 
    {method: "delete"}).then(response => {
      /* Duplicate the array and filter out the item to be deleted */
      var newStudents = this.state.students.filter(function(item) {
        return item !== currentStudent;
      });

      this.setState({ students: newStudents, currentStudent: null });
    });
  }

  handleDeleteConfirmation(event) {
    if (confirm("Are you sure you want to delete it?")) {
      this.handleDelete();
    }
  }

  handleEdit() {
    this.setState({ editButtonClicked: true });
  }

  handleUpdate(student) {
    const currentStudent = this.state.currentStudent;
    fetch('api/student/' + currentStudent.id, {
      method: "put",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      },
      body: JSON.stringify(student)
    })
      .then(response => {
        return response.json();
      })
      .then(data => {
        /** updating the state */
        var newStudents = this.state.students.filter(function(item) {
          return item !== currentStudent;
        });
        this.setState((prevState)=> ({
          students: newStudents.concat(student),
          currentStudent: student
        }));
      });
  }

  render() {
    return (
      <div>
          <Navbar />
        <div>
          <h3>All Students ({this.state.students.length})</h3>
          <ul>{this.renderStudents()}</ul>
        </div>
        <div>
          {this.state.editButtonClicked === true ? (
            <EditStudent
              student={this.state.currentStudent}
              update={this.handleUpdate}
            />
          ) : (
            <div>
              <Student
                handleDeleteConfirmation={this.handleDeleteConfirmation}
                student={this.state.currentStudent}
                deleteStudent={this.handleDelete}
                handleEdit={this.handleEdit}
              />
              <AddStudent onAdd={this.handleAddStudent} />
            </div>
          )}
        </div>
      </div>
    );
  }
}

if (document.getElementById("root")) {
  ReactDom.render(<Main />, document.getElementById("root"));
}
