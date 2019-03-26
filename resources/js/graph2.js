import React, { Component } from "react";
import ReactDom from "react-dom";
import { Radar } from 'react-chartjs-2';

export default class Graph extends Component {

    constructor(props)
    {
        super(props);

        this.state = {};
    }

    componentDidMount()
    {
        /*
        fetch('/api/class').then(response=> {
            return response.json();
        }).then(survey => this.setState({survey}))
        */
       console.log("here");
    }

    getData()
    {
        const { survey = [] } = this.state;

        let studentNumber = 0, data = [], happy = 0, empowered = 0, sad = 0, scared = 0, angry = 0;

        const date = new Date();

        let lastWeek = new Date(date.setDate(date.getDate() - 7));
        /*
        NOTE: this graph should take the student surveys over the course of the WEEK and get the answer
        to question 5 (the mood of the student). The mood should be displayed in the categories of
        "Happy" (1-4),
        "Empowered" (5-7),
        "Sad" (8-10),
        "Scared" (11-13),
        "Angry" (14-16)
        */
        if(survey.length)
        {
            survey.map(survey => {

                const _date = new Date(survey.date)

                if(_date > lastWeek)
                {
                    studentNumber++;
                    switch(survey.mood) {
                        case 1:
                            happy += 1;
                            break;
                        case 2:
                            empowered += 1;
                            break;
                        case 3:
                            sad += 1;
                            break;
                        case 4:
                            scared += 1;
                            break;
                        case 5:
                            angry += 1;
                            break;
                        default:
                            break;
                    }
                }
                });

                if(happy === 0) happy = null;
                if(empowered === 0) empowered = null;
                if(sad === 0) sad = null;
                if(scared === 0) scared = null;
                if(angry === 0) angry = null;

                data.push(4, 4, 4, 4, 4);
                //const data = ["1","2"];
                console.log("work");
                return data;
            }
        return null;
    }

    render()
    {
        const data = this.getData() || [];
        console.log(data);
        this.getData();

        return<div>
            <Radar data = {{
                labels: ["Happy", "Empowered", "Sad", "Scared", "Angry"],
                    datasets:
                    [{
                        label: "Weekly Student Mood",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data:data,
                        //data: [5,5,5,5,5]
                    }]}}
            height={60} />
        </div>
    }
}

if (document.getElementById("react-render2")) {
  ReactDom.render(<Graph />, document.getElementById("react-render2"));
}
