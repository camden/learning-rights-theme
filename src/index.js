import 'babel-polyfill';
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';

import routes from './routes';

ReactDOM.render(
  <Router routes={routes} />,
  document.getElementById('react-main')
);
