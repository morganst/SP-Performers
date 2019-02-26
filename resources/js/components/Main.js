import React, { Component } from "react";
import ReactDom from "react-dom";
import Navbar from './Navbar/Navbar';
import StudentList from './Student/StudentList';
import axios from 'axios';

export default class Main extends Component {
  constructor(props)
  {
    super(props);
    this.state = { surveys: '' }
  }
  componentDidMount(){
    /*
    fetch('/api/welcome').then(response=>{
      return response.json().then(dailySurvey => this.setState({dailySurvey}))
    });

    console.log(this.state)
    */
    axios.get('/api/welcome')
    .then(res => {
      const surveys = res.data;
      this.setState({ surveys });
    })
  }

  renderSurvey(){
    /*return this.state.surveys.map(survey => {
      return <div>{survey}</div>
    })*/
    console.log(this.state.surveys);

    const { surveys } = this.state;

    return (
      Object.values(surveys).map(survey => {
        return <div id="asdasdasd">{survey.Q1}</div>
      })
    )
  }

  render() {
    console.log("asd")
    return (
      <div>
        HELLLLLLLLO
        {this.renderSurvey()}

      </div>
    );
  }
}


