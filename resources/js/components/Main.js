import React, { Component } from "react";
import ReactDom from "react-dom";
import Navbar from './Navbar/Navbar';
import StudentList from './Student/StudentList';

export default class Main extends Component {
  componentDidMount(){
    fetch('/api/students').then(response=>{
      return response.json();
    }).then(students => this.setState({students}))
  }

  renderStudents(){
    return this.state.students.map(student => {
      return <div>{student.firstName}</div>
    })
  }

  render() {
    console.log("asd")
    return (
      <div>

        {this.renderStudents()};
      </div>
    );
  }
}

if (document.getElementById("react-render")) {
  ReactDom.render(<Main />, document.getElementById("react-render"));
}

