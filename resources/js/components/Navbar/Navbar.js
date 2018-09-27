import React from 'react';

import navbar from './css/navbar.css';

export default () => {
  return (
    <div className="navbar">
        <div className="container">
            <div className="logo"><img src="/images/logo.png" width="90px"></img></div>
            <nav>
                <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Classes</a></li>
                <li><a href="/students">Students</a></li>
                </ul>
            </nav>
        </div>
    </div>
  )
}

