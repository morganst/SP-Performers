import React from 'react';
import StudentList from '../Student/StudentList';
import navbar from './css/navbar.css';

export default class Navbar extends React.Component {
    render() {
    return (
        <div className="navbar">
            <div className="container">
                <div className="logo"><img src="/images/logo.png" width="90px"></img></div>
                <nav>
                    <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/">Classes</a></li>
                    <li><a href="/">Students</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    )
    }
}

