import React, { Component } from "react";
import ReactDom from "react-dom";
import Navbar from './Navbar/Navbar';
import StudentList from './Student/StudentList';

export default class Main extends Component {

  render() {
    return (
      <div>
          <Navbar />
          <StudentList />
      </div>
    );
  }
}

if (document.getElementById("root")) {
  ReactDom.render(<Main />, document.getElementById("root"));
}
