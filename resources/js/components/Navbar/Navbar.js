import React from 'react';
import { Link, BrowserRouter as Router, Route } from 'react-router-dom';
import Home from '../Home/Home';
import navbar from './css/navbar.css';

export default () => {
  return (
      <Router>
        <div>
          <div className="navbar">
              <div className="container">
                <div className="logo"><img src="/images/logo.png" width="90px"></img></div>
                  <div>
                    <nav>
                      <OldSchoolMenuLink to="/home" label="Home" />
                    </nav>
                  </div>
              </div>
          </div>
        <Route path="/home" component={Home} />
        </div>
      </Router>
  )
}


const OldSchoolMenuLink = ({ to, label }) => (
  <Route
    path={to}
    children={({ match }) => (
      <div className={match ? "active" : ""}>
        {match ? "> " : ""}
        <Link to={to}>{label}</Link>
      </div>
    )}
  />
);
