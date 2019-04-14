import React, { Component } from "react";
import ReactDom from "react-dom";
import { Line } from 'react-chartjs-2';
import Graph from './graph2';

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

    getData()
    {
        const { survey = [] } = this.state;

        let studentNumber = 0, data = [], mon = 0, tues = 0, wed = 0, thurs = 0, friday = 0;

        const date = new Date();

        let lastWeek = new Date(date.setDate(date.getDate() - 7));

        if(survey.length)
        {
            survey.map(survey => {

                const _date = new Date(survey.date)

                if(_date > lastWeek)
                {
                    studentNumber++;

                    switch(_date.getDay()) {
                        case 1:
                            mon += survey.Q1;
                            mon += survey.Q2;
                            mon += survey.Q3;
                            mon += survey.Q4;
                            mon += survey.Q5;
                            break;
                        case 2:
                            tues += survey.Q1;
                            tues += survey.Q2;
                            tues += survey.Q3;
                            tues += survey.Q4;
                            tues += survey.Q5;
                            break;
                        case 3:
                            wed += survey.Q1;
                            wed += survey.Q2;
                            wed += survey.Q3;
                            wed += survey.Q4;
                            wed += survey.Q5;
                            break;
                        case 4:
                            thurs += survey.Q1;
                            thurs += survey.Q2;
                            thurs += survey.Q3;
                            thurs += survey.Q4;
                            thurs += survey.Q5;
                            break;
                        case 5:
                            friday += survey.Q1;
                            friday += survey.Q2;
                            friday += survey.Q3;
                            friday += survey.Q4;
                            friday += survey.Q5;
                            break;
                        default:
                            break;
                    }
                }

                });

                mon = Math.round( (mon / studentNumber) * 100);
                mon = mon / 100;

                tues = Math.round( (tues / studentNumber) * 100);
                tues = tues / 100;

                wed = Math.round( (wed / studentNumber) * 100);
                wed = wed / 100;

                thurs = Math.round( (thurs / studentNumber) * 100);
                thurs = thurs / 100;

                friday = Math.round( (friday / studentNumber) * 100);
                friday = friday / 100;

                if(mon === 0) mon = null;
                if(tues === 0) tues = null;
                if(wed === 0) wed = null;
                if(thurs === 0) thurs = null;
                if(friday === 0) friday = null;

                data.push(mon, tues, wed, thurs, friday);

                console.log(data)
                return data;
            }
        return null;
    }

    render()
    {
        return (
            <div>
                <Line data = {{ labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                                datasets: [{
                                label: "Weekly Student Mood",
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: this.getData(),
                                }]}}
                         />
            </div>
        )
    }
}

if (document.getElementById("react-render")) {
    ReactDom.render(<Main />, document.getElementById("react-render"));
}
//add new graph links here
else if (document.getElementById("react-render2")) {
    ReactDom.render(<Graph />, document.getElementById("react-render2"));
}
else if (document.getElementById("react-render3")) {
    ReactDom.render(<Graph />, document.getElementById("react-render3"));
}
