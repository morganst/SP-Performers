import React, { Component } from "react";
import ReactDom from "react-dom";

export default class Main extends Component {

    constructor(props)
    {
        super(props);

        this.state = {};
    }
  
    componentDidMount()
    {
        fetch('/api/survey').then(response=> {
            return response.json();
        }).then(survey => this.setState({survey}))
    }

   renderSurvey()
   {
       const { survey = [] } = this.state;

       console.log(survey)

       if(survey.length)
       {
           return survey.map(survey => {

               const _date = new Date(survey.date)

               var date = new Date();

               date.setDate(_date.getDate() - 7);

               console.log(_date, date)

               //returns surveys completed in past 7 days
               if(_date > date)
               {
                    return <div key={survey.id}>
                        <div>Student ID: {survey.StudentID}</div>
                        <div>Class ID : {survey.ClassID}</div>
                        <div>Question 1 : {survey.Q1}</div>
                        <div>Question 2 : {survey.Q2}</div>
                        <div>Question 3 : {survey.Q3}</div>
                        <div>Question 4 : {survey.Q4}</div>
                        <div>Question 5 : {survey.Q5}</div>
                        <div>Mood : {survey.mood}</div>
                        <div>------------------------------</div>
                    </div>
               }
               return null;
           })
       }
    }

    render() 
    {
        return (
            <div>
                {this.renderSurvey()}
            </div>
        );  
    }
}	

if (document.getElementById("react-render")) {
  ReactDom.render(<Main />, document.getElementById("react-render"));
}
