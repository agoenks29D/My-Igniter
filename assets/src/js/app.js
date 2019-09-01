import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Link, NavLink, Redirect } from 'react-router-dom';
import { withRouter } from 'react-router';

// Import Materialize
import 'materialize-css/dist/css/materialize.min.css';
import 'materialize-css/dist/js/materialize.min.js';

// Import App Style
import '../css/app.css';

class Software extends React.Component
{
	constructor(props)
	{
		super(props)
	}

	render()
	{
		switch(this.props.match.params.page)
		{
			// Software About
			case 'about':
				return (
					<div className="container">
						<h3>About</h3>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				)
			break;

			// Softwware Terms
			case 'terms':
				return (
					<div className="container">
						<h3>Terms</h3>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				)
			break;

			// Default Render
			default :
				return (
					<div className="container">
						<h3>Welcome to Codeigniter ReactJS</h3>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				)
			break;
		}
	}
}

ReactDOM.render(
	<React.Fragment>
		<BrowserRouter basename={'/'}>
			<div>
				<nav className="nav-fixed">
					<div className="nav-wrapper navbar_head z-depth-3">
						<NavLink className="brand-logo show-on-large truncate" activeClassName="active" to="/">Codeigniter ReactJS</NavLink>
						<ul className="right hide-on-med-and-down">
							<li>
								<NavLink className="navbar_menu_desktop" exact activeClassName="active" to="/"><i className="fa fa-home left"></i>Home</NavLink>
							</li>
							<li>
								<NavLink className="navbar_menu_desktop" activeClassName="active" to="/software/about"><i className="fa fa-question-circle left"></i>About</NavLink>
							</li>
							<li>
								<NavLink className="navbar_menu_desktop" activeClassName="active" to="/software/terms"><i className="fa fa-question-circle left"></i>Term</NavLink>								
							</li>
						</ul>
					</div>
				</nav>
				<Route exact path="/" component={Software}/>
				<Route path="/software/:page" component={Software}/>
			</div>
		</BrowserRouter>
	</React.Fragment>
,document.getElementById('root'));