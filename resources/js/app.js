// import 'chart.js';
// var a, b, c, d, e, f;
// var chartData = [0,1,2,3,4,5];
// var ctx = document.getElementById("myChart").getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'horizontalBar',
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         }
//     },
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: '# of Votes',
//             data: [1,1,1,1,1,1],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },

// });

// function updateChart(chartData)
// {
//     myChart.data.datasets[0].data = chartData;

//     myChart.update();
// }

// updateChart(chartData);
import React, { Component } from "react";
import ReactDom from "react-dom";

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
