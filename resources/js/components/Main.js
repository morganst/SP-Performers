import React, { Component } from "react";
import ReactDom from "react-dom";
import Student from "./Student";
import AddStudent from "./AddStudent";
import EditStudent from "./EditStudent";

export default class Main extends Component {
  constructor() {
    super();
    this.state = {
      students: [],
      currentStudent: null,
      editButtonClicked: false
    };

    this.handleAddStudent = this.handleAddStudent.bind(this);
    this.handleUpdate = this.handleUpdate.bind(this);
    this.handleEdit = this.handleEdit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
    this.handleDeleteConfirmation = this.handleDeleteConfirmation.bind(this);
  }

  componentDidMount() {
    /* fetch API in action */
    fetch("/api/students")
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
          {student.title}
        </li>
      );
    });
  }

  handleClick(student) {
    this.state.editButtonClicked = false;
    this.setState({ currentStudent: student });
  }

  handleAddStudent(student) {
    student.price = Number(student.price);

    fetch("api/students", {
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
    fetch("api/students/" + this.state.currentStudent.id, {
      method: "delete"
    }).then(response => {
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
    fetch("api/students/" + currentStudent.id, {
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
        this.setState(prevState => ({
          students: newStudents.concat(student),
          currentStudent: student
        }));
      });
  }

  render() {
    return (
      <div>
        <div className="col-md-6">
          <h3>All Students ({this.state.students.length})</h3>
          <ul>{this.renderStudents()}</ul>
        </div>
        <div className="col-md-6">
          {this.state.editButtonClicked === true ? (
            <EditStudent
              student={this.state.currentStudent}
              update={this.handleUpdate}
            />
          ) : (
            <React.Fragment>
              <Student
                handleDeleteConfirmation={this.handleDeleteConfirmation}
                student={this.state.currentStudent}
                deleteStudent={this.handleDelete}
                handleEdit={this.handleEdit}
              />
              <AddStudent onAdd={this.handleAddStudent} />
            </React.Fragment>
          )}
        </div>
      </div>
    );
  }
}

if (document.getElementById("root")) {
  ReactDom.render(<Main />, document.getElementById("root"));
}
